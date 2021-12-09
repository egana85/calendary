<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Venue;
use Gate;
use App\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::all();

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $venues = Venue::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.events.create', compact('venues'));
    }

    public function store(StoreEventRequest $request)
    {
        $startTime = date('Y-m-d H:i', strtotime($request->input('start_time')));
        $endTime = date('Y-m-d H:i', strtotime($request->input('end_time')));
        $venue_id = $request->input('venue_id');

        $eventsCount = Event::where(function ($query) use ($startTime, $endTime, $venue_id) {
         $query->where(function ($query) use ($startTime, $endTime,$venue_id) {
            $query->where('start_time', '>=', $startTime)
                    ->where('end_time', '<', $startTime)
                    ->where('venue_id',$venue_id);
            })
            ->orWhere(function ($query) use ($startTime, $endTime, $venue_id) {
                $query->where('start_time', '<', $endTime)
                        ->where('end_time', '>=', $endTime)
                        ->where('venue_id',$venue_id);
            });
        })->count();

      if($eventsCount>0)
      {
        Session()->flash('message', 'Ya existe un evento para esa fecha');
        Session()->flash('alert-class', 'alert-danger');

        return redirect()->back()->withInput();
      }
      else {
        $event = Event::create($request->all());


        Session()->flash('message', 'Evento creado con exito');
        Session()->flash('alert-class', 'alert-success');

        //envio de correo a usuario encargado
      }



        return redirect()->route('admin.events.index');
    }

    public function edit(Event $event)
    {
        abort_if(Gate::denies('event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $venues = Venue::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event->load('venue');

        return view('admin.events.edit', compact('venues', 'event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());

        return redirect()->route('admin.events.index');
    }

    public function show(Event $event)
    {
        abort_if(Gate::denies('event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->load('venue');

        return view('admin.events.show', compact('event'));
    }

    public function destroy(Event $event)
    {
        abort_if(Gate::denies('event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Event::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

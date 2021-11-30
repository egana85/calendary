<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Venue;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\\App\\Event',
            'start_time' => 'start_time',
            'end_time'   => 'end_time',
            'field'      => 'name',
            'prefix'     => 'Event',
            'suffix'     => '',
            'route'      => 'admin.events.edit',
        ],
        [
            'model'      => '\\App\\Meeting',
            'start_time' => 'start_time',
            'end_time'   => 'end_time',
            'field'      => 'attendees',
            'prefix'     => 'Meeting with',
            'suffix'     => '',
            'route'      => 'admin.meetings.edit',
        ],
    ];

    public function index()
    {
        $events = [];

        $venues = Venue::all();

        foreach ($this->sources as $source) {
            $calendarEvents = $source['model']::when(request('venue_id') && $source['model'] == '\App\Event', function($query) {
                return $query->where('venue_id', request('venue_id'));
            })->get();
            foreach ($calendarEvents as $model) {
                $start_time = $model->getOriginal($source['start_time']);

                $end_time = $model->getOriginal($source['end_time']);

                if (!$start_time) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $start_time,
                    'end' => $end_time,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events', 'venues'));
    }
}

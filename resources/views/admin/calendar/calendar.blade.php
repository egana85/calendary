@extends('layouts.admin')
@section('content')
<h3 class="page-title">{{ trans('global.systemCalendar') }}</h3>
<div class="card">
    <div class="card-header">
        {{ trans('global.systemCalendar') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.systemCalendar') }}" method="GET">
            Venue:
            <select name="venue_id">
                <option value="">-- all venues --</option>
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}"
                            @if (request('venue_id') == $venue->id) selected @endif>{{ $venue->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
        </form>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

        <div id='calendar'></div>


    </div>
</div>
@endsection

@section('scripts')
@parent
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
              events: events,
                header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
              },

              buttonText: {
                prevYear: "prev year",
                nextYear: "next year",
                year: "Año",
                today: "Hoy",
                month: "Mes",
                week: "Semana",
                day: "Dia"
              },

              eventColor: '',
              monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
              monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
              dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
               dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
            })
        });
</script>
@stop

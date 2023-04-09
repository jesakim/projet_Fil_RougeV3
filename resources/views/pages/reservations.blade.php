@extends('layouts.dashboard')

@section('resbtn','active')


@section('content')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.3/tooltip.min.js"></script> --}}

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          themeSystem: 'bootstrap5',
          showNonCurrentDates:false,
          fixedWeekCount:false,
          firstDay:1,
          eventTimeFormat:{
            hour: 'numeric',
            minute: '2-digit',
            omitZeroMinute: true,
            meridiem: false,
            hour12: false
            },
          headerToolbar :{
          start: 'prev', // will normally be on the left. if RTL, will be on the right
          center: 'title',
          end: 'today next dayGridMonth,listWeek' // will normally be on the right. if RTL, will be on the left
          },
          titleFormat:{ year: '2-digit', month: '2-digit', day: '2-digit' },
          events: [
            @foreach ($reservations as $reservation)

            {
              title: '| {{$reservation->name.$reservation->didcome}}',
              start: '{{$reservation->date}}',
              url:'{{route("patients.show",$reservation->patient_id)}}',
              color: "{{strtotime($reservation->date)>time() ? '#ffc107' :( $reservation->didcome ? '#198754' : '#dc3545')}}",
            //   className: "{{strtotime($reservation->date)>time() ? 'text-warning' :( $reservation->didcome ? 'bg-success text-white' : 'bg-danger text-white')}}",
            },
            @endforeach

          ],
          eventDisplay:'list-item',
          eventColor: '#5e73e4',
          contentHeight: '90vh',
          expandRows:false,
          hiddenDays: [ 6],
          dayHeaders:{ weekday: 'long' }
        });
        calendar.render();
      });

    </script>
<style>
    :root{
        --fc-button-border-color:#5e73e4;
        --fc-button-bg-color:#5e73e4;
        --fc-button-active-bg-color:#5364c5;
        --fc-button-active-border-color:#5364c5;
        --fc-today-bg-color:#bbc4f5;
    }
</style>
<div class="d-flex align-items-center justify-content-end mb-2">

    <x-make_reservation_modal :patients="$patients"/>
</div>
<div class="card mb-4 p-2">
    <div class="card-header p-2 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="m-0">Reservations</h4>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div id='calendar'></div>
    </div>
</div>

@endsection

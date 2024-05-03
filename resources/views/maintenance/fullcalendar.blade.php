<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FullCalendar in HTML</title>
    <!-- Voeg Bootstrap CSS toe voor stijlverbeteringen -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/> --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
</head>
<body>
    <div class="container mt-4">
        @if(auth()->check() && (auth()->user()->role === 'Admin' || auth()->user()->role === 'Headmaintenance'))
            <a href="{{ route('maintenance.create') }}" class="btn btn-info btn-rounded mb-2">Maak afspraak</a>
        @endif
        <div id="calendar"></div>
    </div>    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    @foreach($maintenanceAppointments as $event)
                        {
                            id: '{{ $event->id }}',
                            title: '{{ $event->title }}',
                            start: '{{ $event->start_date }}',
                            end: '{{ $event->end_date }}',
                            backgroundColor: '{{ $event->background_color }}',
                        },
                    @endforeach
                ],
                editable: true,
                eventClick: function(info) {
                    var eventId = info.event.id;
    
                    // Gebruik Laravel-route om de juiste URL op te bouwen
                    var showUrl = '{{ route("maintenance.show", ":id") }}';
                    showUrl = showUrl.replace(':id', eventId);
    
                    // Navigeer naar de detailspagina
                    window.location.href = showUrl;
                },
            });
            
            calendar.render();
        });
    </script>
       
</body>
</html>

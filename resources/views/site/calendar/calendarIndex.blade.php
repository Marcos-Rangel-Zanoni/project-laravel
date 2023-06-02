@include('site.calendar.create.calendarCreate')

<!-- Exibir mensagens de sucesso ou erro -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


<div class="user-calendario">
    <div id="calendar"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var eventos = @json($eventos);
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'GMT-3',
            locale: 'pt-br',
            themeSystem: 'bootstrap5',
            // Configurações do FullCalendar...
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            navLinks: false,
            editable: true,
            events:eventos
        
        });

        calendar.render();
    });
</script>

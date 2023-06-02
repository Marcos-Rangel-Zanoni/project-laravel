@include('layouts.layout')



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/pt-br.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>


@extends('layouts.layout')

@section('content')
    <div class="user-cronograma">

        <form action="{{ route('calendar.store') }}" method="post">
            @csrf
            <div class="cronograma-style">
                <label for="horasPorDia">Quantas matérias você deseja estudar por dia?</label>
                <input type="number" id="horasPorDia" name="horasPorDia"  placeholder="2 Matérias" pattern="[0-6]*" oninput="this.value = this.value.replace(/[^0-6]/g, '')" required>
            </div>
            <div class="cronograma-style">
                <label for="numDias">Quantos dias você deseja estudar?</label>
                <input type="number" id="numDias" name="numDias"  placeholder="12 Dias" required>
            </div>
            <div id="color-cronograma">
                <label for="vestibular">Estudar para vestibular?</label>
                <input type="checkbox" id="vestibular" name="vestibular" value="1" required>
            </div>
            <input id="button-cronograma" type="submit" value="Gerar Cronograma">

        </form>
    @endsection
</div>

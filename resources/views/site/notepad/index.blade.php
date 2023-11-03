@extends('layouts.layout')

@section('content')
    <div class="notepad-content">
        <h1>Minhas Anotações</h1>

        <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3 button-add"><ion-icon name="add-outline"></ion-icon></a>


        <ul class="list-group">
            @foreach ($notes as $note)
                <li class="list-group-item">
                    <h3>{{ $note->title }}</h3>
                    <a href="{{ route('notes.edit', $note) }}" class="btn btn-primary">Abrir</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>


    </div>
@endsection

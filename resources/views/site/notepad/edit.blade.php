@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Editar Anotação</h1>

        <form action="{{ route('notes.update', $note) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $note->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Conteúdo</label>
                <textarea class="form-control" id="content" name="content" rows="4" required>{{ $note->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection

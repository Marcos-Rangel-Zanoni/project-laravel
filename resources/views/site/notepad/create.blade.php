@include('layouts.layout')
@extends('layouts.layout')

@section('content')
    <div class="notepad-content">
        <h1>Nova Anotação</h1>

        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Conteúdo</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection




{{-- <header>
    <h1 class="">Bloco de Notas</h1>

</header>

<section class="add-note">
    <article class="add_note_article">
        <input class="add_note_title" type="text" placeholder="Nota Titulo">
        <textarea class="add_note_text" placeholder="Note Details" autocomplete=""></textarea>
        <button class="add_note_btn">Adicionar</button>
        <button class="delete_all_note_btn">Deletar Todas as Notas</button>
    </article>
</section>
<section class="notes">
    <h1>Lista de Anotações</h1>

    @if ($notes->isEmpty())
        <p>Não há anotações disponíveis.</p>
    @else
        <ul>
            @foreach ($notes as $note)
                <li>
                    <h3>{{ $note->title }}</h3>
                    <p>{{ $note->content }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</section>
<script src="{{ asset('js/blocoDeNotas.js') }}"></script> --}}

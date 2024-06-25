@extends('layouts.admin')

@section('content')
    <div class="container m-3">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/' . $project->cover_image) }}" class="card-img-top" alt="{{ $project->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                <p class="card-text">Autore: {{ $project->author }}</p>
                <p class="card-text">Data di creazione: {{ $project->creation_date }}</p>
                <p class="card-text">Descrizione: {{ $project->description }}</p>
                <p class="card-text">Contenuto: {{ $project->content }}</p>
                <p class="card-text">Tipologia: {{ $project->type?->name }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-start align-items-center m-3">
            <a class="btn btn-outline-primary  m-3" href="{{ route('admin.dashboard') }}">Indietro</a>
            <form class="m-3"" action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST"
                onsubmit="return confirm('Sei sicuro di voler eliminare questo fumetto?');" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Elimina</button>
            </form>
        </div>
    </div>
@endsection

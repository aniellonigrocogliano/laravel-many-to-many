@extends('layouts.admin')

@section('content')
    <div class="container m-3">
        <div class="card" ">
                                                        <img src="{{ asset('storage/' . $project->cover_image) }}" style="width: 18rem; class="card-img-top"
            alt="{{ $project->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                <p class="card-text">Autore: {{ $project->author }}</p>
                <p class="card-text">Data di creazione: {{ $project->creation_date }}</p>
                <p class="card-text">Descrizione: {{ $project->description }}</p>
                <p class="card-text">Contenuto: {{ $project->content }}</p>
                <p class="card-text">Tipologia: {{ $project->type?->name }}</p>
                @foreach ($project->technologies as $technology)
                    <span style="background-color: {{ $technology->color }};"
                        class="badge p-2">{{ $technology->name }}</span>
                @endforeach

            </div>
        </div>
        <div class="d-flex justify-content-start align-items-center m-3">
            <a class="btn btn-outline-primary  m-3" href="{{ route('admin.dashboard') }}">Indietro</a>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                data-bs-target="#deleteModal{{ $project->slug }}">
                <i class="fa-solid fa-trash"></i>
            </button>


            <div class="modal fade" id="deleteModal{{ $project->slug }}" tabindex="-1"
                aria-labelledby="deleteModalLabel{{ $project->slug }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $project->slug }}">Conferma
                                Eliminazione</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Sei sicuro di voler eliminare il progetto "{{ $project->title }}"?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST"
                                class="d-inline" id="deleteForm{{ $project->slug }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

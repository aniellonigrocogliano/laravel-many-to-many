@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Modifica progetto</h1>
        <form action="{{ route('admin.project.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Metodo spoofing per PUT -->

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Titolo</span>
                <input value="{{ old('title', $project->title) }}" id="title" name="title" type="text"
                    class="form-control">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Descrizione</span>
                <textarea id="description" name="description" class="form-control placeholder="Descrizione">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" id="type_id" name="type_id">
                    <option value="" selected>Seleziona una tipologia</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Autore</span>
                <input value="{{ old('author', $project->author) }}" type="text" id="author" name="author"
                    class="form-control">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Descrizione</span>
                <textarea id="content" name="content" class="form-control placeholder="Descrizione">{{ old('content', $project->content) }}</textarea>
            </div>

            <div class="input-group mb-3">
                <input type="file" class="form-control" id="cover_image" name="cover_image">
                <label class="input-group-text" for="cover_image">Upload</label>
                <h4>Preview dell'immagine</h4>
                @if ($project->cover_image)
                    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="Immagine di copertura">
                @endif
            </div>

            <button class="btn btn-success m-3" type="submit">Modifica contenuto</button>
            <a class="m-3 btn btn-outline-danger" href="{{ route('admin.dashboard') }}">Annulla</a>
        </form>
    </div>
@endsection

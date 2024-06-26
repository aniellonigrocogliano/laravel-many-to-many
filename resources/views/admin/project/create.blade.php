@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Aggiungi un nuovo contenuto</h1>
        <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Titolo</span>
                <input id="title" name="title" type="text" class="form-control ">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Descrizione</span>
                <textarea id="description" name="description" class="form-control 
                    placeholder="Descrizione"></textarea>

            </div>
            <div>
                <div class="input-group mb-3">
                    <select class="form-select" aria-label="Default select example" id="type_id" name="type_id">
                        <option value="" selected>Seleziona una tipologia</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <h6>Seleziona le tecnologie</h6>
                @foreach ($technologys as $technology)
                    <div class="form-check form-check-inline">
                        <input class="btn-check" type="checkbox" value="{{ $technology->id }}" id="flexCheckDefault">
                        <label class="btn btn-outline-success btn-sm" for="flexCheckDefault">
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Autore</span>
                <input type="text" class="form-control 
                    aria-describedby="basic-addon3"
                    id="author" name="author" v>

            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Contenuto</span>
                <textarea id="content" name="content" class="form-control"></textarea>

            </div>

            <div class="input-group mb-3">
                <input type="file" class="form-control" id="cover_image" name="cover_image">
                <label class="input-group-text" for="cover_image">Upload</label>
            </div>


            <button class="btn btn-success m-3" type="submit">Aggiungi contenuto</button>
            <a class="m-3 btn btn-outline-danger" href="{{ route('admin.dashboard') }}">Annulla</a>


        </form>
    </div>
@endsection

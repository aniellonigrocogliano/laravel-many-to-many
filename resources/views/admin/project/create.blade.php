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
                <select class="form-select" aria-label="Default select example" id="type_id" name="type_id">
                    <option selected>Seleziona una tipologia</option>
                    <option value="1">Sito web</option>
                    <option value="2">Web app</option>
                    <option value="3">App</option>
                    <option value="4">Sito mobile</option>
                </select>
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

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Aggiungi una nuova tecnologia</h1>
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nome</span>
                <input id="name" name="name" type="text" class="form-control ">

            </div>

            <label for="exampleColorInput" class="form-label">Color picker</label>
            <input type="color" class="form-control form-control-color" id="color" value="#563d7c" name="color"
                title="Choose your color">


            <button class="btn btn-success m-3" type="submit">Aggiungi tecnologia</button>
            <a class="m-3 btn btn-outline-danger" href="{{ route('admin.dashboard') }}">Annulla</a>


        </form>
    </div>
@endsection

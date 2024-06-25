@extends('layouts.app')
@section('content')
    <section class="container flex p-3">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Data di creazione</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->author }}</td>
                        <td>{{ $project->creation_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

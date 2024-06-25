@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="container flex p-3">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Tipo</th>
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
                        <td>{{ $project->type?->name }}</td>
                        <td>{{ $project->author }}</td>
                        <td>{{ $project->creation_date }}</td>
                        <td>
                        <td><a class="btn btn-outline-primary" href="{{ route('admin.projects.show', $project->slug) }}"><i
                                    class="fa-solid fa-eye"></i></a></td>
                        <td><a class="btn btn-outline-warning" href="{{ route('admin.projects.edit', $project->slug) }}}"><i
                                    class="fa-solid fa-pen"></i></a>
                        <td>
                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST"
                                onsubmit="return confirm('Sei sicuro di voler eliminare questo fumetto?');"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

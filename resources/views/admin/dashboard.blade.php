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
                        <td><a class="btn btn-outline-warning" href="{{ route('admin.projects.edit', $project->slug) }}"><i
                                    class="fa-solid fa-pen"></i></a>
                        <td>
                        <td>
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
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicuro di voler eliminare il progetto "{{ $project->title }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.projects.destroy', $project->slug) }}"
                                                method="POST" class="d-inline" id="deleteForm{{ $project->slug }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Elimina</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endsection

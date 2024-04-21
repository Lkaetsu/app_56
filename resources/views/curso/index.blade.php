@extends('components.layout')
@extends('components.modal-create')

@section('content')
    <div class="px-3 py-4">
        <form method="GET" action='#'>
          <input type="text" name="search" placeholder="Buscar"
                 class="bg-transparent placeholder-gray font-semibold text-sm"
                 value="{{ request('search') }}">
        </form>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Create">New Curso</button>
        @section('modal-create')
            <div class="inner">
                <form action="/curso" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name">Nome Completo</label>
                        <input type="text"
                            class="border border-gray-400 p-2 w-full"
                            name="name" 
                            id="name"
                            value="{{ old('name') }}"
                            required>
                            <small id="name" class="form-text text-muted">
                                @error('name')
                                    <p class="error">**{{ $message }}**</p>
                                @enderror
                            </small>
                    </div>
                    <div class="mb-6">
                        <label for="desc">Descrição Simples</label>
                        <input type="text"
                            class="border border-gray-400 p-2 w-full"
                            name="desc" 
                            id="desc"
                            value="{{ old('desc') }}"
                            required>
                        <small id="desc" class="form-text text-muted">
                        @error('desc')
                            <p class="error">**{{ $message }}**</p>
                        @enderror
                        </small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>          
            </div>
        @endsection
    </div>
    @if($cursos->count()>0)
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <caption>Lista de cursos</caption>
                <thead class="dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Professor</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                        <tr>
                            <th scope="row">{{ $curso->id }}</th>
                            <td>{{ $curso->name }}</td>
                            <td>{{ $curso->desc }}</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Alter{{ $curso->id }}">Alter</button></td>
                            <div class="modal" id="Alter{{ $curso->id }}" tabindex="-1" aria-labelledby="Alter{{ $curso->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Alter</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/curso" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-6">
                                                <label for="name">Nome Completo</label>
                                                <input type="text"
                                                    class="border border-gray-400 p-2 w-full"
                                                    name="name" 
                                                    id="name"
                                                    value="{{ $curso->name }}"
                                                    required>
                                                    <small id="name" class="form-text text-muted">
                                                        @error('name')
                                                            <p class="error">**{{ $message }}**</p>
                                                        @enderror
                                                    </small>
                                            </div>
                                            <div class="mb-6">
                                                <label for="desc">desc</label>
                                                <input type="text"
                                                    class="border border-gray-400 p-2 w-full"
                                                    name="desc" 
                                                    id="desc"
                                                    value="{{ $curso->desc }}"
                                                    required>
                                                <small id="desc" class="form-text text-muted">
                                                @error('desc')
                                                    <p class="error">**{{ $message }}**</p>
                                                @enderror
                                                </small>
                                            </div>
                                            <input name="id" type="hidden" value="{{$curso->id}}" />
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Confirm{{ $curso->id }}">Delete</button--></td>
                             <div class="modal" id="Confirm{{ $curso->id }}" tabindex="-1" aria-labelledby="Confirm{{ $curso->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tem certeza?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                            <form action="/curso" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Sim</button>
                                                            <input name="id" type="hidden" value="{{$curso->id}}" />
                                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center">Sem cursos criados até o momento. Deseja criar um?
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Create">New Curso</button>
        </p>
        @endif
@endsection
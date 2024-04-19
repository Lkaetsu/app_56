@extends('components.layout')
@extends('components.modal-create')
@extends('components.modal-alter')
@extends('components.modal-confirm')

@section('content')
    <div class="px-3 py-4">
        <form method="GET" action='#'>
          <input type="text" name="search" placeholder="Buscar"
                 class="bg-transparent placeholder-gray font-semibold text-sm"
                 value="{{ request('search') }}">
        </form>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Create">New Materia</button>
        @section('modal-create')
        <div class="inner">
            <form action="/materia" method="POST">
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
    @if($materias->count()>0)
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <caption>Lista de materias</caption>
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
                    @foreach($materias as $materia)
                        <tr>
                            <th scope="row">{{ $materia->id }}</th>
                            <td>{{ $materia->name }}</td>
                            <td>{{ $materia->desc }}</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Alter">Alter</button></td>
                            @section('modal-alter')
                                <div class="inner">
                                    <form action="/materia" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-6">
                                            <label for="name">Nome Completo</label>
                                            <input type="text"
                                                class="border border-gray-400 p-2 w-full"
                                                name="name" 
                                                id="name"
                                                value="{{ $materia->name }}"
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
                                                value="{{ $materia->desc }}"
                                                required>
                                            <small id="desc" class="form-text text-muted">
                                            @error('desc')
                                                <p class="error">**{{ $message }}**</p>
                                            @enderror
                                            </small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <input name="id" type="hidden" value="{{$materia->id}}" />
                                    </form>          
                                </div>
                            @endsection
                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Confirm">Delete</button--></td>
                            @section('modal-confirm')
                            <form action="/materia" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Sim</button>
                                <input name="id" type="hidden" value="{{$materia->id}}" />
                            </form>
                            @endsection
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center">Sem materias criadas até o momento. Deseja criar uma?
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Create">New Materia</button>
        </p>
        @endif
@endsection
@extends('components.layout')
@extends('components.modal-create')

@section('content')
    <div class="px-3 py-4">
        <form method="GET" action='#'>
          <input type="text" name="search" placeholder="Buscar"
                 class="bg-transparent placeholder-gray font-semibold text-sm"
                 value="{{ request('search') }}">
        </form>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Create">New Aluno</button>
        @section('modal-create')
        <div class="inner">
            <form action="/aluno" method="POST">
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
                    <label for="RA">RA</label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="RA" 
                        id="RA"
                        value="{{ old('RA') }}"
                        required>
                    <small id="RA" class="form-text text-muted">
                    @error('RA')
                        <p class="error">**{{ $message }}**</p>
                    @enderror
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>          
        </div>
        @endsection
    </div>
    @if($alunos->count()>0)
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <caption>Lista de alunos</caption>
                <thead class="dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">RA</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alunos as $aluno)
                        <tr>
                            <th scope="row">{{ $aluno->id }}</th>
                            <td>{{ $aluno->name }}</td>
                            <td>{{ $aluno->RA }}</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Alter">Alter</button--></td>
                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete">Delete</button--></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center">Sem alunos criados até o momento. Deseja criar um?
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Store">New Aluno</button>
        </p>
        @endif
@endsection
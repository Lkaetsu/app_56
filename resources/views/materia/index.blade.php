@extends('components.layout')
@extends('components.modal-create')

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
                    <div class="mb-6">
                        <label for="professor_id">Professor</label>
                        <select name="professor_id" id="professor_id">
                            <option value="">Sem Professor</option>
                            @foreach (\App\Models\Professor::all() as $professor)
                                <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                            @endforeach
                        </select>
                        <small id="professor_id" class="form-text text-muted">
                        @error('professor_id')
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
                            @if ($materia->professor)
                                <td>{{ $materia->professor->name }}</td>
                            @else
                                <td>Sem atribuição de professor até o momento!</td>
                            @endif
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Alter{{ $materia->id }}">Alter</button></td>
                            <div class="modal" id="Alter{{ $materia->id }}" tabindex="-1" aria-labelledby="Alter{{ $materia->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Alter</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
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
                                            <div class="mb-6">
                                                <label for="professor_id">Professor</label>
                                                <select name="professor_id" id="professor_id">
                                                    <option value="">Sem Professor</option>
                                                    @foreach (\App\Models\Professor::all() as $professor)
                                                        <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                                                    @endforeach
                                                </select>
                                                <small id="professor_id" class="form-text text-muted">
                                                @error('professor_id')
                                                    <p class="error">**{{ $message }}**</p>
                                                @enderror
                                                </small>
                                            </div>
                                            <input name="id" type="hidden" value="{{$materia->id}}" />
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Confirm{{ $materia->id }}">Delete</button--></td>
                             <div class="modal" id="Confirm{{ $materia->id }}" tabindex="-1" aria-labelledby="Confirm{{ $materia->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tem certeza?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                            <form action="/materia" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Sim</button>
                                                            <input name="id" type="hidden" value="{{$materia->id}}" />
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
        <p class="text-center">Sem materias criadas até o momento. Deseja criar uma?
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Create">New Materia</button>
        </p>
        @endif
@endsection
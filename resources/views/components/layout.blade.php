<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
          <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    </head>
    <body class="antialiased">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    @if (session()->has('sucesso'))
    <div x-data="{show:true}"
         x-init="setTimeout(()=>show=false,5000)"
         x-show="show">
        <p class="alert alert-info">{{ session()->get('sucesso') }}</p>
    </div>
    @endif
    <a href="/"><h2>CRUD</h2></a>
    <div class="row row-cols-1 row-cols-md-2 g-4 y-5" style="width: 36rem;">
        <div class="col-sm-6">
            <div class="card">
                <h3 class="card-header">
                    <p class="card-text">Tables</p>
                </h3>
                <div class="card-body">
                    <p class="card-text">- <a href="/aluno">Alunos</a></p>
                    <p class="card-text">- <a href="/curso">Cursos</a></p>
                    <p class="card-text">- <a href="/materia">Matérias</a></p>
                    <p class="card-text">- <a href="/professor">Professores</a></p>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    </body>
</html>

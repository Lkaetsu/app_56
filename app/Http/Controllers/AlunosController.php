<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function index(){
        return view('aluno.index',['alunos'=>Aluno::
        filter(request(['search', 'aluno']))->
        paginate(20)->withQueryString()]);
    }

    public function store(){
        $attributes=request()->validate([
            'name'=>'required|max:50',
            'RA'=>'required|unique:alunos,RA',
        ]);
        
        $aluno=Aluno::Create($attributes);

        return redirect('/aluno')->with('sucesso','O aluno foi criado');
        
    }
}

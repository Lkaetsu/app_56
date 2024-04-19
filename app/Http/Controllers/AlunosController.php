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

    public function store(Request $request){
        $attributes=$request->validate([
            'name'=>'required|max:50',
            'RA'=>'required|unique:alunos,RA',
        ]);
        
        $aluno=Aluno::Create($attributes);

        return redirect('/aluno')->with('sucesso','O aluno foi criado');
        
    }
    
    public function update(Request $request, Aluno $aluno){
        $aluno = Aluno::findOrFail($request->id);
        $aluno->update($request->all());
        return redirect('/aluno')->with('sucesso','As informações do aluno foram alteradas');
    }

    public function destroy(Request $request){
        $aluno = Aluno::findOrFail($request->id);
        $aluno->delete();
        return redirect('/aluno')->with('sucesso','O aluno foi deletado');
    }
}    

<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller
{
        public function index(){
        return view('curso.index',['cursos'=>Curso::
        filter(request(['search', 'curso']))->
        paginate(20)->withQueryString()]);
    }

    public function store(Request $request){
        $attributes=$request->validate([
            'name'=>'required|unique:cursos,name|max:50',
            'desc'=>'required',
        ]);
        
        $curso=Curso::Create($attributes);

        return redirect('/curso')->with('sucesso','O curso foi criado');    
    }

    public function update(Request $request, curso $curso){
        $curso = Curso::findOrFail($request->id);
        $curso->update($request->all());
        return redirect('/curso')->with('sucesso','As informações do curso foram alteradas');
    }

    public function destroy(Request $request){
        $curso = Curso::findOrFail($request->id);
        $curso->delete();
        return redirect('/curso')->with('sucesso','O curso foi deletado');
    }
}

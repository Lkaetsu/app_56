<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function index(){
        return view('materia.index',['materias'=>Materia::
        filter(request(['search', 'materia']))->
        paginate(20)->withQueryString()]);
    }

    public function store(Request $request){
        $attributes=$request->validate([
            'name'=>'required|unique:materias,name|max:50',
            'desc'=>'required',
        ]);
        
        $materia=Materia::Create($attributes);

        return redirect('/materia')->with('sucesso','A materia foi criada');    
    }

    public function update(Request $request, Materia $materia){
        $materia = Materia::findOrFail($request->id);
        $materia->update($request->all());
        return redirect('/materia')->with('sucesso','As informações da materia foram alteradas');
    }

    public function destroy(Request $request){
        $materia = Materia::findOrFail($request->id);
        $materia->delete();
        return redirect('/materia')->with('sucesso','A materia foi deletada');
    }
}

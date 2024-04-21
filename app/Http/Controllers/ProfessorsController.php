<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorsController extends Controller
{
    public function index(){
        return view('professor.index',['professors'=>professor::
        filter(request(['search', 'professor']))->
        paginate(20)->withQueryString()]);
    }

    public function store(Request $request){
        $attributes=$request->validate([
            'name'=>'required|max:50',
            'RP'=>'required|numeric|unique:professors,RP',
        ]);
        
        $professor=Professor::Create($attributes);

        return redirect('/professor')->with('sucesso','O professor foi criado');
        
    }
    
    public function update(Request $request, Professor $professor){
        $professor = Professor::findOrFail($request->id);
        $professor->update($request->all());
        return redirect('/professor')->with('sucesso','As informações do professor foram alteradas');
    }

    public function destroy(Request $request){
        $professor = Professor::findOrFail($request->id);
        $professor->delete();
        return redirect('/professor')->with('sucesso','O professor foi deletado');
    }
}

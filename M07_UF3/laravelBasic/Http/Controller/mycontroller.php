<?php

namespace App\Http\Controllers;
use App\Models\tprofesor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class mycontroller extends Controller
{
    public function f_formulari()
    {
        $dades=tprofesor::all();
        return view('insertar', ['dades-insertar.insertar'=>$dades]);
    } 

    public function f_insert(Request $request){

        
        $request->validate([
            'name' => 'required|min:3|max:255',
            
        ],
            [
                'name.required' => 'El nombre és obligatori',
                'name.min' => 'El nombre ha de tenir 3 caràcters com a mínim',
                'name.max' => 'El nombre ha de tenir 255 caràcters com a màxim',
                
            ]
    );

    $todo = new tprofesor;
    $todo->name = $request->name;
    $todo->save();
    return redirect()->route('dades_insertar')->with('success', 'El registre s\'ha creat correctament');

}
}

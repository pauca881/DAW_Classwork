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
        // Validación de los campos
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'nullable|email|unique:tprofesors,email',  // Validación de email (opcional)
            'dni' => 'nullable|unique:tprofesors,dni', // Validación de DNI (opcional)
            'edad' => 'nullable|integer|min:18', // Validación de edad (opcional, mayor de 18)
            'data_naixement' => 'nullable|date', // Validación de fecha de nacimiento (opcional)
            'observacions' => 'nullable|string', // Validación de observaciones (opcional)
        ],
        [
            'name.required' => 'El nombre és obligatori',
            'name.min' => 'El nombre ha de tenir 3 caràcters com a mínim',
            'name.max' => 'El nombre ha de tenir 255 caràcters com a màxim',
    
            'email.email' => 'El correu electrònic no és vàlid',
            'email.unique' => 'Aquest correu electrònic ja està registrat',
    
            'dni.unique' => 'Aquest DNI ja està registrat',
    
            'edad.integer' => 'L\'edat ha de ser un número enter',
            'edad.min' => 'L\'edat mínima ha de ser de 18 anys',
    
            'data_naixement.date' => 'La data de naixement no és vàlida',
    
            'observacions.string' => 'Les observacions han de ser text',
        ]);
    
        // Creación de la nueva entrada en la base de datos
        $todo = new tprofesor;
        $todo->name = $request->name;
        $todo->email = $request->email;  // Asignar email
        $todo->dni = $request->dni;  // Asignar DNI
        $todo->edad = $request->edad;  // Asignar edad
        $todo->data_naixement = $request->data_naixement;  // Asignar fecha de nacimiento
        $todo->observacions = $request->observacions;  // Asignar observaciones
        $todo->save();
    
        return redirect()->route('dades_insertar')->with('success', 'El registre s\'ha creat correctament');
    }


    public function f_consultar(){


        $dades=tprofesor::all();
        //return $dades; //Tornarà JSON
        return view('consultar', compact('dades'));            


    }   

    public function f_consultardetalle(tprofesor $fila)
    {
        
        return view('consultardetalle', ['fila' => $fila]); 

    }

    public function f_buscar_formulari()
    {
        return view('buscar');
    }

    public function f_buscar (Request $request)
    {
        $request->validate(
            [
                'name'=>'required'
            ],
            [
            'name.required'=>'El nombre es obligatorio'            
            ]            
        );
 
        $name=$request->name;
        //dd($nombre); //comprova informació en el SGBD
        $dades=tprofesor::where('name','like',"%$name%")->paginate();
 
        return view('buscarresultado', compact('dades'));  
    }

    public function f_borrar()
    {
        $dades=tprofesor::all();
        //return $dades; //Tornarà JSON
        return view('borrar', compact('dades'));          
    }
 
    public function f_borrarfila($dni)
    {
        $fila = tprofesor::query();    
        $fila->where('dni','like',"%$dni%");        
        $fila->delete();
        return redirect()->route('dades-borrar')->with('success','eliminat correctament');      
    }   

        public function f_modificar()
    {
        $dades=tprofesor::all();
        //return $dades; //Tornarà JSON
        return view('modificar', compact('dades'));            
 
    }
 
    public function f_modificarfila ($dni)
    {
        $fila = tprofesor::query();    
        $fila->where('dni','like',"%$dni%");        
        $fila = $fila->get(); 
 
        return view('modificarfila',compact('fila'));           
    }
 
    public function f_actualitzarfila (Request $request, tprofesor $fila)
    {
        $request->validate(
            [
                'nombre'=> 'required|min:3'
            ],
            [
                'nombre.required'=>"El nom és obligatori",
                'nombre.min'=>"3 caracters mínim"
            ]
            );
 
        $fila->dni=$request->dni;
        $fila->nom=$request->nombre;
        $fila->cognom=$request->apellido;
        $fila->update();
        return redirect()->route('dades-actualitzarfila',$fila)->with('success','actualitzat correctament');
 
    }

    



}

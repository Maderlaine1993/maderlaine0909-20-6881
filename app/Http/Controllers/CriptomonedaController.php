<?php

namespace App\Http\Controllers;

use App\Models\Criptomoneda;
use App\Models\Lenguaje_Programacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CriptomonedaController extends Controller
{
    //Formulario de criptomonedas
    public function criptomonedaform(){
        $criptomoneda=Criptomoneda::all();
        return view('Criptomonedas.criptomonedaform', compact('criptomoneda'));
    }

    //Guardar criptomonedas
    public function save(Request $request){

        //Validamos los campos ingresados
        $validator = $this->validate($request,[
            'logotipo'=> 'required',
            'nombre'=> 'required|string|max:45',
            'precio'=> 'required',
            'descripcion'=> 'required|string|max:200',
            'lenguaje_id'=> 'required'
        ]);

        //Subimos la imagen ingresada para el registro de criptomonedas
        if($request->hasFile('logotipo')){
            $validator['logotipo']= $request->file('logotipo')->store('logotipos', 'public');
        }

        //Creamos los campos validados
        Criptomoneda::create([
            'logotipo'=> $validator ['logotipo'],
            'nombre'=> $validator ['nombre'],
            'precio'=> $validator ['precio'],
            'descripcion'=> $validator ['descripcion'],
            'lenguaje_id'=> $validator ['id_lenguaje']
        ]);

        return back()->with('criptomonedaGuardada','Criptomoneda guardada');
    }

}

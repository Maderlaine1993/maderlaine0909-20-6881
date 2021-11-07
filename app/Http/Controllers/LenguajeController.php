<?php

namespace App\Http\Controllers;

use App\Models\Criptomoneda;
use App\Models\Lenguaje_Programacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LenguajeController extends Controller
{
    //Creamos funcion de listar para lenguaje
    public function lenguajelist(){
        $lenguaje['lenguajes'] = Lenguaje_Programacion::paginate(2);
        return view('LenguajesProgramacion.listarlenguaje', $lenguaje);
    }

    public function lenguajeform(){
        return view('LenguajesProgramacion.lenguajeform');
    }

    public function savelenguaje(){
        $validator = $this->validate($request,[
            'descripcion'=> 'required'
        ]);

        Lenguaje_Programacion::create([
            'descripcion'=> $validator ['descripcion'],
        ]);

        return back()->with('lenguajeGuardado','Lenguaje guardado');
    }


}

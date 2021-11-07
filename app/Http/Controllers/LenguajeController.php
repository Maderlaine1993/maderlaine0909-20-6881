<?php

namespace App\Http\Controllers;

use App\Models\Criptomoneda;
use App\Models\Lenguaje_Programacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LenguajeController extends Controller
{
    //Creamos funcion de listar para lenguaje
    public function lenguajelist(){
        $lenguajes['lenguajes'] = Lenguaje_Programacion::paginate(2);
        return view('LenguajesProgramacion.listarlenguaje', $lenguajes);
    }

    public function lenguajeform(){
        return view('LenguajesProgramacion.lenguajeform');
    }

    public function savelenguaje(Request $request){

        $validator = $this->validate($request,[
            'descripcion_lp'=> 'required'
        ]);

        Lenguaje_Programacion::create([
            'descripcion_lp'=> $validator['descripcion_lp'],
        ]);

        return back()->with('lenguajeGuardado','Lenguaje guardado');
    }

    public function deletelp($id_lenguaje){
        Lenguaje_Programacion::destroy($id_lenguaje);
        return back()->with('lenguajeEliminado','Lenguaje Eliminado');
    }
}

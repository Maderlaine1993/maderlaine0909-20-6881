<?php

namespace App\Http\Controllers;

use App\Models\Criptomoneda;
use App\Models\Lenguaje_Programacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LenguajeController extends Controller
{
    //Formulario de criptomonedas
    public function criptomonedaform(){
        $lenguaje=Lenguaje_Programacion::all();
        return view('Criptomonedas.criptomonedaform', compact('lenguaje'));
    }

    //Guardar criptomonedas
    public function save(Request $request){

        //Validamos los campos ingresados
        $validator = $this->validate($request,[
            'descripcion'=> 'required|string|max:200',
        ]);

        //Creamos los campos validados
        Criptomoneda::create([
            'descripcion'=> $validator ['descripcion'],
        ]);

        return back()->with('criptomonedaGuardada','Criptomoneda guardada');
    }

    //Creamos funcion para eliminar los registros creados de criptomonedas
    public function delete($id){
        $criptomonedas= Criptomoneda::findOrfail($id);

        if(Storage::delete('public/'.$criptomonedas->logotipo)){
            Criptomoneda::destroy($id);
        }
        return back()->with('criptomonedaEliminada','Criptomoneda Eliminada');
    }

    //Creamos funcion para el formulario de modificar
    public function editlenguaje($id){
        $lenguaje=Lenguaje_Programacion::all();
        $criptomoneda = Criptomoneda::findOrFail($id);
        return view('Criptomonedas.editarcriptomoneda', compact('criptomoneda', 'lenguaje'));
    }

    //Creamos funcion para modificar el registro de criptomonedas
    public function edit(Request $request,$id){
        $dataLenguaje=request()->except((['_token', '_method']));
        Criptomoneda::where('id','=', $id)->update($dataLenguaje);
        return back()->with('lenguajeModificado', 'Lenguaje Modificado');
    }

    //Creamos funcion de listar para lenguaje
    public function lenguajelist(){
        $lenguaje['lenguajes'] = Lenguaje_Programacion::paginate(2);
        return view('LenguajesProgramacion.listarlenguaje', $lenguaje);
    }
}

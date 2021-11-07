<?php

namespace App\Http\Controllers;

use App\Models\Criptomoneda;
use App\Models\Lenguaje_Programacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CriptomonedaController extends Controller
{
    //Listado de criptomonedas
    public function list()
    {
        $criptomonedas = DB::table('criptomoneda')
            ->join('lenguaje_programacion', 'criptomoneda.lenguaje_id', '=', 'lenguaje_programacion.id_lenguaje')
            ->select('criptomoneda.*', 'lenguaje_programacion.descripcion_lp')
            ->paginate(5);
        return view('Criptomonedas.listarcriptomoneda', compact('criptomonedas'));
    }

    //Formulario de criptomonedas
    public function criptomonedaform(){
        $lenguaje=Lenguaje_Programacion::all();
        return view('Criptomonedas.criptomonedaform', compact('lenguaje'));
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
            'lenguaje_id'=> $validator ['lenguaje_id']
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
    public function editcriptomoneda($id){
        $lenguaje=Lenguaje_Programacion::all();
        $criptomoneda = Criptomoneda::findOrFail($id);
        return view('Criptomonedas.editarcriptomoneda', compact('criptomoneda', 'lenguaje'));
    }

    //Creamos funcion para modificar el registro de criptomonedas
    public function edit(Request $request,$id){
        $dataCriptomoneda=request()->except((['_token', '_method']));

        //Subimos la imagen ingresada para agregar a la criptomoneda
        if($request->hasFile('logotipo')){
            $criptomoneda = Criptomoneda::findOrFail($id);
            Storage::delete('public/'.$criptomoneda->logotipo);
            $dataCriptomoneda['logotipo']= $request->file('logotipo')->store('logotipos', 'public');
        }

        Criptomoneda::where('id','=', $id)->update($dataCriptomoneda);
        return back()->with('criptomonedaModificada', 'Criptomoneda Modificada');
    }
}

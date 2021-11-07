@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center font-weight-bold mb-3"> Criptomonedas Guardadas </h2>
                <a class="btn btn-success font-weight-bold mb-5" href="{{url('/form') }}"> Registrar criptomonedas </a>

                <table class="table table-bordered table-striped table-light table-hover text-center">
                    <thead>
                    <tr class="table-info font-weight-bold">
                        <td>Logotipo</td>
                        <td>Nombre</td>
                        <td>Precio</td>
                        <td>Descripción</td>
                        <td>Lenguaje</td>
                        <td>Acciones</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($criptomonedas as $criptomoneda)
                        <tr>
                            <td>
                                <img src="{{asset('storage').'/'.$criptomoneda->logotipo}}" width="75">
                            </td>
                            <td>{{$criptomoneda->nombre}}</td>
                            <td>{{$criptomoneda->precio}}</td>
                            <td>{{$criptomoneda->descripcion}}</td>
                            <td>{{$criptomoneda->descripcion_lp}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$criptomonedas->links()}}
            </div>

        </div>

    </div>
@endsection

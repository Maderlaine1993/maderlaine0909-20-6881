@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center font-weight-bold mb-3"> Criptomonedas Guardadas </h2>
                <a class="btn btn-success font-weight-bold mb-2" href="{{url('/form') }}"> Registrar criptomonedas </a>

                <!--Mensaje de Alerta-->
                @if(session('criptomonedaEliminada'))
                    <div class="alert alert-danger">
                        {{session('criptomonedaEliminada')}}
                    </div>
                @endif

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
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary mb-2 mr-3" href="{{route('editcriptomoneda', $criptomoneda->id)}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{route('delete', $criptomoneda->id)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Desea eliminar el registro')" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$criptomonedas->links()}}
            </div>

        </div>

    </div>
@endsection

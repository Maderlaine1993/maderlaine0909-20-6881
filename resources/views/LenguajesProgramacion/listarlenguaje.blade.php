@extends('layouts.base')
@section('content')
    <div class="container mt-5" action="{{url('/lenguajelist')}}">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center font-weight-bold mb-3"> Lenguajes Guardados </h2>
                <a class="btn btn-success font-weight-bold mb-2" href="{{url('/lenguajeform') }}"> Registrar lenguaje </a>

                <table class="table table-bordered table-striped table-light table-hover text-center">
                    <thead>
                    <tr class="table-info font-weight-bold">
                        <td>Id</td>
                        <td>Descripcion</td>
                        <td>Acciones</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lenguajes as $lenguaje)
                        <tr>
                            <td>{{$lenguaje->id_lenguaje}}</td>
                            <td>{{$lenguaje->descripcion_lp}}</td>
                            <td>
                                <div class="btn-group">

                                    <form action="{{route('deletelp', $lenguaje->id_lenguaje)}}" method="POST">
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
                {{$lenguajes->links()}}
            </div>

        </div>

    </div>
@endsection

@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">

                <!--Mensaje de alerta-->
                @if(session('lenguajeModificado'))
                    <div class="alert alert-success">
                        {{ session('lenguajeModificado') }}
                    </div>
                @endif

            <!--Validación de errores-->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card" >
                    <form action="{{ route('editar', $lenguaje->id_lenguaje)}}" method="POST">
                        @csrf @method('PATCH')

                        <div class="card-header text-center font-weight-bold">Editar Lenguaje</div>

                        <div class="card-body">
                            <div class="row form-group">
                                <label for="" class="col-3 font-weight-bold" >Descripcion</label>
                                <input type="text" name="descripcion_lp" class="form-control col-md-8" value="{{$lenguaje->descripcion_lp}}">
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-success col-md-8 offset-3 font-weight-bold">Guardar</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection

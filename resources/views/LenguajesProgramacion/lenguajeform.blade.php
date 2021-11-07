@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">

                <!--Mensaje de alerta-->
                @if(session('lenguajeGuardado'))
                    <div class="alert alert-success">
                        {{ session('lenguajeGuardado') }}
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
                    <form action="{{ url('/save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center font-weight-bold">Registrar Lenguaje</div>

                            <div class="row form-group">
                                <label for="" class="col-2 font-weight-bold" >Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9">
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-success col-md-9 offset-2 font-weight-bold">Guardar</button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection

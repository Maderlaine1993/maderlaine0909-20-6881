@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">

                <!--Mensaje de alerta-->
                @if(session('criptomonedaModificada'))
                    <div class="alert alert-success">
                        {{ session('criptomonedaModificada') }}
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
                    <form action="{{ url('/edit', $criptomoneda->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-header text-center font-weight-bold">Modificar criptomonedas</div>

                        <div class="card-body">

                            <div class="row form-group">
                                <label for="" class="col-2 font-weight-bold">Logotipo</label>
                                <div class="custom-file col-md-9">
                                    <input type="file" name="logotipo" class="custom-file-input">
                                    <label class="custom-file-label text-center" for="inputGroupFile04"> Subir Logotipo </label>
                                </div>
                            </div>

                            <img src="{{asset('storage').'/'.$criptomoneda->logotipo}}" width="75">

                            <div class="row form-group">
                                <label for="" class="col-2 font-weight-bold">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{$criptomoneda->nombre}}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2 font-weight-bold" >Precio</label>
                                <input type="text" name="precio" class="form-control col-md-9" value="{{$criptomoneda->precio}}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2 font-weight-bold" >Descripcion</label>
                                <input type="text" name="descripcion" class="form-control col-md-9" value="{{$criptomoneda->descripcion}}">
                            </div>

                            <div class=" row form-group">
                                <label for="" class="col-2 font-weight-bold">Lenguaje</label>
                                <select name="lenguaje_id" class="form-control col-md-9" value="{{$criptomoneda->lenguaje}}">
                                    <option value="">--Seleccionar--</option>

                                    @foreach( $lenguaje as $lenguajes)
                                        <option value="{{$lenguajes->id_lenguaje}}"> {{$lenguajes->descripcion_lp}}  </option>
                                    @endforeach
                                </select>
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

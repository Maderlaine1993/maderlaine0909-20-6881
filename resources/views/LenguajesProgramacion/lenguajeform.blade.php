@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">

                <div class="card" >
                    <form action="{{ url('/lenguajeform')}}" method="POST">
                        @csrf

                        <div class="card-header text-center font-weight-bold">Registrar Lenguaje</div>

                        <div class="card-body">
                            <div class="row form-group">
                                <label for="" class="col-2 font-weight-bold" >Descripcion</label>
                                <input type="text" name="descripcion" class="form-control col-md-9">
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

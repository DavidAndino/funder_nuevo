@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="page__heading">Editar Asegurado</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <form action="{{ route('asegurados.update', $asegurado->COD_ASEGURADO) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="COD_CAJARURAL">Caja Rural</label>
                                            <input type="text" name="COD_CAJARURAL" class="form-control"
                                                value="{{ $asegurado->COD_CAJARURAL }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="NUM_IDENTIDAD">DNI</label>
                                            <input type="text" name="NUM_IDENTIDAD" class="form-control"
                                                value="{{ $asegurado->NUM_IDENTIDAD }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="NOM_ASEGURADO">Nombres</label>
                                            <input type="text" name="NOM_ASEGURADO" class="form-control"
                                                value="{{ $asegurado->NOM_ASEGURADO }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="APE_ASEGURADO">Apellidos</label>
                                            <input type="text" name="APE_ASEGURADO" class="form-control"
                                                value="{{ $asegurado->APE_ASEGURADO }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="SEX_ASEGURADO">Género</label>
                                            {!! Form::select ( 'SEX_ASEGURADO', ['M' => 'Masculino', 'F' => 'Femenino']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="IND_CIVIL">Estado Civil</label>
                                                {!! Form::select('IND_CIVIL', ['S' => 'Soltero', 'C' => 'Casado', 'D' => 'Divorciado',
                                                'V' => 'Viudo']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="FEC_NACIMIENTO">Fecha Nacimiento</label>
                                            <input type="date" name="FEC_NACIMIENTO" class="form-control"
                                                value="{{ $asegurado->FEC_NACIMIENTO }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="TIP_PERSONA">Tipo de Persona</label>
                                            {!! Form::select('TIP_PERSONA', ['N' => 'Natural', 'J' => 'Jurídica']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="TIP_ASEGURADO">Tipo de Asegurado</label>
                                            {!! Form::select('TIP_ASEGURADO', ['N' => 'Normal', 'S' => 'Socio']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="OCUPACION_ASEGURADO">Ocupación</label>
                                            <input type="text" name="OCUPACION_ASEGURADO" class="form-control"
                                                value="{{ $asegurado->OCUPACION_ASEGURADO }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="NOM_NEGOCIO">Nombre de Negocio</label>
                                            <input type="text" name="NOM_NEGOCIO" class="form-control"
                                                value="{{ $asegurado->NOM_NEGOCIO }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="GIRO_NEGOCIO">Giro del Negocio</label>
                                            <input type="text" name="GIRO_NEGOCIO" class="form-control"
                                                value="{{ $asegurado->GIRO_NEGOCIO }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="IND_ASEGURADO">Estado</label>
                                            {!! Form::select('IND_ASEGURADO', ['V' => 'Con vida', 'F' => 'Fallecido']) !!}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ingresar Asegurados</h3>
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
                                <!--boton para cerrar msj de aletar-->
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                        {!! Form::open(array('route' => 'asegurados.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="COD_CAJARURAL">Caja Rural</label>
                                    {!! Form::text('COD_CAJARURAL', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="NUM_IDENTIDAD">DNI</label>
                                    {!! Form::text('NUM_IDENTIDAD', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="NOM_ASEGURADO">Nombres</label>
                                    {!! Form::text('NOM_ASEGURADO', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="APE_ASEGURADO">Apellidos</label>
                                    {!! Form::text('APE_ASEGURADO', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="SEX_ASEGURADO">Género</label>
                                    {!! Form::select('SEX_ASEGURADO', ['Seleccione', 'M' => 'Masculino', 'F' => 'Femenino']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="IND_CIVIL">Estado Civil</label>
                                    {!! Form::select('IND_CIVIL', ['Seleccione', 'S' => 'Soltero', 'C' => 'Casado', 'D' => 'Divorciado',
                                                                    'V' => 'Viudo']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="FEC_NACIMIENTO">Fecha Nacimiento</label>
                                    {!! Form::date('FEC_NACIMIENTO', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="TIP_PERSONA">Tipo de Persona</label>
                                    {!! Form::select('TIP_PERSONA', ['Seleccione', 'N' => 'Natural', 'J' => 'Jurídica']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="TIP_ASEGURADO">Tipo de Asegurado</label>
                                    {!! Form::select('TIP_ASEGURADO', ['Seleccione', 'N' => 'Normal', 'S' => 'Socio']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="OCUPACION_ASEGURADO">Ocupación</label>
                                    {!! Form::text('OCUPACION_ASEGURADO', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="NOM_NEGOCIO">Nombre de Negocio</label>
                                    {!! Form::text('NOM_NEGOCIO', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="GIRO_NEGOCIO">Giro de Negocio</label>
                                    {!! Form::text('GIRO_NEGOCIO', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="IND_ASEGURADO">Estado</label>
                                    {!! Form::select('IND_ASEGURADO', ['V' => 'Con vida']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

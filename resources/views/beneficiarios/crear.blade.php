@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registrar Beneficiarios de Asegurados</h3>
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

                        {!! Form::open(array('route' => 'beneficiarios.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="mb-3">
                                <label for="" class="form-label">Asegurado</label>
                                <select name="COD_ASEGURADO" id="" class="form-control">
                                    @foreach ($asegurados as $asegurado)
                                        <!--Valindado si el asegurado está vivo para poder crearle una póliza-->
                                        @if ($asegurado->IND_ASEGURADO == 'V')
                                        <option value="{{ $asegurado->COD_ASEGURADO }}">{{ $asegurado->NOM_ASEGURADO}}</option>
                                        <!--pasando el id en value porque en la tabla de productos de la BD es lo que se guarda
                                        pero en medio de option se pasa el nombre de la categoría que aparecerá en el combo box-->
                                        @endif
                                    @endforeach

                                </select>

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label for="NOM_BENEFICIARIO">Nombre Completo</label>
                                    {!! Form::text('NOM_BENEFICIARIO', null, array('class' => 'form-control')) !!}
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
                                    <label for="PARENTESCO">Parentesco con Asegurado</label>
                                    {!! Form::text('PARENTESCO', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="PARTICIPACION">Porcentaje de Participación</label>
                                    {!! Form::text('PARTICIPACION', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="IND_BENEFICIARIO">Estado</label>
                                    {!! Form::select('IND_BENEFICIARIO', ['V' => 'Con vida']) !!}
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

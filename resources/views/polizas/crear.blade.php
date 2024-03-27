@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ingresar Póliza</h3>
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

                            {!! Form::open(['route' => 'polizas.store', 'method' => 'POST']) !!}

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="" class="form-label">DNI Asegurado</label>
                                    <select name="COD_ASEGURADO" id="" class="form-control">
                                        @foreach ($asegurados as $asegurado)
                                        <!--Valindado si el asegurado está vivo para poder crearle una póliza-->
                                        @if ($asegurado->IND_ASEGURADO == 'V')
                                            <option value="{{ $asegurado->COD_ASEGURADO }}">{{ $asegurado->NUM_IDENTIDAD }}</option>
                                                <!--pasando el id en value porque en la tabla de polizas de la BD es lo que se guarda
                                        pero en medio de option se pasa el número de dni que aparecerá en el combo box-->
                                        @endif
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="NOM_POLIZA">Código</label>
                                        {!! Form::text('NOM_POLIZA', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="COD_PAGO">Recibo</label>
                                        {!! Form::text('COD_PAGO', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="FEC_APERTURA">Fecha de Apertura</label>
                                        {!! Form::date('FEC_APERTURA', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="FEC_VENCIMIENTO">Fecha de Vencimiento</label>
                                        {!! Form::date('FEC_VENCIMIENTO', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <label for="" class="form-label">Total Prima</label>
                                <select name="COD_TIP_POLIZA" id="" class="form-control">
                                    @foreach ($tipopolizas as $tipopoliza)
                                        <!--Validando que solo aparescan los tipos de póliza activos-->
                                        @if ($tipopoliza->IND_TIP_POLIZA == 'A')
                                            <option value="{{ $tipopoliza->COD_TIP_POLIZA }}">{{ $tipopoliza->VAL_PRIMA }}
                                            </option>
                                        @endif
                                    @endforeach

                                </select>
                                <br>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <label for="" class="form-label">Monto Seguro</label>
                                <select name="COD_TIP_POLIZA" id="" class="form-control">
                                    @foreach ($tipopolizas as $tipopoliza)
                                        @if ($tipopoliza->IND_TIP_POLIZA == 'A')
                                            <option value="{{ $tipopoliza->COD_TIP_POLIZA }}">{{ $tipopoliza->MON_SEGURO }}
                                            </option>
                                        @endif
                                    @endforeach

                                </select>

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="IND_POLIZA">Estado</label>
                                    {!! Form::select('IND_POLIZA', ['A' => 'Activa'], ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-6">
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

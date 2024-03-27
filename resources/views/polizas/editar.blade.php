@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Póliza</h3>
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

                        {!! Form::model($poliza, ['method' => 'PATCH','route' => ['polizas.update', $poliza->COD_POLIZA]]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="NOM_POLIZA">Código</label>
                                    {!! Form::text('NOM_POLIZA', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="COD_PAGO">Recibo</label>
                                    {!! Form::text('COD_PAGO', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="FEC_APERTURA">Fecha de Apertura</label>
                                    {!! Form::date('FEC_APERTURA', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="FEC_VENCIMIENTO">Fecha de Vencimiento</label>
                                    {!! Form::date('FEC_VENCIMIENTO', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="" class="form-label">Total Prima</label>
                            <select name="COD_TIP_POLIZA" id="" class="form-control">
                                @foreach ($tipopolizas as $tipopoliza)
                                @if ($tipopoliza->COD_TIP_POLIZA == $poliza->COD_TIP_POLIZA)
                                    <option value="{{ $tipopoliza->COD_TIP_POLIZA }}" selected>{{ $tipopoliza->VAL_PRIMA }}</option>
                                @else
                                    <option value="{{ $tipopoliza->COD_TIP_POLIZA }}">{{ $tipopoliza->VAL_PRIMA }}</option>
                                @endif
                                @endforeach

                            </select>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="" class="form-label">Monto de Seguro</label>
                            <select name="COD_TIP_POLIZA" id="" class="form-control">
                                @foreach ($tipopolizas as $tipopoliza)
                                @if ($tipopoliza->COD_TIP_POLIZA == $poliza->COD_TIP_POLIZA)
                                    <option value="{{ $tipopoliza->COD_TIP_POLIZA }}" selected>{{ $tipopoliza->MON_SEGURO }}</option>
                                @else
                                    <option value="{{ $tipopoliza->COD_TIP_POLIZA }}">{{ $tipopoliza->MON_SEGURO }}</option>
                                @endif

                                @endforeach

                            </select>
                        </div>
                        <br>
                        <br>

                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="IND_POLIZA">Estado</label>
                                {!! Form::select('IND_POLIZA', ['A' => 'Activa', 'I' => 'Inactiva'], ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <br>
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

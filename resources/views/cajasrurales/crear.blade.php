@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Agregar Una Caja Rural</h3>
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

                        {!! Form::open(array('route' => 'cajasrurales.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="NOM_CAJA_RURAL">Nombre</label>
                                    {!! Form::text('NOM_CAJA_RURAL', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="IND_CAJA_RURAL">Estado</label>
                                    {!! Form::select('IND_CAJA_RURAL', ['A' => 'Activa'], ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

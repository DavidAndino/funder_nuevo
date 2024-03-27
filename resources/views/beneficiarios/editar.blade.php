@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="page__heading">Editar Beneficiario</h1>
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


                            <form action="{{ route('beneficiarios.update', $beneficiario->COD_BENEFICIARIO) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="" class="form-label">Asegurado</label>
                                    <select name="COD_ASEGURADO" id="" class="form-control">
                                        @foreach ($asegurados as $asegurado)
                                        @if ($asegurado->COD_ASEGURADO == $beneficiario->COD_ASEGURADO)
                                            <option value="{{ $asegurado->COD_ASEGURADO }}" selected>{{ $asegurado->NOM_ASEGURADO }}</option>
                                        @else
                                            <option value="{{ $asegurado->COD_ASEGURADO }}">{{ $asegurado->NOM_ASEGURADO }}</option>
                                        @endif

                                            <!--pasando el id en value porque en la tabla de productos de la BD es lo que se guarda
                                            pero en medio de option se pasa el nombre de la categoría que aparecerá en el combo box-->
                                        @endforeach

                                    </select>
                                </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="NOM_BENEFICIARIO">Nombre completo</label>
                                            <input type="text" name="NOM_BENEFICIARIO" class="form-control"
                                                value="{{ $beneficiario->NOM_BENEFICIARIO }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="NUM_IDENTIDAD">DNI</label>
                                            <input type="text" name="NUM_IDENTIDAD" class="form-control"
                                                value="{{ $beneficiario->NUM_IDENTIDAD }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="PARTICIPACION">Porcentaje de Participación</label>
                                            <input type="text" name="PARTICIPACION" class="form-control"
                                                value="{{ $beneficiario->PARTICIPACION }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="PARENTESCO">Parentesco</label>
                                            <input type="text" name="PARENTESCO" class="form-control"
                                                value="{{ $beneficiario->PARENTESCO }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">

                                        <div class="form-group">
                                            <label for="IND_BENEFICIARIO">Estado</label>
                                            {!! Form::select('IND_BENEFICIARIO', ['V' => 'Con vida', 'F' => 'Fallecido']) !!}
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

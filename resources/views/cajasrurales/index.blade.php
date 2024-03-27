@extends('layouts.app')

@section('content')
    <section class="section" >
        <div class="section-header" style="background-color:#6777ef">
            <h1 class="page__heading" style="color:white">Cajas Rurales</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-success" href="{{ route('cajasrurales.create') }}">Nueva</a>

                            <table class="table table-striped mt-2 table-sm">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nº</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Departamento</th>
                                    <th style="color:#fff;">Municipio</th>
                                    <th style="color:#fff;">Aldea</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Fecha Registro</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($cajasrurales as $cajaRural)
                                        <tr>
                                            <td scope="row">{{$i++}}</td>
                                            <td style="display: none;">{{ $cajaRural->COD_TIP_POLIZA }}</td>
                                            <td>{{ $cajaRural->NOM_CAJA_RURAL }}</td>

                                            <td>{{ $cajaRural->IND_CAJA_RURAL }}</td>
                                            <td>{{ $cajaRural->FEC_REGISTRO }}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('cajasrurales.edit', $cajaRural->COD_CAJA_RURAL) }}">Editar</a>

                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['cajasrurales.destroy', $cajaRural->COD_CAJA_RURAL],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $cajasrurales->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

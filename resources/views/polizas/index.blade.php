@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header" style="background-color:#6777ef">
            <h1 class="page__heading" style="color:white">Pólizas</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-success" href="{{ route('polizas.create') }}">Nueva</a>

                            <table class="table table-striped mt-2 table-hover table-sm">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nº</th>
                                    <th style="color:#fff;">Código</th>
                                    <th style="color:#fff;">Recibo</th>
                                    <th style="color:#fff;">Fecha Apertura</th>
                                    <th style="color:#fff;">Fecha Vencimiento</th>
                                    <th style="color:#fff;">Total Prima</th>
                                    <th style="color:#fff;">Monto Seguro</th>
                                    <th style="color:#fff;">Código Cliente</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Fecha Registro</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($polizas as $poliza)
                                        <tr>
                                            <td style="display: none;">{{ $poliza->COD_POLIZA }}</td>
                                            <td scope="row">{{$i++}}</td>
                                            <td>{{ $poliza->NOM_POLIZA }}</td>
                                            <td>{{ $poliza->COD_PAGO }}</td>
                                            <td>{{ $poliza->FEC_APERTURA }}</td>
                                            <td>{{ $poliza->FEC_VENCIMIENTO }}</td>
                                            <td>{{ $poliza->tipoPolizaFk->VAL_PRIMA }}</td>
                                            <td>{{ $poliza->tipoPolizaFk->MON_SEGURO }}</td>
                                            <td>{{ $poliza->aseguradoFk->COD_ASEGURADO }}</td>
                                            <td>{{ $poliza->IND_POLIZA }}</td>
                                            <td>{{ $poliza->FEC_REGISTRO }}</td>

                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('polizas.edit', $poliza->COD_POLIZA) }}">Editar</a>

                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['polizas.destroy', $poliza->COD_POLIZA],
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
                                {!! $polizas->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

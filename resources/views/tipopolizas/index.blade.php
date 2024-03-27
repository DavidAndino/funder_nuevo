@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header" style="background-color:#6777ef">
            <h1 class="page__heading" style="color:white">Tipos de Póliza</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-success" href="{{ route('tipopolizas.create') }}">Nuevo</a>

                            <table class="table table-striped mt-2 table-hover table-sm">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nº</th>
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Valor de Prima</th>
                                    <th style="color:#fff;">Monto de Seguro</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Usuario Registro</th>
                                    <th style="color:#fff;">Fecha Registro</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($tipopolizas as $tipoPoliza)
                                        <tr>
                                            <td scope="row">{{$i++}}</td>
                                            <td style="display: none;">{{ $tipoPoliza->COD_TIP_POLIZA }}</td>
                                            <td>{{ $tipoPoliza->VAL_PRIMA }}</td>
                                            <td>{{ $tipoPoliza->MON_SEGURO }}</td>
                                            <td>{{ $tipoPoliza->IND_TIP_POLIZA }}</td>
                                            <td>{{ $tipoPoliza->USR_REGISTRO }}</td>
                                            <td>{{ $tipoPoliza->FEC_REGISTRO }}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('tipopolizas.edit', $tipoPoliza->COD_TIP_POLIZA) }}">Editar</a>

                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['tipopolizas.destroy', $tipoPoliza->COD_TIP_POLIZA],
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
                                {!! $tipopolizas->links() !!}
                            </div>
                            <!--color botones azul claro: info-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

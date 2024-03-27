@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header" style="background-color:#6777ef">
            <h1 class="page__heading" style="color:white">Beneficiarios</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-15">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-success" href="{{ route('beneficiarios.create') }}">Nuevo</a>

                            <table class="table table-striped mt-2 table-hover table-sm">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nº</th>
                                    <th style="display: none;">Código</th>
                                    <th style="color:#fff;">Asegurado</th>
                                    <th style="color:#fff;">Nombre Completo</th>
                                    <th style="color:#fff;">DNI</th>
                                    <th style="color:#fff;">Participación</th>
                                    <th style="color:#fff;">Parentesco</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Fecha Registro</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($beneficiarios as $beneficiario)
                                        <tr>
                                            <td scope="row">{{$i++}}</td>

                                            <td>{{ $beneficiario->aseguradoFk->NOM_ASEGURADO }}</td>
                                            <td>{{ $beneficiario->NOM_BENEFICIARIO }}</td>
                                            <td>{{ $beneficiario->NUM_IDENTIDAD }}</td>
                                            <td>{{ $beneficiario->PARTICIPACION }}</td>
                                            <td>{{ $beneficiario->PARENTESCO }}</td>
                                            <td>{{ $beneficiario->IND_BENEFICIARIO }}</td>
                                            <td>{{ $beneficiario->FEC_REGISTRO }}</td>

                                            <td>
                                                <form action="{{ route('beneficiarios.destroy', $beneficiario->COD_BENEFICIARIO) }}"
                                                    method="POST">
                                                    @can('editar-beneficiario')
                                                        <a class="btn btn-primary"
                                                            href="{{ route('beneficiarios.edit', $beneficiario->COD_BENEFICIARIO) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-beneficiario')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $beneficiarios->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

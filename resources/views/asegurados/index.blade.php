@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header" style="background-color:#6777ef">
      <h1 class="page__heading" style="color:white">Asegurados</h1>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-22">
                  <div class="card">
                      <div class="card-body">
                          <a class="btn btn-success" href="{{ route('asegurados.create') }}">Nuevo</a>

                            <table class="table table-striped mt-2 table-sm table-hover">
                              <thead style="background-color:#6777ef">
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Nº</th>
                                  <th style="color:#fff;">Caja Rural</th>
                                  <th style="color:#fff;">DNI</th>
                                  <th style="color:#fff;">Nombres</th>
                                  <th style="color:#fff;">Apellidos</th>
                                  <th style="color:#fff;">Género</th>
                                  <th style="color:#fff;">Estado Civil</th>
                                  <th style="color:#fff;">Fecha Nacimiento</th>
                                  <th style="color:#fff;">Tipo persona</th>
                                  <th style="color:#fff;">Tipo Asegurado</th>
                                  <th style="color:#fff;">Ocupación</th>
                                  <th style="color:#fff;">Nombre Negocio</th>
                                  <th style="color:#fff;">Giro Negocio</th>
                                  <th style="color:#fff;">Estado</th>
                                  <th style="color:#fff;">Fecha Registro</th>
                                  <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($asegurados as $asegurado)
                                  <tr>
                                    <td scope="row">{{$i++}}</td>
                                    <td style="display: none;">{{ $asegurado->id }}</td>
                                    <td>{{ $asegurado->COD_CAJRURAL }}</td>
                                    <td>{{ $asegurado->NUM_IDENTIDAD }}</td>
                                    <td>{{ $asegurado->NOM_ASEGURADO }}</td>
                                    <td>{{ $asegurado->APE_ASEGURADO }}</td>
                                    <td>{{ $asegurado->SEX_ASEGURADO }}</td>
                                    <td>{{ $asegurado->IND_CIVIL }}</td>
                                    <td>{{ $asegurado->FEC_NACIMIENTO }}</td>
                                    <td>{{ $asegurado->TIP_PERSONA }}</td>
                                    <td>{{ $asegurado->TIP_ASEGURADO }}</td>
                                    <td>{{ $asegurado->OCUPACION_ASEGURADO }}</td>
                                    <td>{{ $asegurado->NOM_NEGOCIO }}</td>
                                    <td>{{ $asegurado->GIRO_NEGOCIO }}</td>
                                    <td>{{ $asegurado->IND_ASEGURADO }}</td>
                                    <td>{{ $asegurado->FEC_REGISTRO }}</td>

                                    <td>
                                        <form action="{{ route('asegurados.destroy',$asegurado->COD_ASEGURADO) }}" method="POST">
                                            @can('editar-asegurado')
                                            <a class="btn btn-warning" href="{{ route('asegurados.edit', $asegurado->COD_ASEGURADO) }}">Editar</a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-asegurado')
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
                            {!! $asegurados->links() !!}
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection

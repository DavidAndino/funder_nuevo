@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Menú Principal</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">

                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Usuarios</h5>
                                            @php
                                                use App\Models\User;
                                                $cant_usuarios = User::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{ $cant_usuarios }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Roles</h5>
                                            @php
                                                use Spatie\Permission\Models\Role;
                                                $cant_roles = Role::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-user-lock f-left"></i><span>{{ $cant_roles }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Blogs</h5>
                                            @php
                                                use App\Models\Blog;
                                                $cant_blogs = Blog::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-blog f-left"></i><span>{{ $cant_blogs }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/blogs" class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">

                                        <div class="card-block">
                                            <img class="card-img-top" src="" alt="">
                                            <h4 class="">Asegurados</h4>
                                            @php
                                                use App\Models\Asegurado;
                                                $cant_asegurados = Asegurado::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-blog f-left"></i><span>{{ $cant_asegurados }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/asegurados" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Beneficiarios</h5>
                                            @php
                                                use App\Models\Beneficiario;
                                                $cant_beneficiarios = Beneficiario::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-blog f-left"></i><span>{{ $cant_beneficiarios }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="/beneficiarios" class="text-white">Ver
                                                    más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Pólizas</h5>
                                            @php
                                                use App\Models\Poliza;
                                                $cant_polizas = Poliza::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-blog f-left"></i><span>{{ $cant_polizas }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/polizas" class="text-white">Ver
                                                    más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Tipo de Pólizas</h5>
                                            @php
                                                use App\Models\TipoPoliza;
                                                $cant_tip_pol = TipoPoliza::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-blog f-left"></i><span>{{ $cant_tip_pol }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/tipopolizas" class="text-white">Ver
                                                    más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Cajas Rurales</h5>
                                            @php
                                                use App\Models\CajaRural;
                                                $cant_cajas = CajaRural::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-blog f-left"></i><span>{{ $cant_cajas }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/cajasrurales" class="text-white">Ver
                                                    más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

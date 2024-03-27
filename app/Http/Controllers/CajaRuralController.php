<?php

namespace App\Http\Controllers;

use App\Models\CajaRural;
use App\Models\Departamento;
use Illuminate\Http\Request;


class CajaRuralController extends Controller
{
    function __construct()
        {
            $this->middleware('permission:ver-caja-rural|crear-caja-rural|editar-caja-rural|borrar-caja-rural')->only('index');
            $this->middleware('permission:crear-caja-rural', ['only' => ['create','store']]);
            $this->middleware('permission:editar-caja-rural', ['only' => ['edit','update']]);
            $this->middleware('permission:borrar-caja-rural', ['only' => ['destroy']]);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajasrurales = CajaRural::paginate(15);//no mostrando todos los registros, sino solo 15 por página
        return view('cajasrurales.index', compact('cajasrurales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cajasrurales.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'COD_DEPARTAMENTO',
            'NOM_CAJA_RURAL' => 'required|unique:CAJRURALES,NOM_CAJA_RURAL',
            'IND_CAJA_RURAL' => 'required',
            'USR_REGISTRO',
            'FEC_REGISTRO',
        ]);

        CajaRural::create($request->all());
        return redirect()->route('cajasrurales.index');//redirijiendo a la pantalla principal de asegurados
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CajaRural  $cajaRural
     * @return \Illuminate\Http\Response
     */
    public function show(CajaRural $cajaRural)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CajaRural  $cajaRural
     * @return \Illuminate\Http\Response
     */
    public function edit(CajaRural $cajasrurale)
    {
        return view('cajasrurales.editar',compact('cajasrurale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CajaRural  $cajaRural
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CajaRural $cajasrurale)
    {
        request()->validate([
            'COD_DEPARTAMENTO',
            'NOM_CAJA_RURAL' => 'required|unique:CAJRURAL,NOM_CAJA_RURAL',
            'IND_CAJA_RURAL' => 'required',
            'USR_REGISTRO',
            'FEC_REGISTRO',
        ]);

        $cajasrurale->update($request->all());

        return redirect()->route('cajasrurales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CajaRural  $cajaRural
     * @return \Illuminate\Http\Response
     */
    public function destroy(CajaRural $cajasrurale)
    {
        $cajasrurale->delete();

        return redirect()->route('cajasrurales.index');
    }
}

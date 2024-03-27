<?php

namespace App\Http\Controllers;

use App\Models\TipoPoliza;
use Illuminate\Http\Request;

class TipoPolizaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-tipo-poliza|crear-tipo-poliza|editar-tipo-poliza|borrar-tipo-poliza')->only('index');
         $this->middleware('permission:crear-tipo-poliza', ['only' => ['create','store']]);
         $this->middleware('permission:editar-tipo-poliza', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-tipo-poliza', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipopolizas = TipoPoliza::paginate(15);//no mostrando todos los registros, sino solo 15 por página
        return view('tipopolizas.index', compact('tipopolizas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipopolizas.crear');
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
            'VAL_PRIMA' => 'required|unique:TIPPOLIZA,VAL_PRIMA',
            'MON_SEGURO' => 'required|unique:TIPPOLIZA,MON_SEGURO',
            'IND_TIP_POLIZA' => 'required',
            'USR_REGISTRO',
            'FEC_REGISTRO',
        ]);

        TipoPoliza::create($request->all());
        return redirect()->route('tipopolizas.index');//redirijiendo a la pantalla principal de tipo de pólizas
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoPoliza  $tipoPoliza
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPoliza $tipopoliza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoPoliza  $tipoPoliza
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPoliza $tipopoliza)
    {
        return view('tipopolizas.editar',compact('tipopoliza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoPoliza  $tipoPoliza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPoliza $tipopoliza)
    {
        request()->validate([
            'VAL_PRIMA' => 'required',
            'MON_SEGURO' => 'required',
            'IND_TIP_POLIZA' => 'required',
            'USR_REGISTRO',
            'FEC_REGISTRO',
        ]);

        $tipopoliza->update($request->all());

        return redirect()->route('tipopolizas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPoliza  $tipoPoliza
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPoliza $tipopoliza)
    {
        $tipopoliza->delete();

        return redirect()->route('tipopolizas.index');
    }
}

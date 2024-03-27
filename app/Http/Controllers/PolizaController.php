<?php

namespace App\Http\Controllers;

use App\Models\Poliza;
use App\Models\Asegurado;
use App\Models\TipoPoliza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PolizaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-poliza|crear-poliza|editar-poliza|borrar-poliza')->only('index');
         $this->middleware('permission:crear-poliza', ['only' => ['create','store']]);
         $this->middleware('permission:editar-poliza', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-poliza', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polizas = Poliza::paginate(15);//no mostrando todos los registros, sino solo 15 por página
        $asegurados = Asegurado::all();
        $tipopolizas = TipoPoliza::all();
        return view('polizas.index', compact('polizas', 'asegurados', 'tipopolizas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asegurados = Asegurado::all();
        $tipopolizas = TipoPoliza::all();
        return view('polizas.crear', compact('asegurados', 'tipopolizas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validando que se ingresen campos
         request()->validate([
            'COD_ASEGURADO',
            'COD_TIP_POLIZA',
            'NOM_POLIZA' => 'required|unique:POLIZAS,NOM_POLIZA',
            'COD_PAGO' => 'required|unique:POLIZAS,COD_PAGO',
            'FEC_APERTURA' => 'required',
            'FEC_VENCIMIENTO' => 'required',
            'IND_POLIZA' => 'required',
        ]);

        Poliza::create($request->all());
        return redirect()->route('polizas.index');//redirijiendo a la pantalla principal de pólizas
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function show(Poliza $poliza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function edit(Poliza $poliza)
    {
        $tipopolizas = TipoPoliza::all();
        return view('polizas.editar',compact('poliza', 'tipopolizas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poliza $poliza)
    {
        //validando que se ingresen campos
         request()->validate([
            'COD_ASEGURADO',
            'COD_TIPO_POLIZA',
            'COD_CAJRURAL',
            'NOM_POLIZA' => 'required|unique:POLIZAS, NOM_POLIZA',
            'COD_PAGO' => 'required|unique:POLIZAS, COD_PAGO',
            'FEC_APERTURA' => 'required',
            'FEC_VENCIMINETO' => 'required',
            'IND_POLIZA' => 'required',
        ]);

        $poliza->update($request->all());

        return redirect()->route('polizas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poliza $poliza)
    {
        $poliza->delete();

        return redirect()->route('polizas.index');
    }
}

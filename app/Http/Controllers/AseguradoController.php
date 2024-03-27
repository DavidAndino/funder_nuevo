<?php

namespace App\Http\Controllers;

use App\Models\Asegurado;
use App\Models\Beneficiario;
use Illuminate\Http\Request;

class AseguradoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-asegurado|crear-asegurado|editar-asegurado|borrar-asegurado')->only('index');
         $this->middleware('permission:crear-asegurado', ['only' => ['create','store']]);
         $this->middleware('permission:editar-asegurado', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-asegurado', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asegurados = Asegurado::paginate(15);//no mostrando todos los registros, sino solo 15 por página
        return view('asegurados.index', compact('asegurados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asegurados.crear');
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
            'NUM_IDENTIDAD' => 'required|unique:ASEGURADOS,NUM_IDENTIDAD|max:15|',
            'COD_CAJRURAL',
            'NOM_ASEGURADO' => 'required|max:40',
            'APE_ASEGURADO' => 'required|max:40',
            'SEX_ASEGURADO' => 'required',
            'IND_CIVIL' => 'required',
            'FEC_NACIMIENTO' => 'required',
            'TIP_PERSONA' => 'required',
            'TIP_ASEGURADO' => 'required',
            'OCUPACION_ASEGURADO' => 'required',
            'NOM_NEGOCIO',
            'GIRO_NEGOCIO',
            'IND_ASEGURADO' => 'required',
        ]);

        Asegurado::create($request->all());
        return redirect()->route('asegurados.index');//redirijiendo a la pantalla principal de asegurados

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asegurado  $asegurado
     * @return \Illuminate\Http\Response
     */
    public function show(Asegurado $asegurado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asegurado  $asegurado
     * @return \Illuminate\Http\Response
     */
    public function edit(Asegurado $asegurado)
    {
        return view('asegurados.editar',compact('asegurado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asegurado  $asegurado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asegurado $asegurado)
    {
        request()->validate([
            'NUM_IDENTIDAD' => 'required',
            'COD_CAJRURAL',
            'NOM_ASEGURADO' => 'required',
            'APE_ASEGURADO' => 'required',
            'SEX_ASEGURADO' => 'required',
            'IND_CIVIL' => 'required',
            'FEC_NACIMIENTO' => 'required',
            'TIP_PERSONA' => 'required',
            'TIP_ASEGURADO' => 'required',
            'OCUPACION_ASEGURADO' => 'required',
            'NOM_NEGOCIO' => 'required',
            'GIRO_NEGOCIO' => 'required',
            'IND_ASEGURADO' => 'required',
        ]);

        $asegurado->update($request->all());

        return redirect()->route('asegurados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asegurado  $asegurado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asegurado $asegurado)
    {
        $asegurado->delete();

        return redirect()->route('asegurados.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Asegurado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeneficiarioController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-beneficiario|crear-beneficiario|editar-beneficiario|borrar-beneficiario')->only('index');
         $this->middleware('permission:crear-beneficiario', ['only' => ['create','store']]);
         $this->middleware('permission:editar-beneficiario', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-beneficiario', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiarios = Beneficiario::paginate(15);//no mostrando todos los registros, sino solo 15 por página
        $asegurados = Asegurado::all();
        return view('beneficiarios.index', compact('beneficiarios', 'asegurados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asegurados = Asegurado::all();
        return view('beneficiarios.crear', compact('asegurados'));
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
            'COD_ASEGURADO' => 'required',
            'NOM_BENEFICIARIO' => 'required',
            'NUM_IDENTIDAD' => 'required|unique:BENEFICIARIOS,NUM_IDENTIDAD',
            'PARTICIPACION' => 'required',
            'PARENTESCO' => 'required',
            'IND_BENEFICIARIO' => 'required'
        ]);

        Beneficiario::create($request->all());

        return redirect()->route('beneficiarios.index');//redirijiendo a la pantalla principal de asegurados
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiario $beneficiario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiario $beneficiario)
    {
        $asegurados = Asegurado::all();
        return view('beneficiarios.editar',compact('beneficiario', 'asegurados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiario $beneficiario)
    {
        request()->validate([
            'COD_ASEGURADO' => 'required',
            'NOM_BENEFICIARIO' => 'required',
            'NUM_IDENTIDAD' => 'required',
            'PARTICIPACION' => 'required',
            'PARENTESCO' => 'required',
            'IND_BENEFICIARIO' => 'required'
        ]);


        $beneficiario->update($request->all());
        return redirect()->route('beneficiarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiario $beneficiario)
    {
        $beneficiario->delete();

        return redirect()->route('beneficiarios.index');
    }
}

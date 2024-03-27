<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    use HasFactory;

    protected $table = 'polizas';//beneficiarios: nombre de tabla en bd

    protected $primaryKey = 'COD_POLIZA';

    protected $fillable = [
        'COD_ASEGURADO',
        'COD_TIP_POLIZA',
        'NOM_POLIZA',
        'COD_PAGO',
        'FEC_APERTURA',
        'FEC_VENCIMIENTO',
        'IND_POLIZA'
    ];
    public $timestamps = false;

    public function aseguradoFk(){
        return $this->hasOne(Asegurado::class, 'COD_ASEGURADO', 'COD_ASEGURADO');/*Asegurado es el nombre del modelo de Asegurado.
                                                            haciendo referencia a la class Asegurado*
                                                            pasando COD_ASE (PK de asegurados) y COD_Ase (FK)*/
    }

    public function tipoPolizaFk(){
        return $this->hasOne(TipoPoliza::class, 'COD_TIP_POLIZA', 'COD_TIP_POLIZA');/*TipoPoliza es el nombre del modelo de TipoPoliza.
                                                            haciendo referencia a la class TipoPoliza*
                                                            pasando COD_Tip (PK de asegurados) y COD_Tip (FK)*/
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajaRural extends Model
{
    use HasFactory;

    Protected $table = 'cajrurales';//productos: nombre de tabla en bd

    protected $primaryKey = 'COD_CAJA_RURAL';

    protected $fillable = [
        'COD_DEPARTAMENTO',
        'NOM_CAJA_RURAL',
        'IND_CAJA_RURAL',
        'USR_REGISTRO',
        'FEC_REGISTRO',
    ];
    public $timestamps = false;

    public function departamentoFk(){
        return $this->hasOne(Departamento::class, 'COD_DEPARTAMENTO', 'COD_DEPARTAMENTO');/*Departamen es el nombre del modelo de Asegurado.
                                                            haciendo referencia a la class Asegurado*
                                                            pasando COD_ASE (PK de asegurados) y COD_Ase (FK)*/
    }
}

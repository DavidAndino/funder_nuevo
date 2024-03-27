<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asegurado extends Model
{
    use HasFactory;
    Protected $table = 'asegurados';//productos: nombre de tabla en bd

    protected $primaryKey = 'COD_ASEGURADO';
    protected $fillable = [
        'COD_CAJRURAL',
        'NUM_IDENTIDAD',
        'NOM_ASEGURADO',
        'APE_ASEGURADO',
        'SEX_ASEGURADO',
        'IND_CIVIL',
        'NOM_ASEGURADO',
        'APE_ASEGURADO',
        'FEC_NACIMIENTO',
        'TIP_PERSONA',
        'TIP_ASEGURADO ',
        'OCUPACION_ASEGURADO',
        'NOM_NEGOCIO',
        'GIRO_NEGOCIO',
        'IND_ASEGURADO',
        'FEC_REGISTRO'
    ];
    public $timestamps = false;
}

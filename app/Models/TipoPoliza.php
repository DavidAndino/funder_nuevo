<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPoliza extends Model
{
    use HasFactory;

    Protected $table = 'TIPPOLIZA';//productos: nombre de tabla en bd

    protected $primaryKey = 'COD_TIP_POLIZA';

    protected $fillable = [
        'VAL_PRIMA',
        'MON_SEGURO',
        'IND_TIP_POLIZA',
        'USR_REGISTRO',
        'FEC_REGISTRO'
    ];
    public $timestamps = false;
}

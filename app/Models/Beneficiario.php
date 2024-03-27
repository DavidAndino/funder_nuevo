<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected $table = 'beneficiarios';//beneficiarios: nombre de tabla en bd

    protected $primaryKey = 'COD_BENEFICIARIO';

    protected $fillable = ['COD_ASEGURADO', 'NOM_BENEFICIARIO', 'NUM_IDENTIDAD', 'PARTICIPACION', 'PARENTESCO', 'IND_BENEFICIARIO'];
    public $timestamps = false;
    public function aseguradoFk(){
        return $this->hasOne(Asegurado::class, 'COD_ASEGURADO', 'COD_ASEGURADO');/*Asegurado es el nombre del modelo de Asegurado.
                                                            haciendo referencia a la class Asegurado*
                                                            pasando COD_ASE (PK de asegurados) y COD_Ase (FK)*/
    }
}

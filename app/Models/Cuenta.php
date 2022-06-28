<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'at_cuentas';
    protected $primaryKey = 'cod_cuenta';

/*  
    cod_cuenta
    contrasena
    estado
    notas
    cod_persona
    cod_tipos_cuenta
    cod_cliente
    
*/

}

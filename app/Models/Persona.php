<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'at_personas';
    protected $primaryKey = 'cod_persona';

/*  
    cod_persona
    tipo_documento
    nombres
    apellidos
    correo_electronico
    numero_celular
    direccion
    fecha_nacimiento
    sexo
*/

}

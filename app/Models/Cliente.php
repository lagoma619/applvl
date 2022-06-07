<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'at_clientes';
    protected $primaryKey = 'cod_cliente';

/*  
    cod_cliente
    nombre
    correo_electronico
    numero_telefono
    direccion
    tipo_documento
    nit
    horario_cliente
    nombre_comercial
    pagina_web
    contacto
    notas
    estado
    cod_cuenta
    
*/

}

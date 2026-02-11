<?php

namespace App\Models;

use CodeIgniter\Model;

class ventaModel extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_usuario',
        'id_paquete',
        'cantidad',
        'total',
        'fecha' 
    ];

      protected $validationRules = [
        'id_usuario' => 'required|integer',
        'id_paquete' => 'required|integer',
        'cantidad'   => 'required|integer|greater_than[0]',
        'total'      => 'required|decimal'
    ];
}


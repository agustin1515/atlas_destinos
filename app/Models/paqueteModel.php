<?php

namespace App\Models;

use CodeIgniter\Model;

class paqueteModel extends Model
{    
    protected $table = 'paquetes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'destino',
        'hotel',
        'dias',
        'stock',
        'precio',
        'categoria',
        'imagen',
        'descuento',
        'descripcion_hotel',
        'descripcion_paquete',
        'incluye_vuelo',
        'incluye_traslado',
        'incluye_hotel',
        'incluye_excursion',
    ];
    protected $validationRules = [
        'destino'   => 'required|min_length[3]',
        'hotel'     => 'required|min_length[3]',
        'dias'      => 'required|integer|greater_than[0]',
        'stock'     => 'required|integer|greater_than_equal_to[0]',
        'precio'    => 'required|decimal',
    ];
}



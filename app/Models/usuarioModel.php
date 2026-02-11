<?php 

namespace App\Models;

use CodeIgniter\Model;

class usuarioModel extends Model
{

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'correo',
        'contrasena',
        'rol'
    ];

    protected $validationRules = [
        'nombre'     => 'required|min_length[3]',
        'correo'     => 'required|valid_email',
    ];
}
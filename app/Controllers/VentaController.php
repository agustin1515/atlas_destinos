<?php

namespace App\Controllers;

use App\Models\paqueteModel;
use App\Models\ventaModel;
use App\Models\usuarioModel;

class VentaController extends BaseController
{
    public function comprar($id)
    {
        $paqueteModel = new paqueteModel();
        $data['paquete'] = $paqueteModel->find($id);

        return view('compra_view', $data);
    }

    public function guardarVenta()
    {
        $ventaModel = new ventaModel();
        $paqueteModel = new PaqueteModel();

        $idPaquete = $this->request->getPost('id_paquete');
        $cantidad  = $this->request->getPost('cantidad');

        $paquete = $paqueteModel->where('id', $idPaquete)->first();

        $usuario = session()->get('usuario');

        if ($paquete['descuento'] > 0) {
            $precio = $paquete['precio'] - ($paquete['precio'] * $paquete['descuento'] / 100);
        }

        $total = $precio * $cantidad;

        $data = [
            'id_usuario' => $usuario['id'],
            'id_paquete' => $idPaquete,
            'cantidad'   => $cantidad,
            'total'      => $total
        ];

        $ventaModel->insert($data);

        $nuevoStock = $paquete['stock'] - $cantidad;
        $paqueteModel->update($idPaquete, ['stock' => $nuevoStock]);

        return redirect()->to(base_url('paquetes_view'));
    }
}

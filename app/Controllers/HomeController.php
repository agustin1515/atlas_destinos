<?php

namespace App\Controllers;

use App\Models\paqueteModel;
use App\Models\ventaModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        $paqueteModel = new PaqueteModel();
        $ventaModel   = new VentaModel();

        $data['paquetes'] = $paqueteModel
            ->where('descuento >', 0)
            ->where('stock >', 0)
            ->orderBy('descuento', 'DESC')
            ->findAll(9);

        $usuario = session()->get('usuario');

        if ($usuario) {
            $data['ventas'] = $ventaModel
                ->select('id_paquete, SUM(cantidad) AS total')
                ->where('id_usuario', $usuario['id'])
                ->groupBy('id_paquete')
                ->findAll();
        }

        $masVendido = $ventaModel
            ->select('id_paquete, SUM(cantidad) AS total')
            ->groupBy('id_paquete')
            ->orderBy('total', 'DESC')
            ->first();

        $data['idPaqueteMasVendido'] = $masVendido['id_paquete'] ?? null;

        return view('pagina_principal', $data);
    }

    public function consejos()
    {
        return view('consejos_view');
    }

    public function preguntas()
    {
        return view('preguntas_view');
    }

    public function datosCuriosos()
    {
        return view('datos_curiosos');
    }
}

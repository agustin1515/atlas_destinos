<?php

namespace App\Controllers;

use App\Models\PaqueteModel;
use App\Models\VentaModel;
use App\Models\UsuarioModel;

class AdminController extends BaseController
{
    public function panel()
    {
        return view('panel_admin');
    }

    public function verPaquetes()
    {
        $paqueteModel = new PaqueteModel();
        $data['paquetes'] = $paqueteModel->findAll();

        return view('lista_paquetes', $data);
    }

    public function verVentas()
    {
        $ventaModel = new VentaModel();

        $mes = $this->request->getGet('mes');
        $anio = $this->request->getGet('anio');

        if ($mes && $anio) {
            $data['ventas'] = $ventaModel
                ->where("MONTH(fecha) = $mes AND YEAR(fecha) = $anio")
                ->orderBy('fecha', 'DESC')
                ->findAll();
        } else {
            $data['ventas'] = $ventaModel
                ->orderBy('fecha', 'DESC')
                ->findAll();
        }

        $data['mes'] = $mes;
        $data['anio'] = $anio;

        return view('lista_ventas', $data);
    }

    public function verUsuarios()
    {
        $usuarioModel = new UsuarioModel();
        $data['usuarios'] = $usuarioModel->findAll();

        return view('lista_usuarios', $data);
    }

    public function verCategoriasPaquetes()
    {
        $paqueteModel = new PaqueteModel();

        $data['paquete'] = $paqueteModel
            ->select('categoria, COUNT(*) as cantidad')
            ->groupBy('categoria')
            ->orderBy('categoria', 'ASC')
            ->findAll();

        return view('lista_categorias_paquetes', $data);
    }

    public function verResumenVentas()
    {
        $ventaModel = new VentaModel();

        $data['ventas'] = $ventaModel
            ->select('MONTH(fecha) AS mes, YEAR(fecha) AS anio, SUM(total) AS total_ventas, SUM(cantidad) AS total_paquetes')
            ->groupBy('anio, mes')
            ->orderBy('anio', 'DESC')
            ->orderBy('mes', 'DESC')
            ->findAll();

        return view('lista_resumen_ventas', $data);
    }
}

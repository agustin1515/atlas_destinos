<?php

namespace App\Controllers;

use App\Models\PaqueteModel;
use App\Models\ventaModel;

class PaqueteController extends BaseController
{
    public function indexPaquete()
    {
        $paqueteModel = new PaqueteModel();
        $ventaModel   = new ventaModel();

        $data['paquetes'] = $paqueteModel->findAll();

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

        return view('paquetes_view', $data);
    }

    public function crearPaquete()
    {
        return view('crear_paquete');
    }

    public function guardarPaquete()
    {
        $paqueteModel = new PaqueteModel();

        $data = [
            'destino'              => $this->request->getPost('destino'),
            'hotel'                => $this->request->getPost('hotel'),
            'dias'                 => $this->request->getPost('dias'),
            'stock'                => $this->request->getPost('stock'),
            'precio'               => $this->request->getPost('precio'),
            'categoria'            => $this->request->getPost('categoria'),
            'descuento'            => $this->request->getPost('descuento'),
            'descripcion_hotel'    => $this->request->getPost('descripcion_hotel'),
            'descripcion_paquete'  => $this->request->getPost('descripcion_paquete'),
            'incluye_vuelo'        => $this->request->getPost('incluye_vuelo') ? 1 : 0,
            'incluye_traslado'     => $this->request->getPost('incluye_traslado') ? 1 : 0,
            'incluye_hotel'        => $this->request->getPost('incluye_hotel') ? 1 : 0,
            'incluye_excursion'    => $this->request->getPost('incluye_excursion') ? 1 : 0,
        ];

        $imagen = $this->request->getFile('imagen');

        if ($imagen && $imagen->isValid()) {
            $nombre = $imagen->getRandomName();
            $imagen->move(FCPATH . 'img', $nombre);
            $data['imagen'] = $nombre;
        } else {
            $data['imagen'] = 'defecto.jpg';
        }

        $paqueteModel->insert($data);

        return redirect()->to(base_url('paquetes_view'));
    }

    public function categoria($categoria)
    {
        $paqueteModel = new PaqueteModel();
        $ventaModel   = new VentaModel();

        if ($categoria !== 'Todos') {
            $data['paquetes'] = $paqueteModel->where('categoria', $categoria)->findAll();
        } else {
            $data['paquetes'] = $paqueteModel->findAll();
        }

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

        return view('paquetes_view', $data);
    }

    public function detallePaquete($id)
    {
        $paqueteModel = new PaqueteModel();
        $data['paquete'] = $paqueteModel->find($id);

        return view('detalle_paquete', $data);
    }

    public function modificarPaquete($id)
    {
        $paqueteModel = new PaqueteModel();
        $data['paquete'] = $paqueteModel->find($id);

        return view('modificar_paquete', $data);
    }

    public function actualizarPaquete($id)
    {
        $paqueteModel = new PaqueteModel();

        $data = [
            'destino'              => $this->request->getPost('destino'),
            'hotel'                => $this->request->getPost('hotel'),
            'dias'                 => $this->request->getPost('dias'),
            'stock'                => $this->request->getPost('stock'),
            'precio'               => $this->request->getPost('precio'),
            'categoria'            => $this->request->getPost('categoria'),
            'descuento'            => $this->request->getPost('descuento'),
            'descripcion_hotel'    => $this->request->getPost('descripcion_hotel'),
            'descripcion_paquete'  => $this->request->getPost('descripcion_paquete'),
            'incluye_vuelo'        => $this->request->getPost('incluye_vuelo') ? 1 : 0,
            'incluye_traslado'     => $this->request->getPost('incluye_traslado') ? 1 : 0,
            'incluye_hotel'        => $this->request->getPost('incluye_hotel') ? 1 : 0,
            'incluye_excursion'    => $this->request->getPost('incluye_excursion') ? 1 : 0,
        ];

        $imagen = $this->request->getFile('imagen');

        if ($imagen && $imagen->isValid()) {
            $nombre = $imagen->getRandomName();
            $imagen->move(FCPATH . 'img', $nombre);
            $data['imagen'] = $nombre;
        }

        $paqueteModel->update($id, $data);

        return redirect()->to(base_url('paquetes_view'));
    }

    public function eliminarPaquete($id)
    {
        $paqueteModel = new PaqueteModel();
        $paqueteModel->delete($id);

        return redirect()->to(base_url('paquetes_view'));
    }
}

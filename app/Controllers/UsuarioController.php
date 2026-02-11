<?php

namespace App\Controllers;

use App\Models\usuarioModel;

class UsuarioController extends BaseController
{
    public function registro()
    {

        return view('registro_view');
    }
    public function login()
    {

        return view('login_view');
    }
    public function guardarRegistro()
    {
        $usuarioModel = new UsuarioModel();

        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'correo'     => $this->request->getPost('correo'),
            'contrasena' => $this->request->getPost('contrasena'),
            'rol'        => 'cliente'       
        ];

        $usuarioModel->insert($data);

        return redirect()->to(base_url('login_view'));
    }

    public function validarLogin()
    {
        $usuarioModel = new UsuarioModel();

        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');

        $usuario = $usuarioModel->where('correo', $correo)->first();

        if (!$usuario) {
        return redirect()->to(base_url('registro_view'));
        }

        if ($usuario['contrasena'] !== $contrasena) {
        return redirect()->to(base_url('login_view'));
        }

        session()->set('usuario', $usuario);
        return redirect()->to(base_url('/'));
    }

    public function cerrarSesion()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}

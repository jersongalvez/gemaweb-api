<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
class LoginController extends Controller
{

    public function __construct() {
        $this->login = new Login();
    }

    public function RecuperarContrasena() {
        return $this->login->buscarUsuarioContrasena();
    }
}

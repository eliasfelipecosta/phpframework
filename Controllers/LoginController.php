<?php
/**
 * Controlador Categorias
 */

namespace Controllers;

use Classes\Controller;

class LoginController extends Controller {

    // URL /login
    public function index() {
        $usuario = 'eduardoazevedo@claretiano.edu.br';
        $senha = '123';

        // Verificar login
        if ( isset( $_POST['email'] ) && isset( $_POST['senha'] ) ) {
            if ( $_POST['email'] == $usuario && $_POST['senha'] == $senha ) {
                $_SESSION['usuario_logado'] = true;
                header( 'Location: ' . HOME_URL . 'home' );
                die();
            }
            else {
                $mensagem = 'Usuário e senha inválido!';
            }
        }

        // Incluir o layout da ação
        require_once ABSPATH . 'Views/login/index.php';
    }

}

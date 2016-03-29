<?php
/**
 * Controlador Categorias
 */

namespace Controllers;

use Classes\Controller;

class AplicacaoController extends Controller {
    
    // Método construtor da classe
    public function __construct() {
    }
    
    // Antes de processar a requisição
    public function antes() {
        if ( ! isset( $_SESSION['usuario_logado'] ) ) {
            header( 'Location: ' . HOME_URL . 'login' );
            die();
        }
    }

    // Depois de processar a requisição
    public function depois() {
    }
    
}
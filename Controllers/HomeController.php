<?php
/**
 * Controlador Home
 */

namespace Controllers;

use Controllers\AplicacaoController;

class HomeController extends AplicacaoController {

    // URL /
    public function index() {
        
        // Incluir o layout da ação
        require_once ABSPATH . 'Views/home/index.php';
    }

}
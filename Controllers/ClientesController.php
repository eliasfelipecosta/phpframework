<?php
/**
 * Controlador Clientes
 */

namespace Controllers;

use Classes\Controller;
use Models\ClienteModel;

class ClientesController extends AplicacaoController {
    
    private $cliente_model;
    
    // Método construtor da classe
    public function __construct() {
        
        // Instanciar modelos
        $this->cliente_model = new ClienteModel();
        
        parent::__construct();
    }

    // URL /clientes
    public function index() {
        
        // Buscar todos os registros no banco
        $clientes = $this->cliente_model->filtrar_todos();
        
        // Incluir o layout da ação
        require_once ABSPATH . 'Views/clientes/index.php';
    }
    
    // URL /clientes/form
    public function form() {
        
        // Buscar registro quando receber o parametro ID via GET
        $cliente_id = array_get( $_GET, 'id' );
        $cliente = $this->cliente_model->filtrar_por_id( $cliente_id );
            
        // Incluir o layout da ação
        require_once ABSPATH . 'Views/clientes/form.php';
    }
    
    // URL /clientes/salvar
    public function salvar() {
        
        // Receber os dados via POST e converter em objeto
        $cliente = (object) $_POST;
        
        // Salvar registro no banco
        $this->cliente_model->salvar( $cliente );
        
        // Redirecionar para cliente->index
        header( 'Location: ' . HOME_URL . 'clientes' );
    }
    
    // URL /clientes/excluir
    public function excluir() {
        
        // Receber os dados via POST e converter em objeto
        $cliente_id = $_GET['id'];
        
        // Salvar registro no banco
        $this->cliente_model->excluir( $cliente_id );
        
        // Redirecionar para cliente->index
        header( 'Location: ' . HOME_URL . 'clientes' );
    }

}
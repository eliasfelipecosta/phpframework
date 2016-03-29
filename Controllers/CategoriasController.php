<?php
/**
 * Controlador Categorias
 */

namespace Controllers;

use Classes\Controller;
use Models\CategoriaModel;

class CategoriasController extends AplicacaoController {
    
    private $categoria_model;
    
    // Método construtor da classe
    public function __construct() {
        
        // Instanciar modelos
        $this->categoria_model = new CategoriaModel();
        
        parent::__construct();
    }

    // URL /categorias
    public function index() {
        
        // Buscar todos os registros no banco
        $categorias = $this->categoria_model->filtrar_todos();
        
        // Incluir o layout da ação
        require_once ABSPATH . 'Views/categorias/index.php';
    }
    
    // URL /categorias/form
    public function form() {
        
        // Buscar registro quando receber o parametro ID via GET
        $categoria_id = array_get( $_GET, 'id' );
        $categoria = $this->categoria_model->filtrar_por_id( $categoria_id );
            
        // Incluir o layout da ação
        require_once ABSPATH . 'Views/categorias/form.php';
    }
    
    // URL /categorias/salvar
    public function salvar() {
        
        // Receber os dados via POST e converter em objeto
        $categoria = (object) $_POST;
        
        // Salvar registro no banco
        $this->categoria_model->salvar( $categoria );
        
        // Redirecionar para categoria->index
        header( 'Location: ' . HOME_URL . 'categorias' );
    }
    
    // URL /categorias/excluir
    public function excluir() {
        
        // Receber os dados via POST e converter em objeto
        $categoria_id = $_GET['id'];
        
        // Salvar registro no banco
        $this->categoria_model->excluir( $categoria_id );
        
        // Redirecionar para categoria->index
        header( 'Location: ' . HOME_URL . 'categorias' );
    }

}
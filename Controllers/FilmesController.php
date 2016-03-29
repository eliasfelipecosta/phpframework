<?php
/**
 * Controlador Filmes
 */

namespace Controllers;

use Controllers\AplicacaoController;
use Models\FilmeModel;
use Models\CategoriaModel;

class FilmesController extends AplicacaoController {
    
    private $filme_model;
    private $categoria_model;
    
    // Método construtor da classe
    public function __construct() {
        
        // Instanciar modelos
        $this->filme_model = new FilmeModel();
        $this->categoria_model = new CategoriaModel();
        
        parent::__construct();
    }

    // URL /filmes
    public function index() {
        
        // Buscar todos os registros no banco
        $filmes = $this->filme_model->filtrar_todos();
        
        // Incluir o layout da ação
        require_once ABSPATH . 'Views/filmes/index.php';
    }
    
    // URL /filmes/form
    public function form() {
        
        // Buscar registro quando receber o parametro ID via GET
        $filme_id = array_get( $_GET, 'id' );
        $filme = $this->filme_model->filtrar_por_id( $filme_id );
        
        // Buscar categorias
        $categorias = $this->categoria_model->filtrar_todos();
            
        // Incluir o layout da ação
        require_once ABSPATH . 'Views/filmes/form.php';
    }
    
    // URL /filmes/salvar
    public function salvar() {
        
        // Receber os dados via POST e converter em objeto
        $filme = (object) $_POST;
        
        // Salvar registro no banco
        $this->filme_model->salvar( $filme );
        
        // Redirecionar para filme->index
        header( 'Location: ' . HOME_URL . 'filmes' );
    }
    
    // URL /filmes/excluir
    public function excluir() {
        
        // Receber os dados via POST e converter em objeto
        $filme_id = $_GET['id'];
        
        // Salvar registro no banco
        $this->filme_model->excluir( $filme_id );
        
        // Redirecionar para filme->index
        header( 'Location: ' . HOME_URL . 'filmes' );
    }

}
<?php
/**
 * Controlador Locações
 */

namespace Controllers;

use Controllers\AplicacaoController;
use Models\ClienteModel;
use Models\FilmeAlugadoModel;
use Models\FilmeModel;
use Models\LocacaoModel;

class LocacoesController extends AplicacaoController {
    
    private $cliente_model;
    private $filme_model;
    private $locacao_model;
    
    // Método construtor da classe
    public function __construct() {
        
        // Instanciar modelos
        $this->cliente_model = new ClienteModel();
        $this->filme_alugado_model = new FilmeAlugadoModel();
        $this->filme_model = new FilmeModel();
        $this->locacao_model = new LocacaoModel();
        
        parent::__construct();
    }

    // URL /locacoes
    public function index() {
        // Buscar todos os registros no banco
        $locacoes = $this->locacao_model->filtrar_todos();
        
        // Incluir o layout da ação
        require_once ABSPATH . 'Views/locacoes/index.php';
    }
    
    // URL /locacoes/form
    public function form() {
        // Buscar registro quando receber o parametro ID via GET
        $locacao_id = array_get( $_GET, 'id' );
        $locacao = $this->locacao_model->filtrar_por_id( $locacao_id );
        
        // Buscar clientes
        $clientes = $this->cliente_model->filtrar_todos();
        $filmes = $this->filme_model->filtrar_todos();
        $filmes_alugados = $this->filme_alugado_model->filtrar_por_locacao($locacao_id);
        
        // Incluir o layout da ação
        require_once ABSPATH . 'Views/locacoes/form.php';
    }
    
    // URL /locacoes/salvar
    public function salvar() {
        
        // Receber os dados via POST e converter em objeto
        $locacao = (object) $_POST;
        
        // Salvar registro no banco
        $status = $this->locacao_model->salvar( $locacao );
        
        // Redirecionar para locacao->index
        if ($locacao->id == NULL || empty($locacao->id))
            header( 'Location: ' . HOME_URL . 'locacoes/form?id=' . $status );
        else
            header( 'Location: ' . HOME_URL . 'locacoes' );
    }
    
    // URL /locacoes/adicionar_filme
    public function adicionar_filme() {
        
        // Receber os dados via POST e converter em objeto
        $filme_alugado = (object) $_POST;
        
        // Salvar registro no banco
        $this->filme_alugado_model->salvar( $filme_alugado );
        
        // Redirecionar para locacao->form
        header( 'Location: ' . HOME_URL . 'locacoes/form/?id=' . $filme_alugado->locacao_id );
    }
    
    // URL /locacoes/excluir_filme
    public function excluir_filme() {
        
        // Receber os dados via POST e converter em objeto
        $filme_alugado_id = $_GET['id'];
        
        // Salvar registro no banco
        $this->filme_alugado_model->excluir( $filme_alugado_id );
        
        // Redirecionar para locacao->form
        header( 'Location: ' . HOME_URL . 'locacoes/form/?id=' . $_GET['locacao_id'] );
    }

}
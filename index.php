<?php

/* Incluir arquivo de conexão */
require_once 'config.php';

// Inicia a sessão
session_start();

// Verifica o modo depurador está ativo
if ( ! defined( 'DEBUG' ) || DEBUG === false ) {

    // Esconde todos os erros
    error_reporting( 0 );
    ini_set( "display_errors", 0 );
}
else {

    // Mostra todos os erros
    error_reporting( E_ALL ^ E_NOTICE );
    ini_set( "display_errors", 1 );
}

/*
 * Função nativa do PHP para incluir arquivos de classes automaticamente
 */
function __autoload( $nome_da_classe ) {
    // Pegar caminho do arquivo a ser incluido
    $arquivo = ABSPATH . str_replace( '\\', DIRECTORY_SEPARATOR, $nome_da_classe ) . '.php';
    
    // Verificar se o arquivo existe
    if ( is_file( $arquivo ) ) {
        require_once $arquivo;
    }
}

// Retorna a posição de um vetor se ela existir
function array_get( $array, $key ) {
    
    // Verifica se a chave existe no array
    if ( isset( $array[$key] ) && ! empty( $array[$key] ) ) {
        // Retorna o valor da chave
        return $array[$key];
    }

    // Retorna nulo por padrão
    return null;
}

global $controlador, $acao, $parametros;

// Verifica se o parâmetro path foi enviado
if ( isset( $_GET['route'] ) ) {

    // Captura o valor de $_GET['path']
    $route = $_GET['route'];

    // Limpa os dados
    $route = rtrim( $route, '/' );
    $route = filter_var( $route, FILTER_SANITIZE_URL );

    // Cria um array de parâmetros
    $route = explode( '/', $route );

    // Configura as propriedades
    $controlador = ucfirst( array_get( $route, 0 ) );
    $controlador .= 'Controller';
    $acao = array_get( $route, 1 );
    
    // Configura os parâmetros
    if ( array_get( $route, 2 ) ) {
        unset( $route[0] );
        unset( $route[1] );

        // Os parâmetros sempre virão após a ação
        $parametros = array_values( $route );
    }
}

/**
 * Se nenhum controlador for requisitado,
 *    será chamado a ação padrão $home_controller->index()
 */
if ( ! $controlador ) {

    // Adiciona o controlador padrão
    require_once ABSPATH . 'Controllers/HomeController.php';

    // Instancia o controlador padrão
    $controlador = new Controllers\HomeController();

    // Antes de processar requisição
    $controlador->antes();
    
    // Executa o método index()
    $controlador->index();
    
    // Depois de processar requisição
    $controlador->depois();
    
    // Parar a execução aqui
    return;
}

// Se o arquivo do controlador não existir, não faremos nada
if ( ! file_exists( ABSPATH . 'Controllers/' . $controlador . '.php' ) ) {
    
    // Página não encontrada
    require_once ABSPATH . 'Views/erros/404.php';

    // Parar a execução aqui
    return;
}

// Inclui o arquivo do controlador
require_once ABSPATH . 'Controllers/' . $controlador . '.php';

// Adicionar caminho da namespace no controlador
$controlador_namespace = "Controllers\\{$controlador}";

// Cria o objeto da classe do controlador e envia os parâmetros
$controlador = new $controlador_namespace( $parametros );

// Antes de processar requisição
$controlador->antes();
 
// Se o método indicado existir, executa o método e envia os parâmetros
if ( $acao !== 'antes' && $acao !== 'depois' && method_exists( $controlador, $acao ) ) {
    $controlador->{$acao}( $parametros );
    
    // Depois de processar requisição
    $controlador->depois();

    // Parar a execução aqui
    return;
}

// Sem ação, executará o método index
if ( $acao !== 'antes' && $acao !== 'depois' && ! $acao && method_exists( $controlador, 'index' ) ) {
    $controlador->index( $parametros );
    
    // Depois de processar requisição
    $controlador->depois();

    // Parar a execução aqui
    return;
}

// Página não encontrada
require_once ABSPATH . 'Views/erros/404.php';

// Parar a execução aqui
return;
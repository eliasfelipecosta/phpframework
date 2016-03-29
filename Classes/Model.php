<?php
/**
 * Modelo genérico
 */

namespace Classes;

class Model {

    // Conexão com o banco de dados
    public static $mysqli = false;
    
    // Cópia da instancia do mysqli
    protected $db = false;

    // Método construtor da classe
    public function __construct() {
        
        // Verificar se já tem uma conexão aberta
        if ( Model::$mysqli === false ) {
            
            // Conectar no banco de dados
            Model::$mysqli = new \mysqli(
                    HOST,
                    USUARIO,
                    SENHA,
                    BANCO_DE_DADOS
            );
            
            // Verificar se ocorreu erro na conexão
            if ( Model::$mysqli->connect_errno ) {
                die( 'Falha na conexão com o MySQL: ' . Model::$mysqli->connect_error );
            }
            
            // Certificar que os acentos serão exibidos corretamente
            Model::$mysqli->set_charset( 'utf8' );
        }
        
        // Utilizar conexão aberta
        $this->db = Model::$mysqli;
    }
    
}
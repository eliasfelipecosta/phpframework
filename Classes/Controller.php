<?php
/**
 * Controlador genérico
 */

namespace Classes;

class Controller {
    
    // Parametros via url
    protected $parametros;

    // Método construtor da classe
    public function __construct() {
    }
    
    // Antes de processar a requisição
    public function antes() {
    }
    
    // Depois de processar a requisição
    public function depois() {
    }

}
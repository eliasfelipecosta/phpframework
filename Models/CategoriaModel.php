<?php
/**
 * Modelo de dados de Categorias
 */

namespace Models;

use Classes\Model;

class CategoriaModel extends Model {
    
    /*
     * Buscar categoria pelo ID
     */
    public function filtrar_por_id( $id ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT * FROM categorias
              WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'i', $id );
        
        // Executar comando SQL e retorna resultado
        $stmt->execute();
        
        // Returnar um registro, se encontrar
        return $stmt->get_result()->fetch_object();
    }
    
    /*
     * Buscar todas as categorias
     */
    public function filtrar_todos() {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT * FROM categorias'
        );
        
        // Executar comando SQL e retorna resultado
        $stmt->execute();
        
        // Returna resultado
        return $stmt->get_result();
    }
    
    /*
     * Salvar registro
     * detecta se deve executar um INSERT ou UPDATE
     */
    public function salvar( $categoria ) {
        if ( $categoria->id == NULL || empty( $categoria->id ) ) {
            $this->inserir( $categoria );
        } else {
            $this->alterar( $categoria );
        }
    }
    
    /*
     * Inserir novo registro via INSERT INTO...
     */
    public function inserir( $categoria ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'INSERT INTO categorias (descricao)
                  VALUES (?)'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 's', $categoria->descricao );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
    /*
     * Alterar registro via UPDATE
     */
    public function alterar( $categoria ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'UPDATE categorias
                SET descricao = ?
              WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'si',
            $categoria->descricao,
            $categoria->id
        );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
    /*
     * Excluir registro
     */
    public function excluir( $id ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'DELETE FROM categorias
                   WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'i', $id );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
}
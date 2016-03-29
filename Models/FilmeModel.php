<?php
/**
 * Modelo de dados de Filmes
 */

namespace Models;

use Classes\Model;

class FilmeModel extends Model {
    
    /*
     * Buscar filme pelo ID
     */
    public function filtrar_por_id( $id ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT * FROM filmes
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
     * Buscar todas as filmes
     */
    public function filtrar_todos() {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT categorias.descricao AS categoria,
                    filmes.*
               FROM filmes
               JOIN categorias
                 ON categorias.id = filmes.categoria_id'
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
    public function salvar( $filme ) {
        if ( $filme->id == NULL || empty( $filme->id ) ) {
            $this->inserir( $filme );
        } else {
            $this->alterar( $filme );
        }
    }
    
    /*
     * Inserir novo registro via INSERT INTO...
     */
    public function inserir( $filme ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'INSERT INTO filmes (categoria_id, titulo)
                  VALUES (?,?)'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'ss',
            $filme->categoria_id,
            $filme->titulo
        );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
    /*
     * Alterar registro via UPDATE
     */
    public function alterar( $filme ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'UPDATE filmes
                SET categoria_id = ?,
                    titulo = ?
              WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'ssi',
            $filme->categoria_id,
            $filme->titulo,
            $filme->id
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
            'DELETE FROM filmes
                   WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'i', $id );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
}
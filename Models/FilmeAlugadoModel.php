<?php
/**
 * Modelo de dados de Filmes Alugados
 */

namespace Models;

use Classes\Model;

class FilmeAlugadoModel extends Model {
    
    /*
     * Buscar filme alugados pelo ID
     */
    public function filtrar_por_id( $id ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT * FROM filmes_alugados
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
     * Buscar todas os filmes alugados por locação
     */
    public function filtrar_por_locacao($locacao_id) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT filmes.titulo AS filme,
                    filmes_alugados.*
               FROM filmes_alugados
               JOIN filmes
                 ON filmes.id = filmes_alugados.filme_id
              WHERE filmes_alugados.locacao_id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'i', $locacao_id );
        
        // Executar comando SQL e retorna resultado
        $stmt->execute();
        
        // Returna resultado
        return $stmt->get_result();
    }
    
    /*
     * Salvar registro
     * detecta se deve executar um INSERT ou UPDATE
     */
    public function salvar( $filme_alugado ) {
        if ( $filme_alugado->id == NULL || empty( $filme_alugado->id ) ) {
            $this->inserir( $filme_alugado );
        } else {
            $this->alterar( $filme_alugado );
        }
    }
    
    /*
     * Inserir novo registro via INSERT INTO...
     */
    public function inserir( $filme_alugado ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'INSERT INTO filmes_alugados (locacao_id, filme_id, valor)
                    VALUES (?,?,?)'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'iid',
            $filme_alugado->locacao_id,
            $filme_alugado->filme_id,
            $filme_alugado->valor
        );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
    /*
     * Alterar registro via UPDATE
     */
    public function alterar( $filme_alugado ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'UPDATE filmes_alugados
                SET locacao_id = ?,
                    filme_id = ?,
                    valor = ?
              WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'iidi',
            $filme_alugado->locacao_id,
            $filme_alugado->filme_id,
            $filme_alugado->valor,
            $filme_alugado->id
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
            'DELETE FROM filmes_alugados
                   WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'i', $id );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
}
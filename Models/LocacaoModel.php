<?php
/**
 * Modelo de dados de Locações
 */

namespace Models;

use Classes\Model;

class LocacaoModel extends Model {
    
    /*
     * Buscar locacao pelo ID
     */
    public function filtrar_por_id( $id ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT * FROM locacoes
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
     * Buscar todas as locacoes
     */
    public function filtrar_todos() {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT clientes.nome AS cliente,
                    locacoes.*
               FROM locacoes
               JOIN clientes
                 ON clientes.id = locacoes.cliente_id'
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
    public function salvar( $locacao ) {
        if ( $locacao->id == NULL || empty( $locacao->id ) ) {
            $this->inserir( $locacao );
            return $this->db->insert_id;
        } else {
            $this->alterar( $locacao );
            return $locacao->id;
        }
    }
    
    /*
     * Inserir novo registro via INSERT INTO...
     */
    public function inserir( $locacao ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'INSERT INTO locacoes (cliente_id, data_emprestimo, data_devolucao)
                    VALUES (?,?,?)'
        );
        
        // Formatar datas
        $locacao->data_emprestimo = date('Y-m-d', strtotime(str_replace('/','-',$locacao->data_emprestimo)));
        $locacao->data_devolucao = date('Y-m-d', strtotime(str_replace('/','-',$locacao->data_devolucao)));
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'iss',
            $locacao->cliente_id,
            $locacao->data_emprestimo,
            $locacao->data_devolucao
        );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
    /*
     * Alterar registro via UPDATE
     */
    public function alterar( $locacao ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'UPDATE locacoes
                SET cliente_id = ?,
                    data_emprestimo = ?,
                    data_devolucao = ?
              WHERE id = ?'
        );
        
        // Formatar datas
        $locacao->data_emprestimo = date('Y-m-d', strtotime(str_replace('/','-',$locacao->data_emprestimo)));
        $locacao->data_devolucao = date('Y-m-d', strtotime(str_replace('/','-',$locacao->data_devolucao)));
                
        // Proteger contra SQL Injection
        $stmt->bind_param( 'issi',
            $locacao->cliente_id,
            $locacao->data_emprestimo,
            $locacao->data_devolucao,
            $locacao->id
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
            'DELETE FROM locacoes
                   WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'i', $id );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
}
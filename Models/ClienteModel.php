<?php
/**
 * Modelo de dados de Clientes
 */

namespace Models;

use Classes\Model;

class ClienteModel extends Model {
    
    /*
     * Buscar cliente pelo ID
     */
    public function filtrar_por_id( $id ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT * FROM clientes
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
     * Buscar todas as clientes
     */
    public function filtrar_todos() {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT * FROM clientes'
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
    public function salvar( $cliente ) {
        if ( $cliente->id == NULL || empty( $cliente->id ) ) {
            $this->inserir( $cliente );
        } else {
            $this->alterar( $cliente );
        }
    }
    
    /*
     * Inserir novo registro via INSERT INTO...
     */
    public function inserir( $cliente ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'INSERT INTO clientes (cpf, nome, cep, endereco, numero, bairro, cidade, uf, telefone, email)
                  VALUES (?,?,?,?,?,?,?,?,?,?)'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'ssssssssss',
            $cliente->cpf,
            $cliente->nome,
            $cliente->cep,
            $cliente->endereco,
            $cliente->numero,
            $cliente->bairro,
            $cliente->cidade,
            $cliente->uf,
            $cliente->telefone,
            $cliente->email
        );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
    /*
     * Alterar registro via UPDATE
     */
    public function alterar( $cliente ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'UPDATE clientes
                SET cpf = ?,
                    nome = ?,
                    cep = ?,
                    endereco = ?,
                    numero = ?,
                    bairro = ?,
                    cidade = ?,
                    uf = ?,
                    telefone = ?,
                    email = ?
              WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'ssssssssssi',
            $cliente->cpf,
            $cliente->nome,
            $cliente->cep,
            $cliente->endereco,
            $cliente->numero,
            $cliente->bairro,
            $cliente->cidade,
            $cliente->uf,
            $cliente->telefone,
            $cliente->email,
            $cliente->id
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
            'DELETE FROM clientes
                   WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'i', $id );
        
        // Executar comando SQL
        return $stmt->execute();
    }
    
}
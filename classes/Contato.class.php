<?php 
// Referenciar o banco:
require_once('Banco.class.php');

class Contato{
    // Atributos (propriedades):
    public $id;
    public $nome;
    public $email;
    public $telefone;


    // Métodos (ações):

    // Cadastrar:
    public function Cadastrar(){
        $banco = Banco::conectar();
        $sql = "INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)";
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $comando = $banco->prepare($sql);
 
        $comando->execute(array($this->nome, $this->email, $this->telefone));
            Banco::desconectar();
            // Se der certo, devolve 1 (tratar erros posteriormente)
            return 1;
    }

    // Listar:
    public static function Listar(){
        $banco = Banco::conectar();
        $sql = "SELECT * FROM contatos";
        $comando = $banco->prepare($sql);
        $comando->execute();
        // "Salvar" o resultado da consulta (tabela) na $resultado
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
 
        Banco::desconectar();
 
        return $resultado;
    }

    // Apagar:
    public function Apagar(){
        $banco = Banco::conectar();
        $sql = "DELETE FROM contatos WHERE id = ?";
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $comando = $banco->prepare($sql);
        // Tratamento de erro:
        try{
           $comando->execute(array($this->id));
            Banco::desconectar();
            // Retornar quantidade de linhas apagadas:
            return $comando->rowCount();
 
         }catch(PDOException $e){
            // return $e->getCode(); 
            Banco::desconectar();
            // Se der errado, devolve -1:
            return -1;
         }
    }

    // Buscar por ID:
    public function BuscarPorID(){
        $banco = Banco::conectar();
        $sql = "SELECT * FROM contatos WHERE ID = ?";
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->id));
        // "Salvar" o resultado da consulta (tabela) na $resultado
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
 
        Banco::desconectar();
 
        return $resultado;
    }

    // Modificar:
    public function Editar(){
            $banco = Banco::conectar();
     
            $sql = "UPDATE contatos SET nome = ?, email = ?, telefone = ? WHERE id = ?";
     
            $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $comando = $banco->prepare($sql);
            $comando->execute(array($this->nome, $this->email, $this->telefone, $this->id));
                Banco::desconectar();
                // Retornar a qtd de linhas modificadas:
                return $comando->rowCount();
            
            
    }

}

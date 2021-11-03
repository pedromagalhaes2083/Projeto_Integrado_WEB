<?php

class Pedido {
    public $id;
    public $status;
    public $endereco;
    public $descricao;
    public $observacoes;
    public $data;

    public function insert(){
        
        $this->data = date('Y-m-d H:i:s');

        $obDatabase = new Database('tb_pedido');
        $this->id = $obDatabase->insert([
                                          'Endereco'    => $this->endereco
                                          'Descricao' => $this->descricao,
                                          'Observacoes'  => $this->observacoes,
                                          'Status' => $this-> Status,
                                          'Data'  => $this->data
                                        ]);
    
        //RETORNAR SUCESSO
        return true;
      }
    public function cancel($id, $status)
    {
        return (new Database('vagas'))->update('id = '.$this->id,[
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'ativo'     => $this->ativo,
            'data'      => $this->data
          ]);
    }

    // Constructor
    public function __construct(){
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
      }
  
  
      // Execute queries SQL
      public function runQuery($sql){
        $stmt = $this->conn->prepare($sql);
        return $stmt;
      }

      /*
        // Pedido
        int_ID
        str_Endereco
        str_Descricao
        str_Observacoes
      */

      public function insert($descricao, $observacoes, $endereco){
          try{
              $stmt = $this->conn->prepare("INSERT INTO tb_pedidos (Endereco, Descricao, Observacoes) values (:endereco, :descricao, :observacoes)");
              $stmt -> bindparam(":endereco", $endereco);
              $stmt -> bindparam(":descricao", $descricao);
              $stmt -> bindparam(":observacoes", $observacoes);
              $stmt -> execute();

              return $stmt;
          }catch(PDOException $e){
              echo $e-> getMessage();
          }
      }

      private function update($id, $descricao, $observacoes, $endereco){
        try{
            $stmt = $this->conn->prepare("UPDATE tb_pedidos SET Endereco = :endereco, Descricao = :descricao, Observacoes = :observacoes WHERE ID = :id ");
            $stmt -> bindparam(":endereco", $endereco);
            $stmt -> bindparam(":descricao", $descricao);
            $stmt -> bindparam(":observacoes", $observacoes);
            $stmt -> bindparam(":id", $id);
            $stmt -> execute();

            return $stmt;
        }catch(PDOException $e){
            echo $e-> getMessage();
        } 
      }

      private function delete($id){
        try{
            $stmt = $this->conn->prepare("UPDATE tb_pedidos SET Endereco = :endereco, Descricao = :descricao, Observacoes = :observacoes WHERE ID = :id ");
            $stmt -> bindparam(":endereco", $endereco);
            $stmt -> bindparam(":descricao", $descricao);
            $stmt -> bindparam(":observacoes", $observacoes);
            $stmt -> bindparam(":id", $id);
            $stmt -> execute();

            return $stmt;
        }catch(PDOException $e){
            echo $e-> getMessage();
        } 
      }
  
}

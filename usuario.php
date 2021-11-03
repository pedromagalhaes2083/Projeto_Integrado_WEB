<?php

require_once 'banco_dados.php';

class Usuario {
    private $conn;

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
      // Usuario
        int_ID
        str_Nome
        str_Login
        str_Senha
     */
    
    // Insert
    public function insert($name, $email){
      try{
        $stmt = $this->conn->prepare("INSERT INTO tb_usuarios (name, email) VALUES(:name, :email)");
        $stmt->bindparam(":name", $name);
        $stmt->bindparam(":email", $email);
        $stmt->execute();

        return $stmt;
        
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }


    // Update
    public function update($name, $email, $id){
        try{
          $stmt = $this->conn->prepare("UPDATE tb_usuarios SET name = :name, email = :email WHERE id = :id");
          $stmt->bindparam(":name", $name);
          $stmt->bindparam(":email", $email);
          $stmt->bindparam(":id", $id);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }


    // Delete
    public function delete($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM tb_usuarios WHERE id = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    // Redirect URL method
    public function redirect($url){
      header("Location: $url");
    }
}
?>
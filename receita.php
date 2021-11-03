<?php

require_once 'banco_dados.php';

class Receita
{
    public function __construct(){
        $databese = new DataBase();
        $db = $database -> dbConnection()
        $this -> conn = $db;
    }

    public function runQuery($sql){
        $stmt = $this-> conn -> prepare($sql);
        return $stmt;
    }

    public function insert($nome, $link, ){
        try{
            $stmt = %this -> conn -> prepare("INSERT INTO tb_receitas")
        }
    }
}

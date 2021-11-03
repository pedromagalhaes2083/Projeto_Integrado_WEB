<?php

namespace Models;
use CoffeeCode\DataLayer\DataLayer;
use Models\Receita;

class Ingrediente extends DataLayer {
    public function __construct() {
        // O primeiro parâmetro refere-se ao nome da tabela
        // o segundo parâmetro refere-se aos campos da tabela
        // que são obrigatórios
        parent::__construct("ingrediente", [
            'id_receita', 
            'descricao',
        ]);
    }
    public function receita(): Receita
    {
        $this->receita = (new Receita())->findById($this->id_receita)->data();
        return $this;
    }    
}
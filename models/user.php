<?php

namespace Models;
use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer {
    public function __construct() {
        // O primeiro parâmetro refere-se ao nome da tabela
        // o segundo parâmetro refere-se aos campos da tabela
        // que são obrigatórios
        parent::__construct("user", ['username', 'email', 'password']);
    }
}
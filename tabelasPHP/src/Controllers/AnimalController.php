<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\AnimalDAO;
use Php\Primeiroprojeto\Models\Domain\Animal;

class AnimalController{

    public function inserir($params){
        require_once("../src/Views/Animal/inserir_animal.html");
    }

    public function novo($params){
        $Animal = new Animal($_POST['especie'], $_POST['cor']);
        $AnimalDAO = new AnimalDAO();
        if ($AnimalDAO->inserir($Animal)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}

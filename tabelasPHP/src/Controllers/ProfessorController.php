<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ProfessorDAO;
use Php\Primeiroprojeto\Models\Domain\Professor;

class ProfessorController{

    public function inserir($params){
        require_once("../src/Views/Professor/inserir_professor.html");
    }

    public function novo($params){
        $Professor = new Professor($_POST['nome'], $_POST['telefone']);
        $ProfessorDAO = new ProfessorDAO();
        if ($ProfessorDAO->inserir($Professor)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}

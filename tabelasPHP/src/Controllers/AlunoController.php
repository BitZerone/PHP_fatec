<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\AlunoDAO;
use Php\Primeiroprojeto\Models\Domain\Aluno;

class AlunoController{

    public function inserir($params){
        require_once("../src/Views/Aluno/inserir_aluno.html");
    }

    public function novo($params){
        $Aluno = new Aluno($_POST['matricula'], $_POST['endereco']);
        $AlunoDAO = new AlunoDAO();
        if ($AlunoDAO->inserir($Aluno)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}

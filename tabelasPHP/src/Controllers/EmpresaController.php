<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\EmpresaDAO;
use Php\Primeiroprojeto\Models\Domain\Empresa;

class EmpresaController{

    public function inserir($params){
        require_once("../src/Views/Empresa/inserir_empresa.html");
    }

    public function novo($params){
        $Empresa = new Empresa($_POST['nome'], $_POST['cnpj']);
        $EmpresaDAO = new EmpresaDAO();
        if ($EmpresaDAO->inserir($Empresa)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}

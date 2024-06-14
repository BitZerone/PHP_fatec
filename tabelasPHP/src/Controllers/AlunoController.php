<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\AlunoDAO;
use Php\Primeiroprojeto\Models\Domain\Aluno;

class AlunoController{

    public function index($params){
        $alunoDAO = new AlunoDAO();
        $resultado = $alunoDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!";
        elseif($acao == "alterar" && $status == "true")
            $mensagem = "Registro alterado com sucesso!";
        elseif($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!";
        elseif($acao == "excluir" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else 
            $mensagem = "";
        require_once("../src/Views/aluno/aluno.php");
    }

    public function inserir($params){
        require_once("../src/Views/Aluno/inserir_aluno.html");
    }

    public function novo($params){
        $Aluno = new Aluno($_POST['matricula'], $_POST['endereco']);
        $AlunoDAO = new AlunoDAO();
        if ($AlunoDAO->inserir($Aluno)){
            header("location: /aluno/inserir/true");
        } else {
            header("location: /aluno/inserir/false");
        }
    }

    public function alterar($params){
        $alunoDAO = new AlunoDAO();
        $resultado = $alunoDAO->consultar($params[1]);
        require_once("../src/Views/aluno/alterar_aluno.php");
    }

    public function excluir($params){
        $alunoDAO = new AlunoDAO();
        $resultado = $alunoDAO->consultar($params[1]);
        require_once("../src/Views/aluno/excluir_aluno.php");
    }

    public function editar($params){
        $aluno = new Aluno($_POST['matricula'], $_POST['endereco']);
        $aluno->setId($_POST['id']);
        $alunoDAO = new AlunoDAO();
        if ($alunoDAO->alterar($aluno)) {
            header("location: /aluno/alterar/true");
        } else {
            header("location: /aluno/alterar/false");
        }
    }

    public function deletar($params){
        $alunoDAO = new AlunoDAO();
        if ($alunoDAO->excluir($_POST['id'])){
            header("location: /aluno/excluir/true");
        } else {
            header("location: /aluno/excluir/false");
        }
    }

}

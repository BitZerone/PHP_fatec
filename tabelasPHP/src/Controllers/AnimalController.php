<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\AnimalDAO;
use Php\Primeiroprojeto\Models\Domain\Animal;

class AnimalController{

    public function index($params){
        $animalDAO = new AnimalDAO();
        $resultado = $animalDAO->consultarTodos();
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
        require_once("../src/Views/animal/animal.php");
    }

    public function inserir($params){
        require_once("../src/Views/animal/inserir_animal.html");
    }

    public function novo($params){
        $Animal = new Animal($_POST['especie'], $_POST['cor']);
        $AnimalDAO = new AnimalDAO();
        if ($AnimalDAO->inserir($Animal)){
            header("location: /animal/inserir/true");
        } else {
            header("location: /animal/inserir/false");
        }
    }

    public function alterar($params){
        $animalDAO = new AnimalDAO();
        $resultado = $animalDAO->consultar($params[1]);
        require_once("../src/Views/animal/alterar_animal.php");
    }

    public function excluir($params){
        $animalDAO = new AnimalDAO();
        $resultado = $animalDAO->consultar($params[1]);
        require_once("../src/Views/animal/excluir_animal.php");
    }

    public function editar($params){
        $animal = new Animal($_POST['especie'], $_POST['cor']);
        $animal->setId($_POST['id']);
        $animalDAO = new AnimalDAO();
        if ($animalDAO->alterar($animal)) {
            header("location: /animal/alterar/true");
        } else {
            header("location: /animal/alterar/false");
        }
    }

    public function deletar($params){
        $animalDAO = new AnimalDAO();
        if ($animalDAO->excluir($_POST['id'])){
            header("location: /animal/excluir/true");
        } else {
            header("location: /animal/excluir/false");
        }
    }

}

<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Professor{

    private $nome;
    private $telefone;

    public function __construct($nome, $telefone){
        $this->setNome($nome);
        $this->setTelefone($telefone);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

}
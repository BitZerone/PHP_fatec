<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Empresa{

    private $nome;
    private $cnpj;
    private $id;

    public function __construct($nome, $cnpj){
        $this->setNome($nome);
        $this->setCnpj($cnpj);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

}
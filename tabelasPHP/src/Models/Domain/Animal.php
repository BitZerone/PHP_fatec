<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Animal{

    private $especie;
    private $cor;
    private $id;

    public function __construct($especie, $cor){
        $this->setEspecie($especie);
        $this->setCor($cor);
    }

    public function getEspecie(){
        return $this->especie;
    }

    public function setEspecie($especie){
        $this->especie = $especie;
    }

    public function getCor(){
        return $this->cor;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

}
<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Aluno{

    private $matricula;
    private $endereco;

    public function __construct($matricula, $endereco){
        $this->setMatricula($matricula);
        $this->setEndereco($endereco);
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

}
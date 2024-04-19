<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Animal;

class AnimalDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Animal $animal){
        try{
            $sql = "INSERT INTO animal (especie, cor) VALUES (:especie, :cor)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":especie", $animal->getEspecie());
            $p->bindValue(":cor", $animal->getCor());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}
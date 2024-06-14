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

    public function alterar(Animal $animal){
        try{
            $sql = "UPDATE animal SET especie = :especie, cor = :cor
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $animal->getId());
            $p->bindValue(":especie", $animal->getEspecie());
            $p->bindValue(":cor", $animal->getCor());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM animal WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM animal";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM animal WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}
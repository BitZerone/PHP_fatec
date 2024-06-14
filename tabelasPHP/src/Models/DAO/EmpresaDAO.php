<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Empresa;

class EmpresaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Empresa $empresa){
        try{
            $sql = "INSERT INTO empresa (nome, cnpj) VALUES (:nome, :cnpj)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $empresa->getNome());
            $p->bindValue(":cnpj", $empresa->getCnpj());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Empresa $empresa){
        try{
            $sql = "UPDATE empresa SET nome = :nome, cnpj = :cnpj
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $empresa->getId());
            $p->bindValue(":nome", $empresa->getNome());
            $p->bindValue(":cnpj", $empresa->getCnpj());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM empresa WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM empresa";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM empresa WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}
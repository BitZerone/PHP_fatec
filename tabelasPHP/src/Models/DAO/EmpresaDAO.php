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

}
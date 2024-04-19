<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Professor;

class ProfessorDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Professor $professor){
        try{
            $sql = "INSERT INTO professor (nome, telefone) VALUES (:nome, :telefone)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $professor->getNome());
            $p->bindValue(":telefone", $professor->getTelefone());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}
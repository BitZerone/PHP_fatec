<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Aluno;

class AlunoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Aluno $aluno){
        try{
            $sql = "INSERT INTO aluno (matricula, endereco) VALUES (:matricula, :endereco)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":matricula", $aluno->getMatricula());
            $p->bindValue(":endereco", $aluno->getEndereco());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}
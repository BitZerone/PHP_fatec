<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php\Primeiroprojeto\Router
$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/professor/inserir',
    'Php\Primeiroprojeto\Controllers\ProfessorController@inserir');

$r->post('/professor/novo',
    'Php\Primeiroprojeto\Controllers\ProfessorController@novo');

$r->get('/empresa/inserir',
    'Php\Primeiroprojeto\Controllers\EmpresaController@inserir');

$r->post('/empresa/novo',
    'Php\Primeiroprojeto\Controllers\EmpresaController@novo');

$r->get('/animal/inserir',
    'Php\Primeiroprojeto\Controllers\AnimalController@inserir');

$r->post('/animal/novo',
    'Php\Primeiroprojeto\Controllers\AnimalController@novo');

$r->get('/aluno/inserir',
    'Php\Primeiroprojeto\Controllers\AlunoController@inserir');

$r->post('/aluno/novo',
    'Php\Primeiroprojeto\Controllers\AlunoController@novo');

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}




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


$r->get('/professor', 
    'Php\Primeiroprojeto\Controllers\ProfessorController@index');
    
$r->get('/empresa', 
    'Php\Primeiroprojeto\Controllers\EmpresaController@index');

$r->get('/animal', 
    'Php\Primeiroprojeto\Controllers\AnimalController@index');
    
$r->get('/aluno', 
    'Php\Primeiroprojeto\Controllers\AlunoController@index');





$r->get('/professor/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\ProfessorController@index');
    
$r->get('/empresa/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\EmpresaController@index');

$r->get('/animal/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\AnimalController@index');
    
$r->get('/aluno/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\AlunoController@index');




$r->get('/professor/alterar/id/{id}', 
    'Php\Primeiroprojeto\Controllers\ProfessorController@alterar');
    
$r->get('/empresa/alterar/id/{id}', 
    'Php\Primeiroprojeto\Controllers\EmpresaController@alterar');

$r->get('/animal/alterar/id/{id}', 
    'Php\Primeiroprojeto\Controllers\AnimalController@alterar');
    
$r->get('/aluno/alterar/id/{id}', 
    'Php\Primeiroprojeto\Controllers\AlunoController@alterar');
    


$r->get('/professor/excluir/id/{id}', 
    'Php\Primeiroprojeto\Controllers\ProfessorController@excluir');
    
$r->get('/empresa/excluir/id/{id}', 
    'Php\Primeiroprojeto\Controllers\EmpresaController@excluir');

$r->get('/animal/excluir/id/{id}', 
    'Php\Primeiroprojeto\Controllers\AnimalController@excluir');
    
$r->get('/aluno/excluir/id/{id}', 
    'Php\Primeiroprojeto\Controllers\AlunoController@excluir');


$r->post('/professor/editar', 
    'Php\Primeiroprojeto\Controllers\ProfessorController@editar');
    
$r->post('/empresa/editar', 
    'Php\Primeiroprojeto\Controllers\EmpresaController@editar');

$r->post('/animal/editar', 
    'Php\Primeiroprojeto\Controllers\AnimalController@editar');
    
$r->post('/aluno/editar', 
    'Php\Primeiroprojeto\Controllers\AlunoController@editar');


$r->post('/professor/deletar', 
    'Php\Primeiroprojeto\Controllers\ProfessorController@deletar');
    
$r->post('/empresa/deletar', 
    'Php\Primeiroprojeto\Controllers\EmpresaController@deletar');

$r->post('/animal/deletar', 
    'Php\Primeiroprojeto\Controllers\AnimalController@deletar');
    
$r->post('/aluno/deletar', 
    'Php\Primeiroprojeto\Controllers\AlunoController@deletar');

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




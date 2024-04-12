<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/exer1', function(){
    include("exer1.html");
});

$r->post('/exer1/resposta', function(){
    $valor = $_POST['valor'];
    if ($valor > 0) {
        return "Valor Positivo";
    } elseif ($valor == 0) {
        return "Igual a Zero";
    } elseif ($valor < 0) {
        return "Valor Negativo";
    }
});


$r->get('/exer2', function(){
    include("exer2.php");
});

$r->post('/exer2/resposta', function(){
    $valores = $_POST['valor'];
    $menor = $valores[0];
    for ($i=0; $i < 7; $i++) { 
        if ($menor > $valores[$i]) {
            $menor = $valores[$i];
            $posicao = $i;
        }
    }
    $posicao += 1;
    return "O menor valor é {$menor} e foi o {$posicao}º número digitado";
});

$r->get('/exer3', function(){
    include("exer3.php");
});

$r->post('/exer3/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    $soma = $valor1 + $valor2;
    if ($valor1 == $valor2) {
        $soma = $soma * 3;
    }
    return "Valor retornado: {$soma}";
});

$r->get('/exer4', function(){
    include("exer4.php");
});

$r->post('/exer4/resposta', function(){
    $valor = $_POST['valor'];

    $tabuada = "";
    for ($i=0; $i <= 10; $i++) { 
        $mult = $valor * $i;
        $tabuada .= "{$valor} x {$i} = {$mult}<br>";
    }

    return $tabuada;
});

$r->get('/exer5', function(){
    include("exer5.php");
});

$r->post('/exer5/resposta', function(){
    $valor = $_POST['valor'];
    function Fatorial($valor1){
        if ($valor1 > 1) {
            $valor1 = $valor1 * Fatorial($valor1-1);
        }
        return $valor1;
    }
    
    return "Fatorial de {$valor} é ".Fatorial($valor);
});

$r->get('/exer6', function(){
    include("exer6.php");
});

$r->post('/exer6/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    if ($valor1 > $valor2) {
        return $valor2 . " " . $valor1;
    } elseif ($valor1 < $valor2) {
        return $valor1 . " " . $valor2;
    } elseif ($valor1 == $valor2) {
        return "Números iguais: " . $valor2;
    }
});

$r->get('/exer7', function(){
    include("exer7.php");
});

$r->post('/exer7/resposta', function(){
    $metros = $_POST['valor'];
    $centimetros = $metros * 100;
    return "{$metros} metros equivale a {$centimetros} centimetros";
});

$r->get('/exer8', function(){
    include("exer8.php");
});

$r->post('/exer8/resposta', function(){
    $valor = $_POST['valor'];
    $latas = ceil($valor / 54);
    $preco = $latas * 80;
    return "São necessarias {$latas} latas, preço total R\${$preco},00";
});

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());



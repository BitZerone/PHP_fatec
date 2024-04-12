<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Execicio 2</title>
</head>
<body>
    <h3>Digite 7 numeros: </h3>
    <form action="/exer2/resposta" method="post">
    <?php
        for ($i=0; $i < 7; $i++) { 
            ?>
                <input type="text" placeholder="Digite o <?=$i+1;?>º número" name="valor[<?=$i;?>]"><br><br>
            <?php
        }
    ?>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>
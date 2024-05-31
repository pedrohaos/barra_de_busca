<?php 
if(!isset($_GET['nome_livro'])){
    header("Location: index.php");
    exit;
}

$nome = "%".trim($_GET['nome_livro'])."%";

$dbh = new PDO ('mysql:host=127.0.0.1;dbname=canalti', 'root', 'root1234');

$sth = $dbh->prepare('SELECT * FROM `livro` WHERE `nome` LIKE :nome');
$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);

//echo "<pre>";

print_r($resultados)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h2>Resultado da busca</h2>
    <?php
        if(count($resultados)){
            foreach($resultados as $resultado){
    ?>
    <label><?=$resultado['id']?>-<?=resultado['nome'];?></label>
    <?
        } } else {
    ?>
    <label>Não foi encotrado nenhum item</label>
    <br>
    <?php
        }
    ?>
</body>
</html>
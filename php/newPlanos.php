<?php

include_once 'conexaoBanco.php'; 
 
$planos_nome = strtoupper($_POST['planos_nome']);
$planos_preco = strtoupper($_POST['planos_preco']);
$planos_duracao = $_POST['planos_duracao'];




$sql = "INSERT INTO planos (`nome`, `preco`, `duracao`) 
              VALUES  ('$planos_nome', '$planos_preco', '$planos_duracao')";

$query = $con->query($sql) or die ($con->error);


?>
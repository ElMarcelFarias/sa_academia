<?php

include_once 'conexaoBanco.php';

$id = $_POST['planos_id'];
$preco = $_POST['edit_planos_preco'];
$nome = $_POST['edit_planos_nome'];
$duracao = $_POST['edit_planos_duracao'];


$sql = "UPDATE planos SET `nome` = '$nome', `preco` = '$preco', `duracao` = '$duracao' WHERE `idPlano` = '$id'";

$query = $con->query($sql) or die ($con->error);

?>
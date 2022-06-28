<?php

include_once 'conexaoBanco.php'; 
 
$alunos_vendas = $_POST['alunos_vendas'];
$planos_vendas = $_POST['planos_vendas'];
$situacao_vendas = $_POST['situacao_vendas'];
$data_vendas = $_POST['data_vendas'];
$formaPagamento_vendas = $_POST['formaPagamento_vendas'];


$sql = "INSERT INTO vendas (`planos_idPlano`, `alunos_idAluno`, `situacao`, `formaPagamento`, `data`) 
              VALUES  ('$planos_vendas', '$alunos_vendas', '$situacao_vendas', '$formaPagamento_vendas', '$data_vendas')";
  
 
echo $sql;

//$query = $con->query($sql) or die ($con->error);


?>
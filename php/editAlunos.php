<?php

include_once 'conexaoBanco.php';

$id = $_POST['alunos_id'];
$nome = $_POST['edit_alunos_name'];
$sobrenome = $_POST['edit_alunos_sobrenome'];
$rg = $_POST['edit_alunos_rg'];
$cpf = $_POST['edit_alunos_cpf'];
$cep = $_POST['edit_alunos_cep'];
$cidade = $_POST['edit_alunos_cidade'];
$bairro = $_POST['edit_alunos_bairro'];
$rua = $_POST['edit_alunos_rua'];
$numero = $_POST['edit_alunos_numero'];
$sexo = $_POST['edit_alunos_sexo'];
$dataNascimento = $_POST['edit_alunos_dataNascimento'];



$sql = "UPDATE alunos SET `nome` = '$nome', `sobrenome` = '$sobrenome', `rg` = '$rg', `cpf` = '$cpf', `cep` = '$cep', `cidade` = '$cidade', `bairro` = '$bairro', `rua` = '$rua', `numero` = '$numero', `sexo` = '$sexo', `dataNascimento` = '$dataNascimento' WHERE `idAluno` = '$id'";
$query = $con->query($sql) or die ($con->error);





?>
<?php

include_once 'conexaoBanco.php';

$id = $_POST['funcionarios_id'];
$nome = $_POST['edit_funcionario_nome'];
$sobrenome = $_POST['edit_funcionario_sobrenome'];
$dataNascimento = $_POST['edit_funcionario_data'];
$sexo = $_POST['edit_funcionario_sexo'];
$rg = $_POST['edit_funcionario_rg'];
$cpf = $_POST['edit_funcionario_cpf'];
$cep = $_POST['edit_funcionario_cep'];
$cidade = $_POST['edit_funcionario_cidade'];
$bairro = $_POST['edit_funcionario_bairro'];
$rua = $_POST['edit_funcionario_rua'];
$numero = $_POST['edit_funcionario_numero'];
$estadoCivil = $_POST['edit_funcionario_estadocivil'];
$salario = $_POST['edit_funcionario_salario'];
$cargaHoraria = $_POST['edit_funcionario_cargahoraria'];
$nacionalidade = $_POST['edit_funcionario_nacionalidade'];
$descCargo = $_POST['edit_funcionario_descargo'];



$sql = "UPDATE funcionarios SET `nome` = '$nome', `sobrenome` = '$sobrenome', `dataNascimento` = '$dataNascimento', `sexo` = '$sexo', `rg` = '$rg', `cpf` = '$cpf', `cep` = '$cep', `cidade` = '$cidade', `bairro` = '$bairro', `rua` = '$rua', `numero` = '$numero', `estadoCivil` = '$estadoCivil', `salario` = '$salario', `cargaHoraria` = '$cargaHoraria', `nacionalidade` = '$nacionalidade', `descCargo` = '$descCargo' WHERE `idFuncionario` = '$id'";

$query = $con->query($sql) or die ($con->error);





?>
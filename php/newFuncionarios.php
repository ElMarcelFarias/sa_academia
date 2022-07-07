<?php

include_once 'conexaoBanco.php'; 
 
$funcionario_nome = strtoupper($_POST['funcionario_nome']);
$funcionario_sobrenome = strtoupper($_POST['funcionario_sobrenome']);
$funcionario_descargo = $_POST['funcionario_descargo'];
$funcionario_cargahoraria = $_POST['funcionario_cargahoraria'];
$funcionario_salario = $_POST['funcionario_salario'];
$funcionario_rg = $_POST['funcionario_rg'];
$funcionario_cpf = $_POST['funcionario_cpf'];
$funcionario_cep = $_POST['funcionario_cep'];
$funcionario_cidade = $_POST['funcionario_cidade'];
$funcionario_bairro = $_POST['funcionario_bairro'];
$funcionario_rua = $_POST['funcionario_rua'];
$funcionario_numero = $_POST['funcionario_numero'];
$funcionario_sexo = $_POST['funcionario_sexo'];
$funcionario_data = $_POST['funcionario_data'];
$funcionario_nacionalidade = $_POST['funcionario_nacionalidade'];
$funcionario_estadocivil = $_POST['funcionario_estadocivil'];


$sql = "INSERT INTO funcionarios (`nome`, `sobrenome`, `dataNascimento`, `sexo`, `rg`, `cpf`, `cep`, `cidade`, `bairro`, `rua`, `numero`, `estadoCivil`, `salario`, `cargaHoraria`, `nacionalidade`, `descCargo`) 
              VALUES  ('$funcionario_nome', '$funcionario_sobrenome', '$funcionario_data', '$funcionario_sexo', '$funcionario_rg', '$funcionario_cpf', 
                       '$funcionario_cep', '$funcionario_cidade', '$funcionario_bairro', '$funcionario_rua', '$funcionario_numero', '$funcionario_estadocivil', '$funcionario_salario', '$funcionario_cargahoraria', '$funcionario_nacionalidade', '$funcionario_descargo')";

$query = $con->query($sql) or die ($con->error);


?>
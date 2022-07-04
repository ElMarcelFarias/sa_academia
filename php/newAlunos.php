<?php

include_once 'conexaoBanco.php'; 
 
$alunos_nome = strtoupper($_POST['alunos_nome']);
$alunos_sobrenome = strtoupper($_POST['alunos_sobrenome']);
$alunos_rg = $_POST['alunos_rg'];
$alunos_cpf = $_POST['alunos_cpf'];
$alunos_cep = $_POST['alunos_cep'];
$alunos_cidade = $_POST['alunos_cidade'];
$alunos_bairro = $_POST['alunos_bairro'];
$alunos_rua = $_POST['alunos_rua'];
$alunos_numero = $_POST['alunos_numero'];
$alunos_sexo = $_POST['alunos_sexo'];
$alunos_data = $_POST['alunos_data'];


$sql = "INSERT INTO alunos (`nome`, `sobrenome`, `rg`, `cpf`, `cep`, `cidade`, `bairro`, `rua`, `numero`, `sexo`, `dataNascimento`) 
              VALUES  ('$alunos_nome', '$alunos_sobrenome', '$alunos_rg', '$alunos_cpf', '$alunos_cep', '$alunos_cidade', 
                       '$alunos_bairro', '$alunos_rua', '$alunos_numero', '$alunos_sexo', '$alunos_data')";

$query = $con->query($sql) or die ($con->error);


?>
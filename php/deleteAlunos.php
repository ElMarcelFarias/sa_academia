<?php 

include_once 'conexaoBanco.php';


if(isset($_REQUEST['id'])){
    $idAluno = $_REQUEST['id'];

    $sql = "DELETE FROM alunos WHERE idAluno = '$idAluno'";
    $query = $con->query($sql) or die($con->error);

}


?>
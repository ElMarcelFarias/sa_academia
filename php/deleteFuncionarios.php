<?php 

include_once 'conexaoBanco.php';




if(isset($_REQUEST['id'])){
    $idFuncionario = $_REQUEST['id'];

    $sql = "DELETE FROM funcionarios WHERE idFuncionario  = '$idFuncionario'";
    $query = $con->query($sql) or die($con->error);

}




?>
<?php 

include_once 'conexaoBanco.php';




if(isset($_REQUEST['id'])){
    $idVenda = $_REQUEST['id'];

    $sql = "DELETE FROM vendas WHERE idVenda = '$idVenda'";
    $query = $con->query($sql) or die($con->error);

}




?>
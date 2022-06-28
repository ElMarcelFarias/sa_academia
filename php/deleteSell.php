<?php 

include_once 'conexaoBanco.php';




if(isset($_REQUEST['idVenda'])){
    $idVenda = $_REQUEST['idVenda'];

    $sql = "DELETE FROM vendas WHERE idVenda = '$idVenda'";
    echo $sql;
    $query = $con->query($sql) or die($con->error);

}




?>
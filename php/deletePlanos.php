<?php 

include_once 'conexaoBanco.php';


if(isset($_REQUEST['id'])){
    $idPlanos = $_REQUEST['id'];


    $verifyDeletePlanos = "SELECT * FROM vendas WHERE planos_idPlano=".$idPlanos;
    $query = $con->query($verifyDeletePlanos) or die($con->error);
    $linhas=mysqli_num_rows($query);

    if($linhas == 0) {
        $sql = "DELETE FROM planos WHERE idPlano = '$idPlanos'";
        $query = $con->query($sql) or die($con->error);
        echo "true";
    } else {
        echo "false";
    }


    
    
}


?>
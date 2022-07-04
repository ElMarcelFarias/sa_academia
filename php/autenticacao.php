<?php

require_once("conexaoBanco.php");

$nomeUsuario=$_POST['nomeUsuario'];
$senha=$_POST['senha'];

//função md5() criptografa a senha no algoritimo MD5
$senhaMD5=md5($senha);

$comando="SELECT * FROM usuarios WHERE nomeUsuario='".$nomeUsuario."' AND senha='".$senhaMD5."' ";

$resultado=mysqli_query($con,$comando);

$linhas=mysqli_num_rows($resultado);

if($linhas==0){
    header("Location: ../index.html");
}else{
    $usuario=mysqli_fetch_assoc($resultado);
    session_start();
    $_SESSION['nivel']=$usuario['nivel'];
    
    if($usuario['nivel']=='1'){
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }
}

?>
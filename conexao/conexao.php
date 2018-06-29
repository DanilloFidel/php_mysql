<?php 
 //abrir conexão
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conecta = mysqli_connect($servidor, $usuario, $senha, $banco);
// testar
    if(mysqli_connect_errno()){
        die("Conexão falhou: " . mysqli_connect_errno());
    }
?>
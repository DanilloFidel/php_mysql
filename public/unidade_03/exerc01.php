<?php require_once("../../conexao/conexao.php"); ?>


<?php 
//consulta ao banco de dados
    $consulta_categorias ="SELECT nomeproduto ";
    $consulta_categorias .= "FROM produtos";
    $categorias_do_banco = mysqli_query($conecta, $consulta_categorias);

    if(!$categorias_do_banco){
         die("Falha na consulta com o banco de dados.");             
    }
    
    
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
            <style>
            li{
                color: red; 
            }
        </style>
</head>

<body>
    <ul>
    <?php
        while( $registro = mysqli_fetch_assoc($categorias_do_banco)){
    ?>
        <li><?php echo($registro["nomeproduto"])?></li>
    <?php
        };
    ?>
    </ul>
</body>

</html>
<?php mysqli_free_result($categorias_do_banco);
 mysqli_close($conecta); ?>
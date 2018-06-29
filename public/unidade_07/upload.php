<?php require_once("../../conexao/conexao.php"); ?>
<?php
    session_start();
    
if( isset($_POST["enviar"])){
    $mensagem = publicarArquivo($_FILES['upload_file']);   
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP INTEGRACAO</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <style>
            input{
                display: block;
                margin-bottom: 15px;
            }
        </style>
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="upload_file">
                <input type="submit" name="enviar" value="publicar">
                <?php
                if(isset($mensagem)){
                    echo $mensagem;
                }
                
                ?>
            </form>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>
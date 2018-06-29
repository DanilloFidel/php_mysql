<?php require_once("../../conexao/conexao.php"); ?>
<?php 
    //iniciando sessao
    session_start();
    //verificando proteger pagina
    if( !isset($_SESSION["user_portal"])){
        header("Location:login.php");
    }
    if(isset($_POST["nometransportadora"])){
        $trID = $_POST["transportadoraID"];
        
        $delete = "DELETE FROM transportadoras WHERE transportadoraID = {$trID} ";
        $conexao = mysqli_query($conecta,$delete);
        if(!conexao){
            die("Falha no acesso ao banco de dados!");
        }else{
            header("location:lista_transportadoras.php");
        }
    }
    //consulta a tabela transportadoras
    $tr = "SELECT * ";
    $tr .= "FROM transportadoras ";
    if(isset($_GET["codigo"]) ) {
        $id = $_GET["codigo"];
        $tr .= "WHERE transportadoraID = {$id} ";
    } else {
        $tr .= "WHERE transportadoraID = 1 ";
    }
    
    $con_transportadora = mysqli_query($conecta,$tr);
    if(!$con_transportadora) {
        die("Erro na consulta");
    }
    $info_transportadora = mysqli_fetch_assoc($con_transportadora); //transformando array assoc
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP INTEGRACAO</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/alteracao.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>
            <div id="janela_formulario">
               <form action="exclusao.php" method="post">
               <h2>Exclusão de Transportadoras</h2>
               
               <label for="nometransportadora">Nome da transportadora</label>
                 <input type="text" value="<?php echo utf8_encode($info_transportadora["nometransportadora"]) ?>" name="nometransportadora" id="nometransportadora">
                 
                <label for="cidade">Cidade</label>
                 <input type="text" value="<?php echo utf8_encode($info_transportadora["cidade"]) ?>" name="cidade" id="cidade">
                 
                 <input type="hidden" name="transportadoraID" value="<?php echo $info_transportadora["transportadoraID"] ?>">
                 <input type="submit" value="Excluir">
                 
                
               </form> 
           </div>  
             
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>
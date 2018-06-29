<?php require_once("../../conexao/conexao.php"); ?>
<?php 
    if (isset($_GET["codigo"])){
    $produto_id = $_GET["codigo"];   
    }else{
        Header("Location: inicial.php");
    }
    //consulta ao banco de dados
    $consulta_detalhe = "SELECT * ";
    $consulta_detalhe .= "FROM produtos ";
    $consulta_detalhe .= "WHERE produtoID = {$produto_id} ";
    $detalhe = mysqli_query($conecta, $consulta_detalhe);

    if(!$detalhe){
        die("Falha na consulta ao banco de dados!");
    }else{
        $dados_produto = mysqli_fetch_assoc($detalhe);
        $produtoId = $dados_produto['produtoID'];
        $nomeproduto = $dados_produto['nomeproduto'];
        $descricao = $dados_produto['descricao'];
        $codigobarra = $dados_produto['codigobarra'];
        $tempoentrega = $dados_produto['tempoentrega'];
        $precorevenda = $dados_produto['precorevenda'];
        $precounitario = $dados_produto['precounitario'];
        $estoque = $dados_produto['estoque'];
        $imagemgrande = $dados_produto['imagemgrande'];
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produtos_detalhe.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="detalhe_produto">
                <ul>
                    <li class="imagem" ><img src="<?php echo $imagemgrande; ?>"/></li>
                    <li><h2><?php echo $nomeproduto; ?></h2></li>
                    <li>Descrição: <?php echo $descricao; ?></li>
                    <li>Entrega :<?php echo $tempoentrega; ?> dias</li>
                    <li>Preço de revenda: R$ <?php echo number_format($precorevenda, 2, ",", "."); ?></li>
                    <li>Preço: R$<?php echo number_format($precounitario, 2, ",", "."); ?></li>
                    <li>Estoque: <?php if($estoque >0){
                                            echo $estoque;
                                        }else{
                                            echo ("Produto indisponível!");
                                        }?>
                    </li>
                </ul>
            </div>
        </main>

        <?php include_once("_incluir/footer.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>
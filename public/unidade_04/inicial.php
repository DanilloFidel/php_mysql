<?php require_once("../../conexao/conexao.php"); ?>
<?php 
    //definir localização
    setlocale(LC_ALL, 'pt-BR');
    //consulta banco de dados
    $produtos = "SELECT produtoId, nomeproduto, tempoentrega, precounitario, imagempequena ";
    $produtos .= "FROM produtos ";
    if (isset($_GET["produto"])){
        $nome_produto = $_GET["produto"];
        $produtos .= "WHERE nomeproduto LIKE '%{$nome_produto}%' ";
    }
    //busca query
    $resultado = mysqli_query($conecta, $produtos);
    //verifica se funciona
    if(!$resultado){
        die("Falha na consulta ao banco de dados");
    }
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>

    <!-- estilo -->
    <link href="_css/estilo.css" rel="stylesheet">
    <link href="_css/produtos.css" rel="stylesheet">
    <link href="_css/produto_pesquisa.css" rel="stylesheet">
</head>

<body>
    <?php include_once("_incluir/topo.php"); ?>

    <main>
        <div id="janela_pesquisa">
           <form action="inicial.php" method="get">
               <input type="text" name="produto" placeholder="pesquisar produtos">
               <input type="image" name="pesquisa" src="assets/botao_search.png">
           </form>   
        </div>
        
        <div id="listagem_produtos">
            <?php 
                while($linha = mysqli_fetch_assoc($resultado)){ //abre while e fecha depois do UL
            ?>

            <ul>
                <li class="imagem"><a href="detalhe.php?codigo=<?php echo $linha['produtoId']; ?>"><img src="<?php echo $linha["imagempequena"] ?>"/></a></li>
                <li><h3><?php echo $linha["nomeproduto"] ?></h3></li>
                <li>Tempo de entrega:
                    <?php echo $linha["tempoentrega"] ?>
                </li>
                <li>Pre&ccedil;o unidade: R$
                    <?php echo number_format($linha["precounitario"], 2, ',', '.') ?>
                </li>
            </ul>

            <?php 
                } //fecha aqui
            ?>
        </div>
    </main>

    <?php include_once("_incluir/footer.php"); ?>
</body>

</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>
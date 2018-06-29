<header>
    <div id="header_central">
        <?php 
            if(isset($_SESSION["user_portal"])){
                $user = $_SESSION["user_portal"];
                //consultar db
                $saudacao = "SELECT nomecompleto ";
                $saudacao .= "FROM clientes ";
                $saudacao .= "WHERE clienteID = '{$user}'";
                $saudacao_login = mysqli_query($conecta, $saudacao);
                if(!$saudacao_login){
                    die("Falha na consulta ao banco de dados!");
                }
                $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                $nome = $saudacao_login["nomecompleto"];
        ?>    
            <div id="header_saudacao"><h5>Bem vindo, <?php echo $nome; ?> - <a href="sair.php">Sair</a></h5></div> 
        <?php
            }
        ?>
        <a href="listagem.php"><img src="assets/logo_andes.gif"></a>
        <img src="assets/text_bnwcoffee.gif">
    </div>
</header>
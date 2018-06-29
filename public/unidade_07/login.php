<?php require_once("../../conexao/conexao.php"); ?>
<?php
    session_start(); //iniciando session
        
    if(isset($_POST["usuario"])){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];   
        //consultando banco
        $login = "SELECT * ";
        $login .= "FROM clientes ";
        $login .= "WHERE usuario = '{$usuario}' and senha = '{$senha}'";
        $acesso = mysqli_query($conecta, $login);
        if(!$acesso){
            die("Não foi possivel consultar o banco de dados!");
        }
        $informacao = mysqli_fetch_assoc($acesso);
        if (empty($informacao)){
            $mensagem = "Usuario ou senha incorretos.";
        }else{
            $_SESSION["user_portal"] = $informacao["clienteID"]; //adicionando session usuario
            header("Location:listagem.php");
        }
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/login.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div id="header_central">
                <img src="assets/logo_andes.gif">
                <img src="assets/text_bnwcoffee.gif">
            </div>
        </header>
        
        <main>  
            <div id="janela_login">
               <form action="login.php" method="post">
                  <h2>Painel do Almoxarife</h2>
                   <input type="text" name="usuario" placeholder="Usuario">
                   <input type="password" name="senha" placeholder="Senha">
                   <input type="submit" value="Login">
                   <?php   
                        if (isset($mensagem)){      
                    ?>
                        <p><?php echo $mensagem; ?></p>  
                    <?php         
                    } 
                    ?>
                   
               </form> 
            </div>
        </main>

        <footer>
            <div id="footer_central">
                <p>ANDES &eacute; uma empresa fict&iacute;cia, usada para o curso PHP Integra&ccedil;&atilde;o com MySQL.</p>
            </div>
        </footer>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>
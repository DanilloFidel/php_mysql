<?php
    function enviarMensagem($dados){
        //dados do formulário colocados em variaveis
        $nome_usuario = $dados["nome"];
        $email_usuario = $dados["email"];
        $mensagem_usuario = $dados["mensagem"];
        
        //criar variaveis de envio
        $destino = "danillopkt@gmail.com";
        $remetente = "aquientraemail@dodominio.com.br";
        $assunto = "mensagem do site";
        
        //corpo do email
        $mensagem = "Ola, você recebeu um email de " . $nome_usuario . "<br>" . $mensagem_usuario;
        
        return mail($destino,$assunto,$mensagem,$remetente);
    };
?>
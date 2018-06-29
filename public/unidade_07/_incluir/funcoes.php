<?php
    function mostrarAlertasUploads($numero) {
        
        $array_erro = array(
        UPLOAD_ERR_OK => "SEM ERRO",
        UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido!",
        UPLOAD_ERR_FORM_SIZE => "O arquivo enviado excede o limite definido no formulario",
        UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
        UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
        UPLOAD_ERR_NO_TMP_DIR => "Pasta temporaria ausente",
        UPLOAD_ERR_CANT_WRITE => "Falha ao escrever o arquivo em disco",
        UPLOAD_ERR_EXTENSION => "Uma extensão PHP interompeu o upload.",
    );
      return $array_erro[$numero];  
    }

?>
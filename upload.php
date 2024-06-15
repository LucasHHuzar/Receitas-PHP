<?php
//nao testei o codigo pois esta com erro na pagina principal, testei em outro site aparentemente deu certo
function uploadFile($file){
    // Diretório onde o arquivo será salvo

   //require_once "../Receitas-PHP";
  $current_dir = __DIR__;

 // constroi o caminho da pasta
  $target_dir = $current_dir . "/img";

  //checa se a pasta existe se na exisst cria uma nova pasta
       if (!is_dir($target_dir)) {
        if (!mkdir($target_dir, 0777, true)) {
            die('Failed to create upload directory');
        }
    }


    // caminho completo do arquivo adicionado "/" para especificar a pasta e o path correto
    $target_file = $target_dir . "/" . basename($_FILES["file"]["name"]);
    $tipoImg = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $uploadOk = 1;

    // Verifica se o arquivo é uma imagem real
    $verificandoImg = getimagesize($_FILES["file"]["tmp_name"]);
    if ($verificandoImg !== false) {
      //  echo "Arquivo é uma imagem - " . $verificandoImg["mime"] . ".";
        $uploadOk = 1;
    } else {
       // echo "Arquivo não é uma imagem.";
        $uploadOk = 0;
    }

    // Verifica se o arquivo já existe
    if (file_exists($target_file)) {
        //echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    //permiti so formato de "imagem"
    if ($tipoImg != "jpg" && $tipoImg != "png" && $tipoImg != "jpeg"
    && $tipoImg != "gif") {
      echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verifica se deu algum dos erros acima no upload
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            
         return  "/img/" . basename($file["name"]);
        //    echo "O arquivo ". htmlspecialchars(basename($_FILES["file"]["name"])). " foi enviado com sucesso.";
        } else {
           // echo "Desculpe, houve um erro ao enviar seu arquivo.";
        }
    }
}


?>

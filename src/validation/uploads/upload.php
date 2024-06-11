<?php
//nao testei o codigo pois esta com erro na pagina principal, testei em outro site aparentemente deu certo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Diretório onde o arquivo será salvo
    $target_dir = "uploads/img/+.";
    // Caminho completo do arquivo
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $tipoImg = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $uploadOk = 1;

    // Verifica se o arquivo é uma imagem real
    $verificandoImg = getimagesize($_FILES["file"]["tmp_name"]);
    if ($verificandoImg !== false) {
        echo "Arquivo é uma imagem - " . $verificandoImg["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Arquivo não é uma imagem.";
        $uploadOk = 0;
    }

    // Verifica se o arquivo já existe
    if (file_exists($target_file)) {
        echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    //permiti so formato de "imagem"
    if ($tipoImg != "jpg" && $tipoImg != "png" && $tipoImg != "jpeg"
    && $tipoImg != "gif") {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verifica se deu algum dos eros acima no upload
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "O arquivo ". htmlspecialchars(basename($_FILES["file"]["name"])). " foi enviado com sucesso.";
        } else {
            echo "Desculpe, houve um erro ao enviar seu arquivo.";
        }
    }
}
?>

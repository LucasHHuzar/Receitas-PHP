
<?php 

    require_once "functions.php";
    validarUsuario();

    require_once "header.php";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Receitas</title>
</head>
<body>

   
    <?php 
    require_once "form-cadastroReceita.php";
    ?>

</body>
</html>
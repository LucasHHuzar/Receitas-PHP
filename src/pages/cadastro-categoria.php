
<?php 

  //  require_once "../functions/functions.php";
   // validarUsuario();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 

//chamamso o formulario e o banco para cadastrar a categoria
    require_once "../forms/cadastrarCategoria.php";

        $categoria = $_POST['categoria'];


        require_once "../database/banco.php";

        cadastrarCategoria($categoria, true);


    ?>


</body>
</html>
<form action="" method="post" enctype="multipart/form-data">
        <label for="">Nome do prato:</label>
        <input type="text" name="nomePrato" id="">

        <br><br>
        <select id="tipoPrato" name="tipoPrato">

        <?php 
            /*aqui recebemoss o valor de getAllCategoriass e prenchemos a opcao
             options com as categorias do banco 
            */
            $categoria = GetAllCategoria();

            if($categoria != false) {
                //loop para pegar as categorias e criar um elemento tipo option com os dados
                foreach($categoria as $categorias){
                    echo "<option value=\"{$categorias['categoria']}\">{$categorias['categoria']}</option>";
                }
            }

        
        ?>
        </select>

        <!-- pedindo img para a pessoa -->
        <br><br>
        <label for="file">Escolha uma imagem do seu prato:</label>
        <input type="file" name="file" id="file" accept="image/*">
        <input type="submit" value="Upload">


       <textarea name="conteudoReceita" id=""></textarea>

        <br><br>
        <input type="submit" value="Criar">

        <?php

        //valida as informacoes e chama a funcao cadastro de receita
        require_once "../functions/functions.php";
       
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
            $nomePrato = $_POST['nomePrato'];
            $tipoPrato = $_POST['tipoPrato'];
            $file = $_FILES['file'];

            cadastroReceita($nomePrato, $tipoPrato, $file);

        }


        ?>
    
    </form>
<form action="" method="post" enctype="multipart/form-data">

    <div>

        <div class="paginasAdicionais">
            <a class="funcoesAdiconais" href="deletarReceitas.php">Deletar Receitas</a>
            <a class="funcoesAdiconais" href="">Editar Receitas</a>
        </div>

    <div class="headederForms">

    <div class="info">

        <div class="p">

             <p>Cadastrar Receita</p>
             
        </div>
       
    </div>

    
    
        <input class="inputsText" type="text"  name="nomePrato" id="" placeholder="nome da receita">
        <label for="imageUpload" class="inputs">Selecionar imagens</label>
        <input type="file" id="imageUpload"   name="file" accept="image/*" style="display: none">

        <div>
            <div>
                <select class="selector" id="tipoPrato" name="tipoPrato">

        <?php 
                    require_once "head.php";
                    require_once "functions.php";

                    if(!isset($_SESSION['usuario'])) {
                        echo "Error: Usuario nao Esta logado";
                        exit;
                    }

                    $usuario = $_SESSION['usuario'];

                        /*aqui recebemoss o valor de getAllCategorias e prenchemos a opcao
                        options com as categorias do banco 
                        */

                        $categoria = getAllCategorias();


                        if($categoria != false) {
                            //loop para pegar as categorias e criar um elemento tipo option com os dados
                        foreach($categoria as $categorias){
                                echo "<option value=\"{$categorias['categoria']}\">{$categorias['categoria']}</option>";
                            }
                    } 
 ?>

                 
                </select>
            </div>
    </div>
 
      
    </div>

        <!-- pedindo img para a pessoa -->

        <div class="conteudoReceita">
            <p class="info">Insira o conteudo da receita</p>
            <textarea class="receitaArea" name="conteudo"></textarea>
        </div>
      
        <div class="imageSelector">
     
        <input   class="imagePicker"type="submit" value="Criar Receita">
        </div>
        </div>
        
     
    </form>
 <?php

//valida as informacoes e chama a funcao cadastro de receita

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nomePrato = $_POST['nomePrato'];
$tipoPrato = $_POST['tipoPrato'];
$file = $_FILES['file'];

$conteudo = isset($_POST['conteudo']) ? $_POST['conteudo'] : ''; // Check if 'conteudo' is set

cadastroReceita($usuario, $nomePrato, $tipoPrato, $file, $conteudo);

}


?>
<style>

.paginasAdicionais{
    display: flex;
    align-items: center;
    font-size: 20px;
    gap: 1em;
    justify-content: center;
    margin-top: 5em;
}

.funcoesAdiconais{
    background-color: rgb(252, 43, 43);
    padding: 1em;
    text-decoration: none;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 1em;
    transition:  300ms ease-in-out;
}
.funcoesAdiconais:hover{
    cursor: pointer;
    background-color: rgb(56, 66, 210);
}
.headederForms{
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10em 10em 4em 10em;
    gap: 3em;
}

.inputsText{
    width: 500px;
        height: 50px;
        padding: 1em;
        border: none;
        background-color: white;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
        border-radius: 3em;
        outline: none;
        font-family: Arial, Helvetica, sans-serif;
}

    .inputs{
        background-color: rgb(252, 43, 43);
        border: none;
        padding: 1em;
        color: white;
        font-size: 15px;
        border-radius: 1em;
        font-family: Arial, Helvetica, sans-serif;
        transition: 300ms ease-in-out;
        width: 200px;
    }

    .inputs:hover{
        cursor: pointer;
        background-color: rgb(56, 66, 210);
    }

    .info{
        position: relative;
    }

    .p{
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
        color:rgb(154, 154, 154);
        top: -95px;
        left: 60px;
        width: 300px;
        font-size: 20px;
       
    }

    .selector{
        background-color: white;
        padding: 1em;
        width: 200px;
        color: black;
        border-radius: 1em;
        outline: none;
        border: none;
        appearance: none; 
        -webkit-appearance: none; /* For older WebKit browsers */
        -moz-appearance: none; /* For older Firefox */
        border:  rgb(252, 43, 43) 1px solid;
        
    }

    .selector:hover{
        cursor: pointer;
    }

    .imageSelector{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2em;
    }

    .receitaImage{
        background-color: white;
        padding: 5em;
        border-radius: 1em;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
    }

    .selectImage {
        width: 500px;
        padding: 1em;
        border-radius: 1em;
        border: none;
        color: white;
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
        cursor: pointer;
        outline: none;
        position: relative; /* Ensure relative positioning for child elements */
    }

    .imagePicker{
        background-color: rgb(252, 43, 43);
        font-size: 20px;
        margin-left: 1.5em;
        padding: 2em;
        width: 950px;
        text-align: center;
        border-radius: 1em;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        transition: 300ms ease-in-out;
        outline: none;
        border: none;
    }

    .imagePicker:hover{
        cursor: pointer;
        background-color: rgb(56, 66, 210);
    }

    .conteudoReceita{
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        padding: 5em;
    }

    .receitaArea{
        width: 1000px;
        height: 1000px;
        border: none;
        background-color: white;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
        border-radius: 1em;
        outline: none;
    }

    .info{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 30px;
        color:  lightgray;
    }
</style>

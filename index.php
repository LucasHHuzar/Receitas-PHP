<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
        <header>
            <div>
                <div class="cabecalho">
                        <div>
                           <img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE13zAlmPuC9YmevJRJ4VJV0tSE9cpjM4KOg&s" alt="image not founded">
                        </div>

                       <div>

                            <div>
                                <button class="interacaoUsuario" onclick="displayMenu()" >usuario</button>
                            </div>
                            <div class="menu" id=displayMenu > 
                            
                                    <div class="menuOptions">
                                            <?php 
                                            /*  nescessario passar o __DIR__ . para pegar o caminho absoluto e permitir que o 
                                            menu apareca na pagina index mesmo sem login*/
                                            require_once __DIR__ . "./src/view/head.php";?>
                                        
                                        
                                            <?php cadastrarCtegoria(); ?> 
                                            <?php cadastroDeReceitas(); ?>
                                        </div>
                            </div>
                       </div>
                     
                        
                </div>
                <div class="menuCategorias">
                    
                        <?php login(); ?>
                        <div>|</div>
                        <?php cadastro(); ?>
                    
                </div>
            </div>
             
        </header>

        <body>


           <!-- adicao de manipulacao da dom botoes e interacao -->
<script>
            function displayMenu(){
                let displayMenu = document.getElementById("displayMenu") ;

             

                if(displayMenu.style.display == "block"){
                    displayMenu.style.display = "none";
                }else{
                    displayMenu.style.display = "block";
                }


            }

</script>


        <!-- adicao de stilo a pagina -->

<style>

.cabecalho{
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}

.logo{
    width: 300px;
    height: 260px;
}

.menu{
    position: relative;
    display: none;
    right: 120px;
}

.menuOptions{
    position: absolute;
    display: flex;
    flex-direction: column;
    gap: 1em;
    padding: 1em;
    background-color: white;
    width: 150px;
    text-align: left;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);

}

.interacaoUsuario{
    background-color: white;
    border: none;
    padding: 1em;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
    font-size: 16px;
    transition: 300ms ease-in-out;
    margin-bottom: 1em;
}

.interacaoUsuario:hover{
    cursor: pointer;
    background-color: lightgray;
}

.menuCategorias{
    display: flex;
    gap: 1em;
    background-color: red;
    padding: 1em;
    justify-content: center;
    font-size: 20px;
    background-color: white;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);

}

</style>



        </body>

</html>
<header>
    <div>
        <div class="cabecalho">
            <div>
                <img class="logo"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE13zAlmPuC9YmevJRJ4VJV0tSE9cpjM4KOg&s"
                    alt="image not founded">
            </div>

            <div>

                <?php 

                        require_once "navigation.php"; require_once "head.php";?>

                <div>
                    <button class="interacaoUsuario" onclick="displayMenu()">
                        <?php echo isset($usuario) ? htmlspecialchars($usuario) : 'Usuário'; ?></button>
                </div>
                <div class="menu" id=displayMenu>

                    <div class="menuOptions">



                        <?php
                                                    
                                                    if($usuario == null){
                                                        login(); 
                                                        cadastro(); 
                                                    }else{
                                                        cadastrarCtegoria();
                                                        cadastroDeCategoria();
                                                        logout();
                                                    } ?>



                    </div>
                </div>
            </div>


        </div>


        <div class="menuCategorias">

            <a href="index.php" class="categoria-link">Pagina inicial</a>
            <?php require_once "functions.php";
                                
                                $count = 0;
                                $max_count  = 10;

                                    $fetch = getAllCategorias();

                                    if($fetch != false){
                                        foreach($fetch as $featch){
                                            if($count >= $max_count){
                                                break;
                                            }
                                            $categoria = urlencode($featch['categoria']);
                                            $url = "receitasPorCategoria.php?categoria={$categoria}";
                                                echo "<div class='categorias'>";
                                                echo "<a href='{$url}' class='categoria-link'>" . htmlspecialchars($featch['categoria']) . "</a>";
                                                echo "</div'>";
                                           $count++;
                                           
                                        }
                                        
                                    }
                                
                                ?>

            <a href="todasAsReceitas.php" class="categoria-link">Todas as categorias</a>

        </div>

    </div>


</header>


<script>
function displayMenu() {
    let displayMenu = document.getElementById("displayMenu");



    if (displayMenu.style.display == "block") {
        displayMenu.style.display = "none";
    } else {
        displayMenu.style.display = "block";
    }


}
</script>


<!-- adicao de stilo a pagina -->

<style>
.cabecalho {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}

.logo {
    align-items: left;
    width: auto;
    height: auto;
    margin: 0;
}

.menu {
    position: relative;
    display: none;
    right: 120px;
    
}

.menuOptions {
    position: absolute;
    display: flex;
    flex-direction: column;
    gap: 1em;
    padding: 1em;
    background-color: white;
    width: 150px;
    text-align: left;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
    border-radius: 1em 0;
}

.interacaoUsuario {
    background-color: white;
    border: none;
    padding: 1em;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
    font-size: 16px;
    transition: 300ms ease-in-out;
    margin-bottom: 1em;
    font-size: 20px;
    border-radius: 1em;
    background-color: red;
    color: white;
}

.interacaoUsuario:hover {
    cursor: pointer;
    background-color: rgb(56, 66, 210);
}


.menuCategorias {
    display: flex;
    gap: 1em;
    align-items: center;
    background-color: rgb(56, 66, 210);
    padding: 0.5em 0;
    justify-content: center;
    font-size: 20px;
    background-color: rgb(252, 43, 43);
    width: 100%;
}

.categorias {
    display: flex;
    align-items: center;
    gap: 2em;
}

.categoria-link {
    text-decoration: none;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    padding: 1em;
    transition: 300ms ease-in-out;
    border-radius: 1em;
}

.categoria-link:hover {
    cursor: pointer;
    background-color: blue;
    background-color: rgb(56, 66, 210);
}
</style>
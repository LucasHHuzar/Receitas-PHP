<header>
            <div>
                <div class="cabecalho">
                        <div>
                           <img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE13zAlmPuC9YmevJRJ4VJV0tSE9cpjM4KOg&s" alt="image not founded">
                        </div>

                       <div>

                       <?php 

                        require_once "navigation.php"; require_once "head.php";?>

                            <div>
                                <button class="interacaoUsuario" onclick="displayMenu()" >   <?php echo isset($usuario) ? htmlspecialchars($usuario) : 'Usuário'; ?></button>
                            </div>
                                    <div class="menu" id=displayMenu > 
                                    
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
                                 
                               
                              
                                </div>
                    </div>
                            
             
        </header>


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
    font-size: 20px;
    border-radius: 1em;
    background-color: red;
    color: white;
}

.interacaoUsuario:hover{
    cursor: pointer;
    background-color: rgb(56, 66, 210);
}


.menuCategorias{
    display: flex;
    gap: 1em;
    background-color: rgb(56, 66, 210);
    padding: 1em;
    justify-content: center;
    font-size: 20px;
    background-color: rgb(252, 43, 43);
}

</style>
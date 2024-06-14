<form action="" method="post">
<!-- formulario para cadastrar categorias -->
 <div class="inputCategoria">
    <div class="info">
        <div class="p">
             <p>Cadastrar Categoria</p>
        </div>
       
    </div>
    
  <input class="input" type="categoria" name="categoria" placeholder="    categoria">
    <button class="button" type="submit" name="action" value="cadastrar">Cadastrar</button>
    <button class="button" type="submit" name="action" value="deletar" >Deletar</button>
 </div>
  
 
</form>

<style>

    .inputCategoria{
       display: flex;
       justify-content: center;
       padding: 10em 3em;
       align-items: center;
       gap: 2em;
       font-family: Arial, Helvetica, sans-serif;
    }

    .input{
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

    .button{
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

    .button:hover{
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
</style>
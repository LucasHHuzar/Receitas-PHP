<pre>
<?php 

    $banco = new mysqli("localhost", "root", "", "receitas_php");

   // FUNCOES EM COMUM 

    function createOnDB(string $into, string $values, bool $debug=false) : void {
        global $banco;

        $q = "INSERT INTO $into VALUES $values";
        
        $resp = $banco->query($q);

        if($debug){
            echo "Query: $q";
            echo var_dump($resp);
        }
    }
    
    function updateOnDB($database, $set, $where, bool $debug=false) : void {
        global $banco;
        $q = "UPDATE $database SET $set WHERE $where";
        
        $resp = $banco->query($q);

        if($debug){
            echo "Query: $q";
            echo var_dump($resp);
        }
    }

    function deleteFromDB(string $database, string $where, bool $debug=false) : void {
        global $banco;
        
        $q = "DELETE FROM $database WHERE $where";
        $resp = $banco->query($q);

        if($debug){
            echo "Query: $q";
            echo var_dump($resp);
        }
    }
    
    // FUNCOES DE USUARIO 
    function criarUsuario($usuario, $nome, $senha, bool $debug=false) : void {
        global $banco;

        // $q = "INSERT INTO usuarios(cod, usuario, nome, senha) VALUES (NULL, 'pedroca', 'pedro', '122')";

        $senha = password_hash($senha, PASSWORD_DEFAULT);
        // createOnDB("usuarios(cod, usuario, nome, senha)", "(NULL, '$usuario', '$nome', '$senha')");

        $q = "INSERT INTO usuarios(cod, usuario, nome, senha) VALUES (NULL, '$usuario', '$nome', '$senha')";
        
        $resp = $banco->query($q);

        if($debug){
            echo "Query: $q";
            echo var_dump($resp);
        }
    }
    
    function atualizarUsuario($usuario, $nome="", $senha="", $debug=false) : void {
        global $banco;
        
        if($nome != "" && $senha != ""){
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $set = "nome='$nome', senha='$senha'";
        }else if($nome != ""){
            $set = "nome='$nome'";
        }else if($senha != ""){
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $set = "senha='$senha'";
        }

        // $q = "UPDATE usuarios SET senha='$senha' WHERE usuario='$usuario'";
        $q = "UPDATE usuarios SET $set WHERE usuario='$usuario'";
        // updateOnDB("usuarios", $set, "usuario='$usuario'");
        // updateOnDB("usuarios", "nome='$nome', senha='$senha'", "usuario='$usuario'");


        $resp = $banco->query($q);
        
        if($debug){
            echo "Query: $q";
            echo var_dump($resp);
        }
    }

    function buscarUsuario(string $usuario, bool $debug=false) {
        global $banco;

        $q = "SELECT usuario, nome, senha FROM usuarios WHERE usuario='$usuario'";

        $busca = $banco->query($q);
        // echo var_dump($busca);

        return $busca;
    }

    function deletarUsuario(string $usuario, bool $debug=false) : void {
        global $banco;

        // deleteFromDB("usuarios", "usuario='$usuario'");
        $q = "DELETE FROM usuarios WHERE usuario='$usuario'";
        $resp = $banco->query($q);

        if($debug){
            echo "Query: $q";
            echo var_dump($resp);
        }
    }
    



    // criarUsuario("zezinho", "arthur", "senha47");
    // criarUsuario("joaozinho", "joao", "AbC1");
    // atualizarUsuario("joaozinho", "", "456", true);

?>
</pre>
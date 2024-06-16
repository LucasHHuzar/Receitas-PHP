<pre>
<?php 

    $banco = new mysqli("localhost:3307", "root", "", "receitas_php");
    //checa se a conexao com o banco 
    if($banco->connect_error){
        die("erro de conexao com banco: " . $banco->connect_error);
    }

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

     

        $senha = password_hash($senha, PASSWORD_DEFAULT);
      
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

       
        $q = "UPDATE usuarios SET $set WHERE usuario='$usuario'";



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


    // funcao para cadastro de novas categorias
    function cadastrarCategoria(string $user_id, string $categoria, bool $debug = false) {
        global $banco;
    
      
        $check_query = "SELECT COUNT(*) AS count FROM `categorias` WHERE `categoria` = ?";
        
        if ($stmt_check = $banco->prepare($check_query)) {
            $stmt_check->bind_param("s", $categoria);
            $stmt_check->execute();
            $stmt_check->bind_result($count);
            $stmt_check->fetch();
            $stmt_check->close();
    
          
            if ($count > 0) {

                if ($debug) {
                    echo "Categoria '$categoria' já existe.";
                }
                return false;
            }
        } else {
            if ($debug) {
                echo "Error preparing statement for check: " . $banco->error;
            }
            return false;
        }
    
    
        $insert_query = "INSERT INTO `categorias` (`user_id`, `categoria`) VALUES (?, ?)";
        
        if ($stmt_insert = $banco->prepare($insert_query)) {
            $stmt_insert->bind_param("ss", $user_id, $categoria);
            $resp = $stmt_insert->execute();
            $stmt_insert->close();
    

            if ($resp) {
                if ($debug) {
                    echo "Categoria '$categoria' cadastrada com sucesso para o usuário '$user_id'.";
                }
                return true;
            } else {
                if ($debug) {
                    echo "Erro ao cadastrar a categoria.";
                }
                return false;
            }
        } else {
            if ($debug) {
                echo "Error preparing statement for insertion: " . $banco->error;
            }
            return false;
        }
    }

    // funcao para fazer o featch (buscar) todas as categorias do banco baseado no ususario
    function fetchUserCategoria(string $user_id) {
        global $banco;
    
        $q = "SELECT * FROM `categorias` WHERE `user_id` LIKE ?";
    
        if ($stmt = $banco->prepare($q)) {
         //bind o paramtro usuario_id para que o featch puxe do bancoa penas os dados daquele usuario
            $stmt->bind_param("s", $user_id);
    
            // Executa a query
            if ($stmt->execute()) {
              // pege todos os resultados encontrados
                $resultado = $stmt->get_result();
    
                // Fetch os dados
                $categorias = $resultado->fetch_all(MYSQLI_ASSOC);
    
                // libera o resultado
                $resultado->free();
    
                // fecha acao
                $stmt->close();
    
                return $categorias;
            } else {
                echo "Query execution error: " . $stmt->error;
            }
        } else {
            echo "Error preparing statement: " . $banco->error;
        }
    
        return false;
    }
    function deletarCategoriaDb(String $user_id, $categoria){

        global $banco; 

            $categoria = $banco->real_escape_string($categoria);

            /* realiza a acao no banco para pegar categorias baseadas no id 
            isso garante que o ususario possa apagar apenas categorias que possuam seu id */
            $q = "DELETE FROM `categorias` WHERE `user_id` = '{$user_id}' AND `categoria` = '{$categoria}'";

            // executa a acao
            $resultado = $banco->query($q);

            // checka a acao 
            if ($resultado === false) {
                echo "Query error: " . $banco->error;
                return false;
            }

            // Rretorna a acao se houver sucesso
            return true;

    }

    function cadastrarNovaRaceita(String $user_id, $nome, $categoria, $file_path, $conteudo, bool $debug=false){
        global $banco;



        $check_query = "SELECT COUNT(*) AS count FROM `receitas` WHERE `user_id` = ? AND `nome` = ?";
        
        if ($stmt_check = $banco->prepare($check_query)) {
            $stmt_check->bind_param("ss", $user_id, $nome);
            $stmt_check->execute();
            $stmt_check->bind_result($count);
            $stmt_check->fetch();
            $stmt_check->close();
    

            if ($count > 0) {
            
                if ($debug) {
                    echo "Recipe '$nome' already exists for user '$user_id'.";
                }
                return false;
            }
        } else {

            if ($debug) {
                echo "Error preparing statement for check: " . $banco->error;
            }
            return false;
        }
    
        $insert_query = "INSERT INTO `receitas` (`user_id`, `nome`, `categoria`, `file_path`, `conteudo`) VALUES (?, ?, ?, ?, ?)";
        
        if ($stmt_insert = $banco->prepare($insert_query)) {
            $stmt_insert->bind_param("sssss", $user_id, $nome, $categoria, $file_path, $conteudo);
            $resp = $stmt_insert->execute();
            $stmt_insert->close();
    
            if ($resp) {
                if ($debug) {
                  //  echo "Recipe cadastrada com sucesso";
                }
                return true;
            } else {
                if ($debug) {
                    echo "Erro ao cadastrar a receita.";
                }
                return false;
            }
        } else {
            if ($debug) {
                echo "Error preparing statement for insertion: " . $banco->error;
            }
            return false;
        }

    }

    function featchTodasAsCategorias(){
        global $banco;

        $query = "SELECT * FROM `categorias`";

        if($result = $banco->query($query)){
            $categorias = $result->fetch_all(MYSQLI_ASSOC);

            $result->free();

            return $categorias;
       }
    }



    function featchTodasAsReceitas(){
        global $banco;


        $query = "SELECT * FROM `receitas`";
    
    
        if ($result = $banco->query($query)) {

            $receitas = $result->fetch_all(MYSQLI_ASSOC);
            
          
            $result->free();
    

            return $receitas;
        } else {
 
            echo "Error executing query: " . $banco->error;
            return false; 
        }
    }

    function fetchReceitaPorCategoria($categoria){
        global $banco;
    
        $q = "SELECT * FROM `receitas` WHERE `categoria` LIKE ?";
    
        if ($stmt = $banco->prepare($q)) {
 
            $param = "%{$categoria}%"; 
            $stmt->bind_param("s", $param);
            
        
            if ($stmt->execute()) {
             
                $result = $stmt->get_result();
                $receitas = $result->fetch_all(MYSQLI_ASSOC);
                
          
                $result->free();
                
    
                $stmt->close();
                
                return $receitas;
            } else {
                echo "Error executing query: " . $stmt->error;
                return false;
            }
        } else {
            echo "Error preparing statement: " . $banco->error;
            return false;
        }
    }


    function featchReceitaPicked($nome){

        global $banco;

        $q = "SELECT * FROM `receitas` WHERE `nome` LIKE ?"; 
    
        if ($stmt = $banco->prepare($q)) {

            $param = "%{$nome}%"; 
            $stmt->bind_param("s", $param);
            
          
            if ($stmt->execute()) {
              
                $result = $stmt->get_result();
                $receitas = $result->fetch_all(MYSQLI_ASSOC);
                
                
                $result->free();
                

                $stmt->close();
                
                return $receitas;
            } else {
                echo "Error executing query: " . $stmt->error;
                return false;
            }
        } else {
            echo "Error preparing statement: " . $banco->error;
            return false;
        }

    }
?>





</pre>
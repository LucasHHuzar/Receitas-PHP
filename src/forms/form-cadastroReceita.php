<form action="upload.php" method="post">
        <label for="">Nome do prato:</label>
        <input type="text" name="nomePrato" id="">

        <br><br>
        <select id="tipoPrato">
            <option value="salgado">Salgado</option>
            <option value="doce">Doce</option>
        </select>

        <!-- pedindo img para a pessoa -->
        <br><br>
        <label for="file">Escolha uma imagem do seu prato:</label>
        <input type="file" name="file" id="file" accept="image/*">
        <input type="submit" value="Upload">

        <br><br>
        <input type="submit" value="Criar">
    
    </form>
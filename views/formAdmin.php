<section class="sessao">

    <div class="container-fluid" style="padding: 0% 5%;">

        <?php 

            switch ($_GET['type']) {
                case 'noticia':

                    if ($_GET['order'] == 'add') {
                    
                        echo '<p class="loginTitle" style="text-align: center;">Inserir Notícia</p>

                            <form action="insert.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                <input hidden type="text" name="type" value="noticia">
                                <input hidden type="text" name="data" value="'.date("d/m/Y").'">
                    
                                <label class="loginSubtitle mb-3" style="margin-bottom: 1%;" for="titulo">Titulo</label>
                                <input class="form-control" type="text" name="titulo" id="titulo" required>

                                <label class="loginSubtitle my-3" for="texto" >Texto</label>
                                <textarea id="texto" class="form-control" name="texto" rows="10" style="margin-bottom: 2%;"></textarea>

                                <label class="loginSubtitle my-3" for="cover" >Imagem de capa</label>
                                <input id="cover" type="file" class="form-control" name="cover" accept="image/*" style="margin-bottom: 2%;" required>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Adicionar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';

                    }elseif($_GET['order'] == 'edit'){

                        $localQuery = 'SELECT * FROM noticias WHERE id_noticias = '.$_GET['id'];

                        if($item = mysqli_fetch_array(mysqli_query($conn, $localQuery))){

                            echo '<p class="subtitulo4" style="text-align: center;">Editar Notícia</p>

                            <form action="update.php" method="post"  enctype="multipart/form-data" style="padding: 10% 0%;">

                                <input hidden type="text" name="type" value="noticia">
                                <input hidden type="text" name="id" value="'.$_GET['id'].'">
                                <input hidden type="text" name="data" value="'.date("d/m/Y").'">
                    
                                <label class="mb-3" style="margin-bottom: 1%;" for="titulo">Titulo</label>
                                <input class="form-control" type="text" name="titulo" id="titulo" value="'.$item['titulo'].'" required>

                                <label class="my-3" for="texto">Texto</label>
                                <textarea id="texto" class="form-control" name="texto" rows="10" style="margin-bottom: 2%;">'.$item['texto'].'</textarea>

                                <label class="my-3" for="cover">Imagem de capa</label>
                                <input id="cover" type="file" class="form-control" name="cover" accept="image/*" style="margin-bottom: 2%;">
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Editar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';
                        }

                        

                    }

                    break;

                case 'galeria':

                    if ($_GET['order'] == 'add') {
                    
                        echo '<p class="loginTitle" style="text-align: center;">Inserir Imagem</p>

                            <form action="insert.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                <input hidden type="text" name="type" value="imagem">
                    
                                <label class="loginSubtitle mb-3" style="margin-bottom: 1%;" for="titulo">Titulo*</label>
                                <input class="form-control" type="text" name="titulo" id="titulo" required>

                                <label class="loginSubtitle my-3" for="legenda">Legenda</label>
                                <textarea id="legenda" class="form-control" name="legenda" rows="5" style="margin-bottom: 2%;"></textarea>

                                <label class="loginSubtitle my-3" for="cover">Imagem*</label>
                                <input id="cover" type="file" class="form-control" name="cover" accept="image/*" style="margin-bottom: 2%;" required>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Adicionar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';

                    }elseif($_GET['order'] == 'edit'){

                        $localQuery = 'SELECT * FROM imagem_galeria WHERE id_imagem_galeria = '.$_GET['id'];

                        if($item = mysqli_fetch_array(mysqli_query($conn, $localQuery))){

                            echo '<p class="loginTitle" style="text-align: center;">Editar Imagem</p>

                            <form action="update.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                <input hidden type="text" name="type" value="imagem">
                                <input hidden type="text" name="id" value="'.$_GET['id'].'">
                    
                                <label class="loginSubtitle mb-3" style="margin-bottom: 1%;" for="titulo">Titulo*</label>
                                <input class="form-control" type="text" name="titulo" id="titulo" value="'.$item['titulo'].'" required>

                                <label class="loginSubtitle my-3" for="legenda">Legenda</label>
                                <textarea id="legenda" class="form-control" name="legenda" rows="5" style="margin-bottom: 2%;">'.$item['legenda'].'</textarea>

                                <label class="loginSubtitle my-3" for="cover">Imagem</label>
                                <input id="cover" type="file" class="form-control" name="cover" accept="image/*" style="margin-bottom: 2%;">
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Editar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';
                        }

                        

                    }

                    break;

                case 'video':

                    if ($_GET['order'] == 'add') {
                    
                        echo '<p class="loginTitle" style="text-align: center;">Inserir Vídeo</p>

                            <form action="insert.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                <input hidden type="text" name="type" value="video">
                    
                                <label class="loginSubtitle mb-3" style="margin-bottom: 1%;" for="titulo">Titulo</label>
                                <input class="form-control" type="text" name="titulo" id="titulo" required>

                                <label class="loginSubtitle my-3" style="margin-bottom: 1%;" for="link">Link</label>
                                <input class="form-control" type="text" name="link" id="link" required>

                                <label class="loginSubtitle my-3" for="texto">Legenda</label>
                                <textarea id="texto" class="form-control" name="texto" rows="5" style="margin-bottom: 2%;"></textarea>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Adicionar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';

                    }elseif($_GET['order'] == 'edit'){

                        $localQuery = 'SELECT * FROM videos_galeria WHERE id_videos_galeria = '.$_GET['id'];

                        if($item = mysqli_fetch_array(mysqli_query($conn, $localQuery))){

                            echo '<p class="loginTitle" style="text-align: center;">Inserir Vídeo</p>

                            <form action="update.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                <input hidden type="text" name="type" value="video">
                                <input hidden type="text" name="id" value="'.$_GET['id'].'">
                    
                                <label class="loginSubtitle mb-3" style="margin-bottom: 1%;" for="titulo">Titulo*</label>
                                <input class="form-control" type="text" name="titulo" id="titulo" value="'.$item['titulo'].'" required>

                                <label class="loginSubtitle my-3" style="margin-bottom: 1%;" for="link">Link*</label>
                                <input class="form-control" type="text" name="link" id="link" value="'.$item['link'].'" required>

                                <label class="loginSubtitle my-3" for="texto">Legenda</label>
                                <textarea id="texto" class="form-control" name="texto" rows="5" style="margin-bottom: 2%;">'.$item['legenda'].'</textarea>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Editar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';
                        }

                        

                    }

                    break;

                case 'categoria':

                    if ($_GET['order'] == 'add') {
                    
                        echo '<p class="loginTitle" style="text-align: center;">Inserir Categoria</p>

                            <form action="insert.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                <input hidden type="text" name="type" value="categoria">
                    
                                <label class="loginSubtitle mb-3" style="margin-bottom: 1%;" for="Categoria">Categoria</label>
                                <input class="form-control" type="text" name="categoria" id="Categoria" required>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Adicionar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';

                    }elseif($_GET['order'] == 'edit'){

                        $localQuery = 'SELECT * FROM categorias_biblioteca WHERE id_categorias = '.$_GET['id'];

                        if($item = mysqli_fetch_array(mysqli_query($conn, $localQuery))){

                            echo '<p class="loginTitle" style="text-align: center;">Editar Categoria</p>

                            <form action="update.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                <input hidden type="text" name="type" value="categoria">
                                <input hidden type="text" name="id" value="'.$_GET['id'].'">
                    
                                <label class="loginSubtitle mb-3" style="margin-bottom: 1%;" for="Categoria">Categoria</label>
                                <input class="form-control" type="text" name="Categoria" id="Categoria" value="'.$item['categoria'].'" required>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Editar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';
                        }

                        

                    }

                    break;

                case 'subcategoria':

                    if ($_GET['order'] == 'add') {
                    
                        echo '<p class="loginTitle" style="text-align: center;">Inserir Subcategoria</p>

                            <form action="insert.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                <input hidden type="text" name="type" value="subcategoria">
                    
                                <label for="categoria" class="loginSubtitle mb-3">Categoria</label>
                                <select name="categoria" id="categoria" class="form-control" style="margin-bottom: 2%;" required>';
                                    echo '<option value="" selected hidden disabled> Selecione... </option>';
                                while ($item = mysqli_fetch_array($consulta_categorias)) {
                                    echo '<option value="'.$item['id_categoria'].'">'.$item["categoria"].'</option>';
                                }
                                echo '
                                </select>

                                <label class="loginSubtitle mb-3" style="margin-bottom: 1%;" for="Subcategoria">Subcategoria</label>
                                <input class="form-control" type="text" name="subcategoria" id="Subcategoria" required>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Adicionar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';

                    }elseif($_GET['order'] == 'edit'){

                        $localQuery = 'SELECT * FROM subcategoria_biblioteca WHERE id_subcategoria = '.$_GET['id'];

                        if($item = mysqli_fetch_array(mysqli_query($conn, $localQuery))){

                            echo '<p class="loginTitle" style="text-align: center;">Editar Subcategoria</p>

                            <form action="update.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                <input hidden type="text" name="type" value="subcategoria">
                                <input hidden type="text" name="id" value="'.$_GET['id'].'">
                    
                                <label for="categoria" class="loginSubtitle mb-3">Categoria*</label>
                                <select name="categoria" id="categoria" class="form-control" style="margin-bottom: 2%;" required>';

                                while ($item2 = mysqli_fetch_array($consulta_categorias)) {
                                    if($item['categoria'] == $item2['id_categorias']){
                                        echo '<option value="'.$item2['id_categorias'].'" selected>'.$item2["categoria"].'</option>';
                                    }else{
                                        echo '<option value="'.$item2['id_categorias'].'">'.$item2["categoria"].'</option>';
                                    }
                                    
                                }
                                echo '
                                </select>

                                <label class="loginSubtitle mb-3" style="margin-bottom: 1%;" for="Subcategoria">Subcategoria*</label>
                                <input class="form-control" type="text" name="Subcategoria" id="Subcategoria" value="'.$item['subcategoria'].'" required>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Editar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';
                        }

                        

                    }

                    break;

                case 'arquivo':

                    if ($_GET['order'] == 'add') {
                    
                        echo '<p class="loginTitle" style="text-align: center;">Inserir Documento</p>

                            <form action="insert.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                <input hidden type="text" name="type" value="arquivo">
                    
                                <label for="arquivoAdd" class="loginSubtitle mb-3">Arquivo</label>
                                <input class="form-control" type="file" name="arquivo" id="arquivoAdd">

                                <label for="subcategoria" class="loginSubtitle my-3">Subcategoria</label>
                                <select name="subcategoria" id="subcategoria" class="form-control" style="margin-bottom: 2%;" required>';
                                    echo '<option value="" selected hidden disabled> Selecione... </option>';
                                while ($item = mysqli_fetch_array($consulta_subcategorias)) {
                                    echo '<option value="'.$item['id_subcategoria'].'">'.$item["subcategoria"].'</option>';
                                }
                                echo '
                                </select>

                                <label for="abordagem" class="loginSubtitle my-3">Abordagem</label>
                                <select name="abordagem" id="abordagem" class="form-control" style="margin-bottom: 2%;" required>
                                    <option value="" selected hidden disabled> Selecione... </option>
                                    <option value="irregular"> Não tradicional </option>
                                    <option value="tradicional"> Tradicional </option>
                                </select>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Adicionar">
                    
                                <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';

                    }elseif($_GET['order'] == 'edit'){

                        $localQuery = 'SELECT * FROM arquivos_biblioteca WHERE id_arquivos = '.$_GET['id'];

                        if($item = mysqli_fetch_array(mysqli_query($conn, $localQuery))){

                            echo '<p class="loginTitle" style="text-align: center;">Inserir Documento</p>

                                <form action="update.php" method="post"  enctype="multipart/form-data" style="padding-top: 10%; padding-bottom: 15%;">

                                    <input hidden type="text" name="type" value="arquivo">
                                    <input hidden type="text" name="id" value="'.$_GET['id'].'">
                        
                                    <label for="arquivoAdd" class="loginSubtitle mb-3">Arquivo</label>
                                    <input class="form-control" type="file" name="arquivo" id="arquivoAdd">

                                    <label for="subcategoria" class="loginSubtitle my-3">Subcategoria*</label>
                                    <select name="subcategoria" id="subcategoria" class="form-control" style="margin-bottom: 2%;" required>';
                                        
                                    while ($item2 = mysqli_fetch_array($consulta_subcategorias)) {

                                        if($item['subcategoria_arquivo'] == $item2['subcategoria']){
                                            echo '<option value="'.$item2['id_subcategoria'].'" selected>'.$item2["subcategoria"].'</option>';
                                        }else{
                                            echo '<option value="'.$item2['id_subcategoria'].'">'.$item2["subcategoria"].'</option>';
                                        }
                                        
                                    }
                                    echo '
                                    </select>

                                    <label for="abordagem" class="loginSubtitle my-3">Abordagem*</label>
                                    <select name="abordagem" id="abordagem" class="form-control" style="margin-bottom: 2%;" required>';
                                        
                                    if($item['abordagem'] == "irregular"){
                                        echo '<option value="irregular" selected> Não tradicional </option>
                                            <option value="tradicional"> Tradicional </option>';
                                    }elseif($item['abordagem'] == "tradicional"){
                                        echo '<option value="irregular"> Não tradicional </option>
                                        <option value="tradicional" selected> Tradicional </option>';
                                    }
                                    
                                    echo '</select>
                                    <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Editar">
                        
                                    <a href="?page=loggedAdmin" class="inputSend" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                        
                                </form>';
                        }
                    }
                    
                    break;
                
                default:
                    header('location: index.php?page=admin');
                    break;
            
            }

        
        ?>
        
    </div>

</section>
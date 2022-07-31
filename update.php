<?php

session_start();

if(isset($_SESSION['login'])){

    include 'connection.php';

    switch ($tipo = $_POST['type']) {
        case 'noticia':

            $title = $_POST['titulo'];
            $text = $_POST['texto'];
            $data = $_POST['data'];
            $id = $_POST['id'];

            if($_FILES['cover']['size'] == 0){
                
                $query = 'UPDATE noticias SET titulo = "'.$title.'", texto = "'.$text.'", calendar = "'.$data.'" WHERE id_noticias = '.$id.'';
                echo $query;
            }else{

                $ext = strtolower(substr($_FILES['cover']['name'],-4)); //Pegando extensão do arquivo
                $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
                $dir = './imgNoticias/'; //Diretório para uploads

                move_uploaded_file($_FILES['cover']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

                $current_cover = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM noticias WHERE id_noticia = '.$id.''));
                unlink($current_cover['imagem_capa']);

                $query = 'UPDATE noticias SET titulo = "'.$title.'", texto = "'.$text.'", imagem_capa= "'.$dir.$new_name.'", calendar = "'.$data.'" WHERE id_noticias = '.$id.'';

            }

            if ($success = mysqli_query($conn, $query)) {
                //header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                //header('location: index.php?page=loggedAdmin&status=erro');
            }

            break;

        case 'imagem':

            $title = $_POST['titulo'];
            $legenda = $_POST['legenda'];
            $id = $_POST['id'];

            if($_FILES['cover']['size'] == 0){

                $query = 'UPDATE imagem_galeria SET titulo = "'.$title.'", legenda = "'.$legenda.'" WHERE id_imagem_galeria = '.$id.'';

            }else{
                $ext = strtolower(substr($_FILES['cover']['name'],-4)); //Pegando extensão do arquivo
                $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
                $dir = './imgGaleria/'; //Diretório para uploads

                move_uploaded_file($_FILES['cover']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

                $current_cover = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM imagem_galeria WHERE id_imagem_galeria = '.$id.''));
                unlink($current_cover['imagem']);

                $query = 'UPDATE imagem_galeria SET titulo = "'.$title.'", legenda = "'.$legenda.'", imagem = "'.$dir.$new_name.'" WHERE id_imagem_galeria = '.$id.'';
            }

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }

            break;
        
        case 'video':

            $title = $_POST['titulo'];
            $link = $_POST['link'];
            $legenda = $_POST['texto'];
            $id = $_POST['id'];

            $query = 'UPDATE videos_galeria SET titulo = "'.$title.'", link = "'.$link.'", texto = "'.$legenda.'" WHERE id_videos_galeria = '.$id.'';

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }

            break;
        
        case 'categoria':

            $categoria = $_POST['Categoria'];
            $id = $_POST['id'];

            $query = 'UPDATE categorias_biblioteca SET categoria = "'.$categoria.'" WHERE id_categorias = '.$id.'';

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }

            break;

        case 'subcategoria':

            $subcategoria = $_POST['Subcategoria'];
            $categoria = $_POST['categoria'];
            $id = $_POST['id'];

            $query = 'UPDATE subcategorias_biblioteca SET categoria = "'.$categoria.'", subcategoria = '.$subcategoria.' WHERE id_subcategoria = '.$id.'';

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }

            break;

        case 'arquivo':

            $subcategoria = $_POST['subcategoria'];
            $abordagem = $_POST['abordagem'];
            $id = $_POST['id'];

            if($_FILES['arquivo']['size'] == 0){

                $query = 'UPDATE arquivos_biblioteca SET subcategoria = "'.$subcategoria.'", abordagem = "'.$abordagem.'" WHERE id_arquivos = '.$id.'';

            }else{
                $ext = strtolower(substr($_FILES['arquivo']['name'],-4)); //Pegando extensão do arquivo
                $name = strtolower($_FILES['arquivo']['name']).$ext; //Definindo um novo nome para o arquivo
                
                $dir = './arquivosBiblioteca/'; //Diretório para uploads

                move_uploaded_file($_FILES['arquivo']['name'], $dir.$name); //Fazer upload do arquivo

                $current_file = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM arquivos_biblioteca WHERE id_arquivos = '.$id.''));
                unlink($current_file['local_arquivo']);

                $query = 'UPDATE arquivos_biblioteca SET subcategoria = "'.$subcategoria.'", abordagem = "'.$abordagem.'", nome_arquivo = "'.$name.'" , local_arquivo = "'.$dir.$name.'" WHERE id_arquivos = '.$id.'';
            }

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }

            break;
        
        default:
            header('location: index.php?page=loggedAdmin');
            break;
    }
    
}else {
    header('location: index.php?page=admin');
}
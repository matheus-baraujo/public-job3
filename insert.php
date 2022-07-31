<?php

session_start();

if(isset($_SESSION['login'])){

    include 'connection.php';

    switch ($tipo = $_POST['type']) {
        case 'noticia':

            $title = $_POST['titulo'];
            $text = $_POST['texto'];
            $data = $_POST['data'];

            $ext = strtolower(substr($_FILES['cover']['name'],-4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './imgNoticias/'; //Diretório para uploads

            move_uploaded_file($_FILES['cover']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

            $query = 'INSERT INTO noticias (titulo, imagem_capa, texto, calendar) VALUES ("'.$title.'","'.$dir.$new_name.'","'.$text.'","'.$data.'")';

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }

            break;

        case 'imagem':

            $title = $_POST['titulo'];
            $legenda = $_POST['legenda'];

            $ext = strtolower(substr($_FILES['cover']['name'],-4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './imgGaleria/'; //Diretório para uploads

            move_uploaded_file($_FILES['cover']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

            $query = 'INSERT INTO imagem_galeria (titulo, imagem, legenda) VALUES ("'.$title.'","'.$dir.$new_name.'","'.$legenda.'")';

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

            $query = 'INSERT INTO videos_galeria (titulo, link, texto) VALUES ("'.$title.'","'.$link.'","'.$legenda.'")';

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }

            break;
        
        case 'categoria':

            $categoria = $_POST['categoria'];

            $query = 'INSERT INTO categorias_biblioteca (categoria) VALUES ("'.$categoria.'")';

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }

            break;

        case 'subcategoria':

            $subcategoria = $_POST['subcategoria'];
            $categoria = $_POST['categoria'];

            $query = 'INSERT INTO subcategoria_biblioteca (categoria, subcategoria) VALUES ("'.$categoria.'", '.$subcategoria.')';

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }

            break;

        case 'arquivo':

            $subcategoria = $_POST['subcategoria'];
            $abordagem = $_POST['abordagem'];

            $ext = strtolower(substr($_FILES['arquivo']['name'],-4)); //Pegando extensão do arquivo
            $name = strtolower($_FILES['arquivo']['name']); //Definindo um novo nome para o arquivo
            
            $dir = './arquivosBiblioteca/'; //Diretório para uploads

            move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$name); //Fazer upload do arquivo

            $query = 'INSERT INTO arquivos_biblioteca (subcategoria_arquivo, abordagem_arquivo, nome_arquivo, local_arquivo) VALUES ("'.$subcategoria.'","'.$abordagem.'","'.$name.'","'.$dir.$name.'")';

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
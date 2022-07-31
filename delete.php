<?php

session_start();

if(isset($_SESSION['login'])){

    include 'connection.php';


    $tipo = $_GET['type'];

    switch ($tipo) {

        case 'noticia':
            $id = $_GET['id'];

            $item = mysqli_query($conn, 'SELECT * FROM noticias WHERE id_noticias= '.$id.'');
            $item2 = mysqli_fetch_array($item);
            unlink($item2['imagem_capa']);

            $query = 'DELETE FROM noticias WHERE id_noticias ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin');
            }
            break;

        case 'galeria':
            $id = $_GET['id'];

            $item = mysqli_query($conn, 'SELECT * FROM imagem_galeria WHERE id_imagem_galeria= '.$id.'');
            $item2 = mysqli_fetch_array($item);
            unlink($item2['imagem']);

            $query = 'DELETE FROM imagem_galeria WHERE id_imagem_galeria ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin');
            }
            break;

        case 'video':
            $id = $_GET['id'];

            $query = 'DELETE FROM videos_galeria WHERE id_videos_galeria ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin');
            }
            break;

        case 'categoria':
            $id = $_GET['id'];

            $query = 'DELETE FROM categorias_biblioteca WHERE id_categorias ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin');
            }
            break;

        case 'subcategoria':
            $id = $_GET['id'];

            $query = 'DELETE FROM subcategoria_biblioteca WHERE id_subcategoria ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin');
            }
            break;

        case 'arquivo':
            $id = $_GET['id'];

            $item = mysqli_query($conn, 'SELECT * FROM arquivos_biblioteca WHERE id_arquivos= '.$id.'');
            $item2 = mysqli_fetch_array($item);
            unlink($item2['local_arquivo']);

            $query = 'DELETE FROM arquivos_biblioteca WHERE id_arquivos ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin');
            }
            break;
        
        
    
        default:
            header('location: index.php?i=loggedAdmin');
            break;
    }

}
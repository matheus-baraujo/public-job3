<?php

    session_start();

    $page = 'home';

    if(isset($_GET['page'])) {
        $page = addslashes($_GET['page']);
    }

    include 'connection.php';

    include 'stringManipulation.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
    include './components/directives.php';
?>

<body>

    <?php 

        if ($page == 'home') {
            include './views/slidesHome.php';
        }

        if($page != "admin" && $page != "loggedAdmin" && $page != "formAdmin"){
            include './components/menu.php';
        }

        switch ($page) {
            case 'home':
                include './views/home.php';
                break;

            case 'sobre':
                include './views/sobre.php';
                break;

            case 'noticias':
                include './views/noticias.php';
                break;
            
            case 'artigo':
                include './views/artigo.php';
                break;
            
            case 'biblioteca':
                include './views/biblioteca.php';
                break;
        
            case 'galeria':
                include './views/galeria.php';
                break;

            case 'colabore':
                include './views/colabore.php';
                break;
        
            case 'busca':
                include './views/busca.php';
                break;

            case 'admin':
                include './views/admin.php';
                break;

            case 'loggedAdmin':
                if (isset($_SESSION['login'])) {
                    include './views/loggedAdmin.php';
                    break;
                }else{
                    header('location: index.php?page=admin');
                }

            case 'formAdmin':
                if (isset($_SESSION['login'])) {
                    include './views/formAdmin.php';
                    break;
                }else{
                    header('location: index.php?page=admin');
                }
                
            default:
                include './views/home.php';
                break;
        }

        if($page != "admin" && $page != "loggedAdmin" && $page != "formAdmin"){
            include './components/footer.php';
        }

        include './components/scripts.php';

    ?>


</body>

</html>
<?php 

$search = $_GET['query'];

$query = "SELECT * FROM noticias WHERE (titulo LIKE '%".$search."%') OR (texto LIKE '%".$search."%') ORDER BY id_noticias";

$result = mysqli_query($conn, $query);

$query = "SELECT * FROM arquivos_biblioteca WHERE nome_arquivo LIKE '%".$search."%' ORDER BY id_arquivos";

$result2 = mysqli_query($conn, $query);

?>

<section class="sessao"> 

    <a class="retorno" href="?page=home" > <i class="fas fa-angle-left"></i> Voltar</a>


    <p class="galerySubtitle" style="color: #001253; margin-top: 10%;">Notícias</p>
    <hr class="galeryRule2">

    <div class="container-fluid" style="margin-top: 5%; margin-bottom: 5%;">

        <div style="text-align: right;">
            <button id="newsPrev" class="customOwlPrev carouselControl"><i class="fas fa-angle-left"></i></button>
            <button id="newsNext" class="customOwlNext carouselControl"><i class="fas fa-angle-right"></i></button>
        </div>


        <div class="owl-carousel owl-theme owl-loaded" id="owl-news">
            <div class="owl-stage-outer">
                <div class="owl-stage">


                    <?php

                        $counter=0;

                        while($noticia = mysqli_fetch_array($result)){

                            echo '<div class="owl-item borderTop"> 
                                <img src="'.$noticia['imagem_capa'].'">
                                <p class="newTitle" style="margin-top: 5%; margin-bottom: 2%;">'.ucfirst($noticia['titulo']).'</p>
                                <p class="newText">'.$noticia['texto'].'</p>
                                <a class="newLink" href="?page=artigo&id='.$noticia['id_noticias'].'">ver notícia completa ></a>
                            </div>';

                            $counter++;
                        }

                        if ($counter == 0) {
                            
                            echo '<div class="owl-item"> 
                            </div>';

                            echo '<div class="owl-item"> 
                                <p class="mensagemBreve">Não foram encontradas notícias relacionadas</p>
                            </div>';

                            echo '<div class="owl-item"> 
                            </div>';
                        }
                    
                    ?>


                </div>
            </div>

        </div>

    </div>


    <p class="galerySubtitle" style="color: #001253; margin-top: 10%;">Documentos</p>
    <hr class="galeryRule2" style="margin-bottom: 5%;">

    <?php 
    
        $counter = 0;

        while ($linha = mysqli_fetch_array($result2)) {
            echo '<a class="downloadBtn" href="'.$linha['local_arquivo'].'" download="'.$linha['nome_arquivo'].'"> <i class="fas fa-download"></i> '.$linha['nome_arquivo'].'</a>
            <br>';

            $counter++;
        }

        if ($counter == 0) {
            echo '<p class="mensagemBreve">Não foram encontradas documentos relacionados</p>';
        }
        
    
    ?>

</section>
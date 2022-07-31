<section class="sessao">

    <div class="container-fluid">

        <div class="row">

            <div class="col-11 col-md-6 mx-auto">
                <img src="./resources/imgNoticias1.png" width="100%" alt="">
            </div>

            <div class="col-11 col-md-6 mx-auto" style="padding-right: 10%;">
                <p class="pillarsTitle">NOTÍCIAS</p>
                <hr class="aboutRule">
                <p class="pillarsText" style="text-align: justify; padding-left: 5%; padding-right: 5%; font-style: italic;">“A nova fonte de poder não é o dinheiro nas 
                    mãos de poucos, mas informação nas mãos de muitos”
                </p>
                <p class="pillarsText" style="text-align: justify; padding-left: 5%; padding-right: 5%;">John Naisbitt</p>
                
            </div>

        </div>

    </div>

    
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

                        while($noticia = mysqli_fetch_array($consulta_noticias)){

                            echo '<div class="owl-item borderTop">
                                <div class="imgNoticia" style="background-image:url('.$noticia['imagem_capa'].');"></div>
                                <p class="newTitle" style="margin-top: 5%; margin-bottom: 2%;">'.ucfirst($noticia['titulo']).'</p>
                                <p class="newText">'.$noticia['texto'].'</p>
                                <a class="newLink" href="?page=artigo&id='.$noticia['id_noticias'].'">ver notícia completa <i class="fas fa-angle-right"></i></a>
                            </div>';

                            $counter++;
                        }

                        if ($counter == 0) {
                            
                            echo '<div class="owl-item"> 
                            </div>';

                            echo '<div class="owl-item"> 
                                <p class="mensagemBreve">Mais notícias em breve...</p>
                            </div>';

                            echo '<div class="owl-item"> 
                            </div>';
                        }
                    
                    ?>


                </div>
            </div>

        </div>

    </div>

</section>
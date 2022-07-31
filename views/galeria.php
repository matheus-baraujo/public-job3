<section class="sessao">

    <div class="container-fluid">
        <div class="row">
            <div class="col-7 col-md-5 imgGalery">
                <img src="./resources/imgGaleria1.png" width="100%" alt="">
            </div>
            <div class="galeryTitleDiv">
                <p class="galeryTitle">GALERIA DE <br> MEMÓRIAS</p>
                <hr class="galeryRule">
                <p class="galerySubtitle">FOTOS E VÍDEOS</p>
            </div>
        </div>
    </div>
    
</section>

<section class="sessao">

    <div class="container-fluid">

        <p class="galerySubtitle" style="padding-left: 5%; color: #001253;">FOTOS</p>
        <hr class="galeryRule2">

        <div class="container-fluid" style="margin-top: 5%; margin-bottom: 5%;">
            <div class="row" style="margin-bottom: 10%;">

                <div class="col-1" style="padding: 0%;">
                    <button id="fotosPrev" class="customOwlPrev carouselControl" style="text-align: center; width: 100%; height: 100%; font-size: 1.5rem;"><i class="fas fa-angle-left"></i></button>
                </div>
                
                <div class="col-10 px-0">
                    <div class="owl-carousel owl-theme owl-loaded" id="owl-fotos">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">

                                <?php 
                                
                                    $counter=0;

                                    while ($imagem = mysqli_fetch_array($consulta_galeria)) {
                                        
                                        echo '<div class="owl-item"> 
                                            <img width="100%" class="imgGalery2" src="'.$imagem['imagem'].'"></img>
                                            <p class="imgLegends" style="margin-top: 0%; margin-bottom: 2%; text-align: center;">'.$imagem['legenda'].'</p>
                                        </div>';
                                        
                                        $counter++;
                                    }

                                    if($counter == 0){
                                        echo '<div class="owl-item"> 
                                            <p class="mensagemBreve">Mais fotos em breve...</p>
                                        </div>';
                                    }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="col-1" style="padding: 0%;">
                    <button id="fotosNext" class="customOwlNext carouselControl" style="text-align: center; width: 100%; height: 100%; font-size: 1.5rem;"><i class="fas fa-angle-right"></i></button>
                </div>

            </div>
        </div>
    
        <p class="galerySubtitle" style="padding-left: 5%; color: #001253;">VÍDEOS</p>
        <hr class="galeryRule2">

        <div class="container-fluid" style="margin-top: 5%; margin-bottom: 5%;">

            <div style="text-align: right;">
                <button id="videoPrev" class="customOwlPrev carouselControl"><i class="fas fa-angle-left"></i></button>
                <button id="videoNext" class="customOwlNext carouselControl"><i class="fas fa-angle-right"></i></button>
            </div>

            <div class="owl-carousel owl-theme owl-loaded" id="owl-videos">
                <div class="owl-stage-outer">
                    <div class="owl-stage">

                        <?php 
                        
                            $counter=0;

                            while ($video = mysqli_fetch_array($consulta_videos)) {

                                $embed = "https://www.youtube.com/embed/".substr($video['link'], -11);
                                
                                echo '<div class="owl-item"> 
                                    <iframe width="100%" class="youtubeVideo" src="'.$embed.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p class="newTitle" style="margin-top: 5%; margin-bottom: 2%;">'.$video['titulo'].'</p>
                                    <p class="videoText">'.$video['texto'].'</p>
                                </div>';
                                
                                $counter++;
                            }

                            if($counter == 0){
                                echo '<div class="owl-item"> 
                                    <p class="mensagemBreve">Mais vídeos em breve...</p>
                                </div>';
                            }

                        ?>

                    </div>
                </div>
            </div>

        </div>

    </div>

</section>
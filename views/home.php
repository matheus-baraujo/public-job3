<section class="sessao">
    <img class="imgHome1" src="./resources/imgHome1.png" alt="">

    <div class="newsTitleDiv">
        <p class="newsTitle">JUSTIÇA DE<br> TRANSIÇÃO</p>
        <hr class="newsUnderline">
        <a class="newsLink" href="">Notícias ></a>
    </div>
    
    <div class="container-fluid" style="margin-top: 5%;">
        <div class="row">


            <?php 

                $counter = 0;

                while($noticia = mysqli_fetch_array($consulta_noticias) and $counter < 3){

                    echo '<div class="col-10 col-md-3 mx-auto newHome">
                        <p class="newTitle">'.ucfirst($noticia['titulo']).'</p>
                        <p class="newText">'.$noticia['texto'].'</p>
                        <a class="newLink" href="?page=artigo&id='.$noticia['id_noticias'].'">ver notícia completa <i class="fas fa-angle-right"></i></a>
                    </div>';

                    $counter++;
                }

                if($counter == 0){
                    echo '<p class="mensagemBreve">Mais notícias em breve...</p>';
                }

            
            ?>

        </div>
    </div>

</section>

<section class="sessao">

    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mx-auto col-md-5">
                <img src="./resources/imgHome2.png" width="100%" alt="">
            </div>

            <div class="col-10 mx-auto col-md-6">
                <p class="pillarsTitle">PILARES DA JUSTIÇA<br> DE TRANSIÇÃO</p>

                <hr class="pillarsRule">

                <p class="pillarsSubtitle">DIREITO À MEMÓRIA E À VERDADE</p>
                <p class="pillarsText">Refere-se à busca pela informação com o objetivo de
                    reconstruir a memória e a verdade de países que viveram
                    regimes autoritários.
                </p>

                <p class="pillarsSubtitle">REFORMAS INSTITUCIONAIS</p>
                <p class="pillarsText">Refere-se à retirada de pessoas que envolveram-se em
                    violações de direitos humanos durante a ditadura, no serviço
                    em nome do estado.
                </p>

                <p class="pillarsSubtitle">SISTEMA DE REPARAÇÕES</p>
                <p class="pillarsText">É dever do estado garantir o restabelecimento de empregos
                    que foram perdidos durante o período da ditadura, além
                    disso, será concedido aos mesmos indenizações e 
                    reconhecimento de ataques e perseguições. 
                </p>

                <p class="pillarsSubtitle">RESPONSABILIZAÇÃO INDIVIDUAL</p>
                <p class="pillarsText">Diante de um Estado Democrático, deve-se respeitar leis 
                    e garantidor de direitos humanos, sendo dever do Estado 
                    investigar qualquer violação e impedir que as mesmas
                    aconteçam. 
                </p>
            </div>
        </div>
    </div>

    
</section>
<section style="padding: 5% 15%;">

    <?php 

        $id = $_GET['id'];

        $query = 'SELECT * FROM noticias WHERE id_noticias = '.$id.'';
        
        echo '<a class="retorno" href="?page=noticias" > <i class="fas fa-angle-left"></i> Voltar</a>';

        if($artigo = mysqli_fetch_array(mysqli_query($conn, $query))){
            echo '<div class="capaNoticia" style="background-image: url('.$artigo['imagem_capa'].');">

                <p class="dataNoticia">'.$artigo['calendar'].'</p>
                <p class="tituloNoticia" style="">'.$artigo['titulo'].'</p>
            
            </div>';

            echo '<div class="textoNoticia">';

            $texto = explode(PHP_EOL ,$artigo['texto']);

            for ($contador=0; $contador < count($texto); $contador++) { 
                $paragrafo = $texto[$contador];

                echo '<p style="text-align: justify;">'.$paragrafo.'</p>';
            }

            echo '</div>';
        }


    ?>

</section>
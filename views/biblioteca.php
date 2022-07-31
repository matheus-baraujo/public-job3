<section class="sessao">
    <div class="container-fluid">
        <div class="row">

            <div class="col-8 ms-auto me-0" >
                <img src="./resources/imgBiblioteca1.png" width="100%" alt="">

                <div class="libraryTitleDiv">
                    <p class="newsTitle" style="text-align: right;">O QUE VOCÊ <br> PROCURA?</p>
                    <hr style="color: #001253; width: 150%; margin-left: -50%; height: 3px; opacity: 1; margin-top: 1%; margin-bottom: 1%;">
                    <p class="librarySubtitle" style="text-align: right;">Tenha acesso a diversos <br>documentos</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sessao">

    <form class="d-flex filterDiv">
        <button class="btn searchIcon" style="color: white;" onclick="myFilter()"><i class="fas fa-filter"></i></button>
        <input id="filter" class="form-control filterInput" type="text" placeholder="busca por filtro (ex.: Ditadura, ABNT...) " aria-label="Buscar" onkeyup="myFilter()">      
    </form>


    <?php 

      $revealing = 0;
      
      while ($categoria = mysqli_fetch_array($consulta_categorias)) {

        echo '<p class="categoryTitle">'.$categoria['categoria'].'</p>';

        echo '<div class="container-fluid my-3">
                <div class="row">
                    <div class="col-12">';

        $counter = 1;

        $query = 'SELECT * FROM subcategoria_biblioteca WHERE categoria = "'.$categoria['id_categorias'].'" ORDER BY id_subcategoria';
        $consulta_subcategorias = mysqli_query($conn, $query);

        while ($subcategoria = mysqli_fetch_array($consulta_subcategorias)) {
          
          echo '<button type="button" class="btn categorySubtitle" onclick="myreveal('.$revealing.')">'.$subcategoria['subcategoria'].' <i class="fas fa-angle-down"></i> </button> 
          <br>';

          echo '<div class="reveal" id="'.$revealing.'">';

          $query = 'SELECT * FROM arquivos_biblioteca WHERE subcategoria_arquivo = "'.$subcategoria['id_subcategoria'].'" AND abordagem_arquivo = "irregular"  ORDER BY id_arquivos';
          $consulta_arquivos = mysqli_query($conn, $query);

          $query = 'SELECT * FROM arquivos_biblioteca WHERE subcategoria_arquivo = "'.$subcategoria['id_subcategoria'].'" AND abordagem_arquivo = "tradicional"  ORDER BY id_arquivos';
          $consulta_arquivos2 = mysqli_query($conn, $query);

          if(mysqli_num_rows($consulta_arquivos) == 0 and mysqli_num_rows($consulta_arquivos2) == 0){
            echo '<p class="categorySubtitle" style="margin-top: 2%; margin-bottom: 2%; margin-left: 5%; font-weight: bold; color: #001253;">Não há arquivos cadastrados no momento...</p>';
          }

          while ($arquivo = mysqli_fetch_array($consulta_arquivos)) {
            echo '<a class="downloadBtn mb-1" href="'.$arquivo['local_arquivo'].'" download="'.$arquivo['nome_arquivo'].'"> <i class="fas fa-download"></i> '.$arquivo['nome_arquivo'].'</a>';
          }
          
          if(mysqli_num_rows($consulta_arquivos2) > 0){
            echo '<p class="categorySubtitle" style="margin-top: 2%; margin-bottom: 2%; margin-left: 5%; font-weight: bold; color: #001253;">ABORDAGENS TRADICIONAIS</p>';
          }

          while ($arquivo = mysqli_fetch_array($consulta_arquivos2)) {
            echo '<a class="downloadBtn mb-1" href="'.$arquivo['local_arquivo'].'" download="'.$arquivo['nome_arquivo'].'"> <i class="fas fa-download"></i> '.$arquivo['nome_arquivo'].'</a>';
          }

          echo '</div>';
          

          if($counter%3 == 0 and $counter != 0){
            echo '<hr class="categoryLine">';
          }

          $counter++;

          $revealing++;
        }

        echo '      </div>
                </div>
            </div>';
        
      }
    
    ?>

</section>




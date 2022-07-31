

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- Bootstrap and jpopper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Datatables -->
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<!-- Owl carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>

<script>
    $(document).ready(function(){

        $('#owl-news').owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })

        $('#owl-fotos').owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })

        $('#owl-videos').owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })

        
        var owlNew = $('#owl-news');
        $('#newsNext').click(function() {
            owlNew.trigger('next.owl.carousel');
        })
        $('#newsPrev').click(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owlNew.trigger('prev.owl.carousel', [300]);
        })



        var owlFotos = $('#owl-fotos');
        $('#fotosNext').click(function() {
            owlFotos.trigger('next.owl.carousel');
        })
        $('#fotosPrev').click(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owlFotos.trigger('prev.owl.carousel', [300]);
        })



        var owlVideo = $('#owl-videos');
        $('#videoNext').click(function() {
            owlVideo.trigger('next.owl.carousel');
        })

        $('#videoPrev').click(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owlVideo.trigger('prev.owl.carousel', [300]);
        })

    });
</script>

<script>
    function getFileData(myFile){
        var file = myFile.files[0];  
        var filename = file.name;

        if(filename != null || filename != ''){
            document.getElementById("teste").innerHTML = "("+filename+")";
        }
    }
</script>

<script>
    $(document).ready(function() {
      $('#table_noticias').DataTable();
      $('#table_memorias').DataTable();
      $('#table_videos').DataTable();
      $('#table_categorias').DataTable();
      $('#table_subcategorias').DataTable();
      $('#table_arquivos').DataTable();
    } );
</script>

<script>
    function myFilter(){
        var input, filter, txtValue, arquivos, categorias;
        input = document.getElementById('filter');
        filter = input.value.toUpperCase();

        categorias = document.getElementsByClassName('btn categorySubtitle');
        divs = document.getElementsByClassName('reveal');
        arquivos = document.getElementsByClassName('downloadBtn');

        for (i = 0; i < categorias.length; i++) {

            cat = categorias[i];

            div = divs[i];

            aux = div.textContent || div.innerText;
            if (aux.toUpperCase().indexOf(filter) > -1) {
                categorias[i].disabled = false;
            }else{
                categorias[i].disabled = true;
            }
            
        }

        for(j = 0; j < arquivos.length; j++){

            a = arquivos[j];

            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                arquivos[j].style.display = "";
            } else {
                arquivos[j].style.display = "none";
            }
        }


    }    

    $(document).ready(function(){
        const divs = $('.reveal');
        divs.hide();

    });

    function myreveal(n){
        let id = '#'+n;
        const divs = $(id);
        
        divs.slideToggle();

    }
</script>


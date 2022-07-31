<nav class="navbar navbar-expand-lg py-3">
  <div id="menu" class="container-fluid" style="padding-left: 5%; padding-right: 5%;">

    <a class="navbar-brand" href="?page=home"><img src="./resources/logo.png" alt=""></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item px-3">
          <a class="nav-link" aria-current="page" href="?page=home">HOME</a>
        </li>

        <li class="nav-item px-3">
          <a class="nav-link" href="?page=sobre">SOBRE</a>
        </li>

        <li class="nav-item px-3">
          <a class="nav-link" href="?page=noticias">NOTÍCIAS</a>
        </li>

        <li class="nav-item px-3">
          <a class="nav-link" href="?page=biblioteca">BIBLIOTECA</a>
        </li>

        <li class="nav-item px-3">
          <a class="nav-link" href="?page=galeria">GALERIA</a>
        </li>

        <li class="nav-item px-3">
          <a class="nav-link" href="?page=colabore">COLABORE</a>
        </li>

      </ul>
      
      <form class="d-flex searchDiv" action="search.php" method="post">
        <button class="btn searchIcon" type="submit"><i class="fas fa-search"></i></button>
        <input class="form-control searchInput" name="busca" type="search" placeholder="Buscar" aria-label="Buscar">      
      </form>

    </div>
  </div>
</nav>
<section id="loggedAdmin" class="sessao" style="margin-bottom: 10%;">

    <a href="logout.php" class="inputSend" style="float: right; text-decoration: none;">logout</a>

    <p class="loginTitle" style="text-align: center; margin-top: 15%; margin-bottom: 10%;">Administração</p>


    <p class="loginSubtitle">Notícias</p>

    <div class="tableAdmin">

        <table id="table_noticias" class="table table-striped table-hover" style="text-align: center; width: 100%;">
            <thead>
                <tr>
                    <th>Id</th> <th>Título</th> <th>Editar</th> <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($item = mysqli_fetch_array($consulta_noticias)) {
                        echo'<tr>
                            <td>'.$item["id_noticias"].'</td>
                            <td>'.$item["titulo"].'</td>
                            <td><a href="?page=formAdmin&type=noticia&order=edit&id='.$item["id_noticias"].'" class="btn-edit-delete"><i class="fas fa-pen"></i></a></td>
                            <td><a href="delete.php?type=noticia&id='.$item["id_noticias"].'" class="btn-edit-delete"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                    }
                ?>
            </tbody>
            
        </table>

        <a href="?page=formAdmin&type=noticia&order=add" class="inputSend" style="float: right; font-weight: bold; text-decoration: none; margin-top: 3%;" >Adicionar</a>
        
    </div>

    <p class="loginSubtitle" style="margin-top: 15%;">Memórias - Galeria</p>

    <div class="tableAdmin">

        <table id="table_memorias" class="table table-striped table-hover" style="text-align: center; width: 100%;">
            <thead>
                <tr>
                    <th>Id</th> <th>Título</th> <th>Editar</th> <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($item = mysqli_fetch_array($consulta_galeria)) {
                        echo'<tr>
                            <td>'.$item["id_imagem_galeria"].'</td>
                            <td>'.$item["titulo"].'</td>
                            <td><a href="?page=formAdmin&type=galeria&order=edit&id='.$item["id_imagem_galeria"].'" class="btn-edit-delete"><i class="fas fa-pen"></i></a></td>
                            <td><a href="delete.php?type=galeria&id='.$item["id_imagem_galeria"].'" class="btn-edit-delete"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                    }
                ?>
            </tbody>
            
        </table>

        <a href="?page=formAdmin&type=galeria&order=add" class="inputSend" style="float: right; font-weight: bold; text-decoration: none; margin-top: 3%;" >Adicionar</a>
        
    </div>

    <p class="loginSubtitle" style="margin-top: 15%;">Vídeos - Galeria</p>

    <div class="tableAdmin">

        <table id="table_videos" class="table table-striped table-hover" style="text-align: center; width: 100%;">
            <thead>
                <tr>
                    <th>Id</th> <th>Título</th> <th>Editar</th> <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($item = mysqli_fetch_array($consulta_videos)) {
                        echo'<tr>
                            <td>'.$item["id_videos_galeria"].'</td>
                            <td>'.$item["titulo"].'</td>
                            <td><a href="?page=formAdmin&type=video&order=edit&id='.$item["id_videos_galeria"].'" class="btn-edit-delete"><i class="fas fa-pen"></i></a></td>
                            <td><a href="delete.php?type=video&id='.$item["id_videos_galeria"].'" class="btn-edit-delete"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                    }
                ?>
            </tbody>
            
        </table>

        <a href="?page=formAdmin&type=video&order=add" class="inputSend" style="float: right; font-weight: bold; text-decoration: none; margin-top: 3%;" >Adicionar</a>
        
    </div>

    <p class="loginSubtitle" style="margin-top: 15%;">Categorias - Biblioteca</p>

    <div class="tableAdmin">

        <table id="table_categorias" class="table table-striped table-hover" style="text-align: center; width: 100%;">
            <thead>
                <tr>
                    <th>Id</th> <th>Categoria</th> <th>Editar</th> <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($item = mysqli_fetch_array($consulta_categorias)) {
                        echo'<tr>
                            <td>'.$item["id_categorias"].'</td>
                            <td>'.$item["categoria"].'</td>
                            <td><a href="?page=formAdmin&type=categoria&order=edit&id='.$item["id_categorias"].'" class="btn-edit-delete"><i class="fas fa-pen"></i></a></td>
                            <td><a href="delete.php?type=categoria&id='.$item["id_categorias"].'" class="btn-edit-delete"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                    }
                ?>
            </tbody>
            
        </table>

        <a href="?page=formAdmin&type=categoria&order=add" class="inputSend" style="float: right; font-weight: bold; text-decoration: none; margin-top: 3%;" >Adicionar</a>
        
    </div>

    <p class="loginSubtitle" style="margin-top: 15%;">Subcategorias - Biblioteca</p>

    <div class="tableAdmin">

        <table id="table_subcategorias" class="table table-striped table-hover" style="text-align: center; width: 100%;">
            <thead>
                <tr>
                    <th>Id</th> <th>Subcategoria</th> <th>Categoria</th> <th>Editar</th> <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($item = mysqli_fetch_array($consulta_subcategorias)) {

                        $local_query2 = "SELECT * FROM categorias_biblioteca WHERE id_categorias = ".$item['categoria'];  
                        $result = mysqli_fetch_array(mysqli_query($conn, $local_query2));

                        echo'<tr>
                            <td>'.$item["id_subcategoria"].'</td>
                            <td>'.$item["subcategoria"].'</td>
                            <td>'.$result["categoria"].'</td>
                            <td><a href="?page=formAdmin&type=subcategoria&order=edit&id='.$item["id_subcategoria"].'" class="btn-edit-delete"><i class="fas fa-pen"></i></a></td>
                            <td><a href="delete.php?type=subcategoria&id='.$item["id_subcategoria"].'" class="btn-edit-delete"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                    }
                ?>
            </tbody>
            
        </table>

        <a href="?page=formAdmin&type=subcategoria&order=add" class="inputSend" style="float: right; font-weight: bold; text-decoration: none; margin-top: 3%;" >Adicionar</a>
        
    </div>

    <p class="loginSubtitle" style="margin-top: 15%;">Arquivos - Biblioteca</p>

    <div class="tableAdmin">

        <table id="table_arquivos" class="table table-striped table-hover" style="text-align: center; width: 100%;">
            <thead>
                <tr>
                    <th>Id</th> <th>Arquivo</th> <th>Subcategoria</th> <th>Abordagem</th> <th>Editar</th> <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($item = mysqli_fetch_array($consulta_arquivos)) {

                        $local_query = 'SELECT * FROM subcategoria_biblioteca WHERE id_subcategoria = '.$item['subcategoria_arquivo'].'';
                        $result = mysqli_fetch_array(mysqli_query($conn, $local_query));

                        echo'<tr>
                            <td>'.$item["id_arquivos"].'</td>
                            <td>'.$item["nome_arquivo"].'</td>
                            <td>'.$result["subcategoria"].'</td>
                            <td>'.$item["abordagem_arquivo"].'</td>
                            <td><a href="?page=formAdmin&type=arquivo&order=edit&id='.$item["id_arquivos"].'" class="btn-edit-delete"><i class="fas fa-pen"></i></a></td>
                            <td><a href="delete.php?type=arquivo&id='.$item["id_arquivos"].'" class="btn-edit-delete"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                    }
                ?>
            </tbody>
            
        </table>

        <a href="?page=formAdmin&type=arquivo&order=add" class="inputSend" style="float: right; font-weight: bold; text-decoration: none; margin-top: 3%;" >Adicionar</a>
        
    </div>
    
</section>
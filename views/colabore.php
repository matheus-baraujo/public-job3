<section class="sessao">
    
    <p class="colabTitle">COLABORE</p>
    <hr class="colabRule">

    <p class="colabSubtitle">Compartilhe sua pesquisa com <br>
        outros estudantes, professores e <br> 
        profissionais da área e colabore <br> 
        com a Justiça de Transição.
    </p>


    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-7 px-0">

                <form  action="mail.php" method="POST" enctype="multipart/form-data">

                    <input class="colabInput mb-3" id="email" type="text" name="email" placeholder="email" required />

                    <input class="colabInput mb-3" id="telefone" type="text" name="telefone" placeholder="telefone" required />

                    <textarea class="colabInput mb-3" name="mensagem" id="mensagem" rows="10" placeholder="mensagem"></textarea>
                    
                    <label id="labelArquivo" for="arquivo"> 
                        <i class="fas fa-upload"></i> Anexe sua pesquisa
                    </label><br>
                    <input class="form-control mb-3" type="file" name="arquivo" id="arquivo" onchange="getFileData(this);">
                    
                    <div class="nomeArquivo ps-4"><p id="teste"></p></div>
                
                    <input class="inputSubmit my-3" type="submit" value="ENVIAR">

                </form>

            </div>
        </div>
    </div>

</section>
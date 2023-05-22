<?php include("./blades/header.php") ?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="mb-4 text-center">Inserir Notícia</h1>
                <form action="../controllers/nova_noticia.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título da notícia">
                    </div>
                    <div class="form-group mt-3">
                        <label for="texto">Texto</label>
                        <textarea class="form-control" id="texto" name="texto" rows="5" placeholder="Digite o texto da notícia"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="imagens">Imagens</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imagens" name="imagens[]" multiple>
                            <label class="custom-file-label" for="imagens">Selecione uma ou mais imagens</label>
                        </div>
                    </div>
                    <div class="form-group mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Inserir Notícia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<?php include("./blades/footer.php") ?>
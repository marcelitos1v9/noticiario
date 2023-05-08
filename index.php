<?php 
include("./models/conexao.php");
include("./views/blades/header.php");
?>

<body>
     <?php
        $query = mysqli_query($conexao,"SELECT * FROM blog INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo ORDER BY blog_codigo DESC LIMIT 1");
        $exibe = mysqli_fetch_array($query);
        ?>
        <nav class="navbar fixed-top navbar-light navbar-expand-lg bg-light text-light mb-5 d-flex">
        <div class="container d-flex justify-content-center">
            <a class="nav-link" href="./views/login.php">Fazer login</a>
            <a class="nav-link" href="./views/cadastro.php">Cadastrar</a>
            <a class="nav-link" href="./controllers/logout.php">Sair</a>
        </div>
        </nav>
        <div class="row mb-3 mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="imgs/<?php echo $exibe[5]?>" class="card-img main-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="m-auto"> 
                                <h5 class="card-title"><?php echo $exibe[7]?></h5>
                                <p class="card-text "><?php echo substr($exibe[8], 0, 100)."..."?></p>
                                <a href="./views/page.php<?php echo '?ida='.$exibe[0] ?>" class="btn btn-primary">Continuar lendo</a>                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $query = mysqli_query($conexao,"SELECT * FROM blog INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo WHERE blog_codigo <> $exibe[0] ORDER BY blog_codigo DESC LIMIT 3");
        ?>
        <div class="container">
        <div id="noticias-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="./views/page.php<?php echo '?ida='.$exibe[0] ?>">
                    <img src="imgs/<?php echo $exibe[5]?>" class="d-block w-100 h-100 carousel-img img-fluid" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $exibe[7]?></h5>
                            <p><?php echo substr($exibe[8], 0, 100)."..."?></p>
                        </div>
                    </a>
                </div>
                <?php
                $contador = 0;
                while($exibe= mysqli_fetch_array($query)){ 
                    ?>
                <div class="carousel-item">
                    <a href="./views/page.php<?php   echo '?ida='.$exibe[0] ?>">
                    <img src="imgs/<?php echo $exibe[5]?>" class="d-block w-100 h-75  carousel-img img-fluid" alt="...">
<div class="carousel-caption d-none d-md-block">
<h5><?php echo $exibe[7]?></h5>
<p><?php echo substr($exibe[8], 0, 100)."..."?></p>
</div>
</a>
</div>
<?php
             $contador++;
             }
             ?>
</div>
<a class="carousel-control-prev" href="#noticias-carousel" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Anterior</span>
</a>
<a class="carousel-control-next" href="#noticias-carousel" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Próximo</span>
</a>
</div>
</div>
</div>
</main>
<footer class="bg-dark text-white py-4 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Contato</h3>
                <ul class="list-unstyled">
                    <li>(00) 1234-5678</li>
                    <li>contato@meusite.com.br</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Redes sociais</h3>
                <ul class="list-unstyled">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Twitter</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Localização</h3>
                <ul class="list-unstyled">
                    <li>Rua tal, nº 123</li>
                    <li>Cidade - Estado</li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php include("./views/blades/footer.php")?>
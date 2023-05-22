<?php
include("./models/conexao.php");
include("./views/blades/header.php");
include("./controllers/funcoes.php");
session_start();
?>

<body class="bg-dark">
    <?php
    echo exibirMenu($conexao);
    $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo ORDER BY blog_codigo DESC LIMIT 1");
    $exibe = mysqli_fetch_array($query);
    ?>
    <div class="row mb-3 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="imgs/<?php echo $exibe[5] ?>" class="card-img main-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="m-auto">
                                <h5 class="card-title"><?php echo $exibe[7] ?></h5>
                                <p class="card-text"><?php echo substr($exibe[8], 0, 100) . "..." ?></p>
                                <a href="./views/page.php<?php echo '?ida=' . $exibe[0] ?>" class="btn btn-primary">Continuar lendo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo WHERE blog_codigo <> $exibe[0] ORDER BY blog_codigo DESC");
    ?>
    <div class="container">
        <div id="noticias-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $contador = 0;
                while ($exibe = mysqli_fetch_array($query)) {
                    if ($contador == 0) {
                        echo '<div class="carousel-item active">';
                    } else {
                        echo '<div class="carousel-item">';
                    }
                ?>
                    <a href="./views/page.php<?php echo '?ida=' . $exibe[0] ?>">
                        <div class="d-flex justify-content-center">
                            <img src="imgs/<?php echo $exibe[5] ?>" class="d-block carousel-img img-fluid" alt="...">
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $exibe[7] ?></h5>
                            <p><?php echo substr($exibe[8], 0, 100) . "..." ?></p>
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

    <?php include("./views/blades/footer.php") ?>
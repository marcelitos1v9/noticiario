<?php
include("../models/conexao.php");
include("./blades/header.php");
?>

<body>

    <div class="container my-5">

        <?php
        $varIda = $_GET["ida"];
        $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo INNER JOIN bloginfo ON blog_bloginfo_codigo  = bloginfo_codigo INNER JOIN usuarios ON usuarios_codigo = blog_usuarios_codigo WHERE blog_codigo = $varIda ");
        if (!$query) {
            die("Erro na consulta: " . mysqli_error($conexao));
        }
        $primeiraImagem = true;
        while ($exibe = mysqli_fetch_array($query)) {
        ?>

        <div class="row mb-4">
            <div class="col-12">
                <h2><?php echo $exibe['bloginfo_titulo'] ?></h2>
            </div>
            <div class="col-md-6">
                <?php if ($primeiraImagem) { ?>
                    <img src="../imgs/<?php echo $exibe['blogimgs_nome'] ?>" class="img-fluid">
                    <?php $primeiraImagem = false; ?>
                <?php } else { ?>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../imgs/<?php echo $exibe['blogimgs_nome'] ?>" class="img-fluid">
                            </div>
                            <?php while ($exibe = mysqli_fetch_array($query)) { ?>
                                <div class="carousel-item">
                                    <img src="../imgs/<?php echo $exibe['blogimgs_nome'] ?>" class="img-fluid">
                                </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <?php break; ?>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <p><?php echo $exibe['bloginfo_corpo']; ?></p>
            </div>
        </div>

        <?php } ?>

        <hr>

        <div class="text-center">
            <a href="../" class="btn btn-secondary">Voltar</a>
        </div>

    </div>
<?php include("./blades/footer.php");?>
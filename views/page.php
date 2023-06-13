<?php
include("../models/conexao.php");
include("./blades/header.php");
?>
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  margin-top: 20px;
}

h2 {
  color: #333;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.img-fluid {
  width: 100%;
  height: auto;
  border-radius: 5px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  width: 20px;
  height: 20px;
  background-color: #000;
  background-size: cover;
  border-radius: 50%;
}

.carousel-control-prev,
.carousel-control-next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: auto;
  height: auto;
  padding: 0;
  background: transparent;
  border: none;
}

.carousel-inner {
  position: relative;
}

.carousel-item {
  display: none;
}

.carousel-item.active {
  display: block;
}

.btn-secondary {
  background-color: #777;
  color: #fff;
  padding: 8px 16px;
  border-radius: 4px;
  text-decoration: none;
}

.btn-secondary:hover {
  background-color: #555;
}

</style>
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
    <?php include("./blades/footer.php"); ?>
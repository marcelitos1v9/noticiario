<?php
include("./models/conexao.php");
include("./views/blades/header.php");
include("./controllers/funcoes.php");
session_start();
?>

<style>
body {
    overflow-x: hidden;
    font-family: Arial, sans-serif;

}

.card {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-img {
    width: 100%;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
}

.card-text {
    margin-bottom: 20px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.carousel-caption {
    background-color: rgba(0, 0, 0, 0.6);
    color: #fff;
    padding: 10px;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
}

.carousel-caption h5 {
    font-size: 18px;
    margin-bottom: 5px;
}

.carousel-caption p {
    font-size: 14px;
    margin-bottom: 0;
}
</style>

<body class="fundo text-white por">
    <?php
    echo exibirMenu($conexao);
    $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo ORDER BY blog_codigo DESC LIMIT 1");
    $exibe = mysqli_fetch_array($query);
    ?>
    <div class="text-center mt-5">
        <h1 class="pt-4">M.A.P.A</h1>
    </div>
    <div class="container">
        <div class="row mb-3 mt-5">
            <div class="col-md-12">
                <div class="">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="imgs/<?php echo $exibe[5] ?>" class="card-img main-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="m-auto">
                                <h5 class="card-title"><?php echo $exibe[7] ?></h5>
                                <p class="card-text"><?php echo substr($exibe[8], 0, 100) . "..." ?></p>
                                <a href="./views/page.php<?php echo '?ida=' . $exibe[0] ?>"
                                    class="btn btn-outline-light">Continuar lendo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
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
    <hr class="mt-3">
    </div>
    <div class="container mt-4">
        <h2 class="text-center">Sobre nós</h2>
        <p>A Tani é uma empresa dedicada a promover o turismo no Vale do Ribeira. Nossa missão é proporcionar
            experiências inesquecíveis para os visitantes, mostrando a beleza e riqueza cultural dessa região única.</p>
        <p>Com anos de experiência no setor, nossa equipe é formada por profissionais qualificados e apaixonados por
            turismo. Trabalhamos em parceria com as comunidades locais, buscando o desenvolvimento sustentável e o
            respeito ao meio ambiente.</p>
        <p>Oferecemos uma variedade de pacotes turísticos que incluem visitas a cavernas, praias paradisíacas, montanhas
            deslumbrantes, locais religiosos e trilhas emocionantes. Nossos pacotes são cuidadosamente planejados para
            proporcionar uma experiência autêntica e enriquecedora.</p>
        <p>Além disso, estamos comprometidos em oferecer um atendimento excepcional aos nossos clientes. Nossa equipe
            está sempre disponível para ajudar a planejar a viagem dos sonhos, personalizando os pacotes de acordo com
            as preferências individuais.</p>
        <p>Se você está em busca de aventura, cultura e momentos memoráveis, venha conhecer o Vale do Ribeira com a
            Tani. Estamos ansiosos para recebê-lo e mostrar o que essa região incrível tem a oferecer.</p>

    </div>
    <?php include("./views/blades/footer.php") ?>
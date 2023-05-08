<?php include("../models/conexao.php"); 
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
        while ($exibe = mysqli_fetch_array($query)) {
        ?>

        <div class="row mb-4">
            <div class="col-12">
                <h2><?php echo $exibe[7] ?></h2>
            </div>
            <div class="col-md-6">
                <img src="../imgs/<?php echo $exibe[5] ?>" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p><?php echo $exibe[8]; ?></p>
            </div>
        </div>

        <?php } ?>

        <hr>

        <div class="text-center">
            <a href="../" class="btn btn-secondary">Voltar</a>
        </div>

    </div>

</body>
</html>
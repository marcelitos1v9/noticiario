<?php include("../models/conexao.php"); 
include("./blades/header.php");
?>

<body>
        <?php
        $varIda = $_GET["ida"];
        $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo INNER JOIN bloginfo ON blog_bloginfo_codigo  = bloginfo_codigo INNER JOIN usuarios ON usuarios_codigo = blog_usuarios_codigo WHERE blog_codigo = $varIda ");
        if (!$query) {
            die("Erro na consulta: " . mysqli_error($conexao));
        }
        while ($exibe = mysqli_fetch_array($query)) {
        ?>
        <h2><?php echo $exibe[7] ?></h2>
        <img src="../imgs/<?php echo $exibe[5] ?>" width="300px"></td>
        <?php echo $exibe[8]; ?>         
    <?php } ?>
    <hr>
    <a href="../">voltar</a>
</body>

</html>
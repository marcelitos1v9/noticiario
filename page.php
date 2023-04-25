<?php include("./models/conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>  
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
     <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <script src='main.js'></script>
</head>

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
        <img src="imgs/<?php echo $exibe[5] ?>" width="300px"></td>
        <?php echo $exibe[8]; ?>        
                
    <?php } ?>
    <hr>
    <a href="index.php">voltar</a>
</body>

</html>
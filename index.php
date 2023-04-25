<?php include("./models/conexao.php")?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Blog</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php
    $query = mysqli_query($conexao,"SELECT * FROM blog INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo INNER JOIN bloginfo
    ON blog_bloginfo_codigo = bloginfo_codigo ORDER BY blog_codigo DESC LIMIT 4");
    $contador = 0;
    while($exibe= mysqli_fetch_array($query)){ 
        if ($contador == 0) {
            ?>
            <table border="1" height="250px">
                <tr>
                    <td width="200px"><img src="imgs/<?php echo $exibe[5]?>" width="200px"></td>
                    <td width="400px"><?php echo $exibe[7]?>
                    <hr>
                    <a href="page.php<?php echo '?ida='.$exibe[0] ?>"><?php echo $exibe[8]?></a></td>
                </tr>
            </table>
            <?php
        } else {
            ?>
            <a href="page.php<?php echo '?ida='.$exibe[0] ?>"><img src="imgs/<?php echo $exibe[5]?>" width="200px"></a>
            <?php
        }
        $contador++;
    }?>
</body>
</html>

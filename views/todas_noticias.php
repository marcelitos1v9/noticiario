<?php
include("../models/conexao.php");
include("./blades/header.php");

// Consulta para obter todas as notícias
$query = "SELECT * FROM blog INNER JOIN blogimgs ON blog.blog_blogimgs_codigo = blogimgs.blogimgs_codigo INNER JOIN bloginfo ON blog.blog_bloginfo_codigo = bloginfo.bloginfo_codigo";
$result = mysqli_query($conexao, $query);
?>
<body class="fundo por text-light">
    

<div class="container mt-5 text-light">
    <a href="../" class="btn btn-outline-light">Voltar</a>
    <h1>Notícias</h1>
    <table class="table mt-4 text-light">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Título</th>
                <th>Texto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <img src="../imgs/<?php echo $row['blogimgs_nome']; ?>" alt="Imagem da Notícia" width="100">
                    </td>
                    <td><?php echo $row['bloginfo_titulo']; ?></td>
                    <td><?php echo $row['bloginfo_corpo']; ?></td>
                    <td class="">
                        <a href="editar_noticia.php?id=<?php echo $row['blog_codigo']; ?>" class="btn btn-warning btn-block">Editar</a>
                        <a href="../controllers/excluir_noticia.php?id=<?php echo $row['blog_codigo']; ?>" class="btn btn-danger btn-block">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
<?php include("./blades/footer.php"); ?>

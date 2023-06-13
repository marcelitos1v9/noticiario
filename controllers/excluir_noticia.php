<?php
include("../models/conexao.php");
include("../views/blades/header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM bloginfo WHERE bloginfo_codigo = $id";
    $result = mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $imagem_id = $row['blog_blogimgs_codigo'];
        $queryImagem = "SELECT * FROM blogimgs WHERE blogimgs_codigo = $imagem_id";
        $resultImagem = mysqli_query($conexao, $queryImagem);

        if (mysqli_num_rows($resultImagem) == 1) {
            $imagemRow = mysqli_fetch_assoc($resultImagem);
            $imagem = $imagemRow['blogimgs_nome'];
            unlink("../imgs/$imagem");
        }

        $queryExcluir = "DELETE FROM bloginfo WHERE bloginfo_codigo = $id";
        mysqli_query($conexao, $queryExcluir);

        echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-success text-center' role='alert'>Notícia foi excluída com sucesso.</div></div></div></div>";
    } else {
        echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-danger text-center' role='alert'>Notícia não encontrada.</div></div></div></div>";
    }
} else {
    echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-danger text-center' role='alert'>ID inválido.</div></div></div></div>";
}

header("refresh:3;url=../views/todas_noticias.php");
include("../views/blades/footer.php");
?>

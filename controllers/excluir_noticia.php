<?php
include("../models/conexao.php");
include("../views/blades/header.php");

// Verifica se foi enviado um ID válido via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Realiza a consulta para obter as informações da notícia
    $query = "SELECT * FROM bloginfo WHERE bloginfo_codigo = $id";
    $result = mysqli_query($conexao, $query);

    // Verifica se a notícia existe
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Remove a imagem associada à notícia, se existir
        if (!empty($row['bloginfo_imagem'])) {
            $imagem = $row['bloginfo_imagem'];
            unlink("../imgs/$imagem");
        }

        // Realiza a ação de excluir a notícia
        $queryExcluir = "DELETE FROM bloginfo WHERE bloginfo_codigo = $id";
        mysqli_query($conexao, $queryExcluir);

        // Exibe uma mensagem de sucesso
        echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-success text-center' role='alert'>Notícia '" . $row['bloginfo_titulo'] . "' foi excluída com sucesso.</div></div></div></div>";
    } else {
        // Caso a notícia não seja encontrada, exibe uma mensagem de erro
        echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-danger text-center' role='alert'>Notícia não encontrada.</div></div></div></div>";
    }
} else {
    // Caso não seja enviado um ID válido via GET, exibe uma mensagem de erro
    echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-danger text-center' role='alert'>ID inválido.</div></div></div></div>";
}

// Redireciona de volta para a página de notícias após 3 segundos
header("refresh:3;url=../views/todas_noticias.php");
include("../views/blades/footer.php");
?>
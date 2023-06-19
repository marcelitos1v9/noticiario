<?php
include("../models/conexao.php");
include("../views/blades/header.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE usuarios_codigo = $id";
    $result = mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Excluir os comentários do usuário
        $queryExcluirComentarios = "DELETE FROM comentarios WHERE usuario_id = $id";
        mysqli_query($conexao, $queryExcluirComentarios);

        // Excluir o usuário
        $queryExcluirUsuario = "DELETE FROM usuarios WHERE usuarios_codigo = $id";
        mysqli_query($conexao, $queryExcluirUsuario);

        echo "<div class='alert alert-warning text-center' role='alert'>Usuário '" . $row['usuarios_nome'] . "' foi excluído com sucesso, juntamente com seus comentários.</div>";
    } else {
        echo "<div class='alert alert-danger text-center' role='alert'>Usuário não encontrado.</div>";
    }
} else {
    echo "<div class='alert alert-danger text-center' role='alert'>ID inválido.</div>";
}

header("refresh:3;url=../views/controle_usuarios.php");

include("../views/blades/footer.php");
?>
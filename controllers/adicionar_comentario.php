<?php
session_start();
include("../models/conexao.php");
include("../views/blades/header.php");

if (!isset($_SESSION['user_id'])) {
    ?>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="alert alert-warning" role="alert">
            É necessário fazer o login para comentar. Você será redirecionado para a página de login em alguns segundos.
        </div>
    </div>
    <?php
    header("refresh:3,url=../views/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $blog_codigo = $_POST["blog_codigo"];
    $comentario = $_POST["comentario"];
    $id_usuario = $_SESSION["user_id"];

    // Insere o comentário no banco de dados
    $query = "INSERT INTO comentarios (blog_codigo, comentario, usuario_id) VALUES ('$blog_codigo', '$comentario', '$id_usuario')";
    $resultado = mysqli_query($conexao, $query);

    if ($resultado) {
        // Comentário adicionado com sucesso, redireciona de volta para a página do blog
        header("Location: ../views/page.php?ida=$blog_codigo");
        exit();
    } else {
        echo "Erro ao adicionar o comentário: " . mysqli_error($conexao);
    }
}
include("../views/blades/footer.php");
?>
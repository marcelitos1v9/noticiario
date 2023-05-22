<?php
session_start();
include("../models/conexao.php");

if (isset($_FILES['imagens'])) {
    $imagens = $_FILES['imagens'];
    $numImagens = count($imagens['name']);

    for ($i = 0; $i < $numImagens; $i++) {
        $extensao = strtolower(pathinfo($imagens['name'][$i], PATHINFO_EXTENSION));
        $novoNome = uniqid() . '.' . $extensao;
        $diretorio = '../imgs/';
        move_uploaded_file($imagens['tmp_name'][$i], $diretorio . $novoNome);

        $queryImagem = "INSERT INTO blogimgs (blogimgs_nome) VALUES ('$novoNome')";
        mysqli_query($conexao, $queryImagem);

        $imagemId = mysqli_insert_id($conexao);

        $imagensIds[] = $imagemId;
    }
}

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$id_user = $_SESSION['user_id'];

$queryInfo = "INSERT INTO bloginfo (bloginfo_titulo, bloginfo_corpo, bloginfo_data) VALUES ('$titulo', '$texto', NOW())";
mysqli_query($conexao, $queryInfo);

$bloginfoCodigo = mysqli_insert_id($conexao);

foreach ($imagensIds as $imagemId) {
    $queryRelacionamento = "INSERT INTO blog (blog_blogimgs_codigo, blog_bloginfo_codigo, blog_usuarios_codigo) VALUES ('$imagemId', '$bloginfoCodigo', '$id_user')";
    mysqli_query($conexao, $queryRelacionamento);
}

header("Location: ../");
?>
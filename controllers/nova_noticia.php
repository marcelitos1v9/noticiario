<?php
session_start();
include("../models/conexao.php");

if (isset($_FILES['imagem'])) {
    $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    $novoNome = uniqid() . '.' . $extensao;
    $diretorio = '../imgs/';
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novoNome);
}

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$id_user= $_SESSION['user_id'];

$sql1 = "INSERT INTO bloginfo (bloginfo_titulo, bloginfo_corpo, bloginfo_data) VALUES ('$titulo', '$texto', NOW());";
mysqli_query($conexao, $sql1);

$bloginfo_codigo = mysqli_insert_id($conexao);

$sql2 = "INSERT INTO blogimgs (blogimgs_nome) VALUES ('$novoNome')";
mysqli_query($conexao, $sql2);

$blogimg_codigo = mysqli_insert_id($conexao);

$sql3 = "INSERT INTO blog (blog_blogimgs_codigo, blog_bloginfo_codigo,blog_usuarios_codigo) VALUES ('$blogimg_codigo', '$bloginfo_codigo','$id_user')";
mysqli_query($conexao, $sql3);

header("Location: ../");
?>
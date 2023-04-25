<?php
include("../models/conexao.php");

if (isset($_FILES['imagem'])) {
    $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    $novoNome = uniqid() . '.' . $extensao;
    $diretorio = '../imgs/';
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novoNome);
}

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];

$sql1 = "INSERT INTO bloginfo (bloginfo_titulo, bloginfo_corpo, bloginfo_data) VALUES ('$titulo', '$texto', NOW());";
mysqli_query($conexao, $sql1);


$bloginfo_codigo = mysqli_insert_id($conexao);

$sql2 = "INSERT INTO blogimgs (blogimgs_nome, blog_bloginfo_codigo) VALUES ('$novoNome', '$bloginfo_codigo')";
mysqli_query($conexao, $sql2);



header("Location: ../");
?>

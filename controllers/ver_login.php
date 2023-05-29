<?php

session_start();

include("../models/conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    if (empty($email) || empty($senha)) {
        header("Location: ../views/login.php?erro=Campos_obrigatórios");
        exit();
    }
    
    if (mysqli_connect_errno()) {
        header("Location: ../views/login.php?erro=Erro_banco");
        exit();
    }
    
    $query = mysqli_prepare($conexao, "SELECT usuarios_codigo, usuarios_senha FROM usuarios WHERE usuarios_email = ?");
    mysqli_stmt_bind_param($query, "s", $email);
    mysqli_stmt_execute($query);
    $resultado = mysqli_stmt_get_result($query);
    $usuario = mysqli_fetch_assoc($resultado);
    
        if ($usuario && password_verify($senha, $usuario["usuarios_senha"])) {
        $_SESSION["user_id"] = $usuario["usuarios_codigo"];
        
        header("Location: ../index.php?sucesso");
        exit();
    } else {
        header("Location: login.php?erro=Email ou senha incorretos");
        exit();
    }
}
?>
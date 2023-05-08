<?php
include("../models/conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $confirmaSenha = mysqli_real_escape_string($conexao, $_POST['confirmaSenha']);

    if ($senha === $confirmaSenha) {

        $query = "SELECT usuarios_email FROM usuarios WHERE usuarios_email = '$email'";
        $resultado = mysqli_query($conexao, $query);

        if (mysqli_num_rows($resultado) === 0) {

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $query = "INSERT INTO usuarios (usuarios_nome, usuarios_email, usuarios_senha) VALUES ('$nome', '$email', '$senhaHash')";
            $resultado = mysqli_query($conexao, $query);

            if (!$resultado) {
                die("Erro ao inserir dados: " . mysqli_error($conexao));
            } else {
                session_start();
                $_SESSION['user_id'] = mysqli_insert_id($conexao);
                header("location: ../");
            }

        } else {
            echo "Este email já está em uso";
        }

    } else {
        echo "As senhas não coincidem";
    }
}
?>
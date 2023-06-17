<?php
session_start();
include("../models/conexao.php");
include("./blades/header.php");


// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $usuario_codigo = $_SESSION['user_id'];
    // Validação básica dos dados (adapte conforme suas necessidades)
    if (empty($nome) || empty($email)) {
        echo '<div class="message error">Por favor, preencha todos os campos.</div>';
    } else {
        $query = mysqli_query($conexao, "UPDATE usuarios SET usuarios_nome = '$nome', usuarios_email = '$email' WHERE usuarios_codigo = $usuario_codigo");
    }
}

$query_usuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE usuarios_codigo = $usuario_codigo");
$dados_usuario = mysqli_fetch_array($query_usuario);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Configurações</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .mt-3 {
            margin-top: 20px;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .message {
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            border-radius: 4px;
        }

        .message.success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }

        .message.error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Configurações</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($nome) && !empty($email)) {
                echo '<div class="message success">Informações atualizadas com sucesso!</div>';
            } else {
                echo '<div class="message error">Por favor, preencha todos os campos.</div>';
            }
        }

        ?>
        <form action="configuracoes.php" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dados_usuario['usuarios_nome']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $dados_usuario['usuarios_email']; ?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <div class=" mt-3">
                </div>
                <a href="../index.php" class="btn btn-primary">Voltar</a>
            </div>
        </form>

    </div>
    <?php include("./blades/footer.php"); ?>
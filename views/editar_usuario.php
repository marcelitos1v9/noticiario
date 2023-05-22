<?php
include("../models/conexao.php");
include("./blades/header.php");

// Verifica se foi enviado um ID válido via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Realiza a consulta para obter as informações do usuário
    $query = "SELECT * FROM usuarios WHERE usuarios_codigo = $id";
    $result = mysqli_query($conexao, $query);

    // Verifica se o usuário existe
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifica se o formulário foi submetido
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtém o novo tipo de conta selecionado
            $tipoConta = $_POST['tipo_conta'];

            // Atualiza o tipo de conta do usuário no banco de dados
            $queryAtualizar = "UPDATE usuarios SET usuarios_status = '$tipoConta' WHERE usuarios_codigo = $id";
            mysqli_query($conexao, $queryAtualizar);

            // Exibe uma mensagem de sucesso
            echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-success text-center' role='alert'>Tipo de conta do usuário atualizado com sucesso.</div></div></div></div>";
        }

        // Exibe o formulário de edição do tipo de conta do usuário
        ?>
        
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <a href="./controle_usuarios.php" class="btn btn-primary mb-3">Voltar</a>
                    <h1 class="mb-4 text-center">Editar Tipo de Conta do Usuário: <?php echo $row['usuarios_nome']; ?></h1>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="tipo_conta">Tipo de Conta</label>
                            <select class="form-control" id="tipo_conta" name="tipo_conta">
                                <option value="2" <?php echo ($row['usuarios_status'] == '2') ? 'selected' : ''; ?>>Normal</option>
                                <option value="1" <?php echo ($row['usuarios_status'] == '1') ? 'selected' : ''; ?>>Premium</option>
                                <option value="0" <?php echo ($row['usuarios_status'] == '0') ? 'selected' : ''; ?>>Admin</option>
                            </select>
                        </div>
                        <div class="form-group mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Atualizar Tipo de Conta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    } else {
        // Caso o usuário não seja encontrado, exibe uma mensagem de erro
        echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-danger text-center' role='alert'>Usuário não encontrado.</div></div></div></div>";
    }
} else {
    // Caso não seja enviado um ID válido via GET, exibe uma mensagem de erro
    echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-danger text-center' role='alert'>ID inválido.</div></div></div></div>";
}

include("./blades/footer.php");
?>
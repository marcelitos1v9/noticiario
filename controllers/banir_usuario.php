<?php
include("../models/conexao.php");
include("../views/blades/header.php");
?>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php
                // Verifica se foi enviado um ID válido via GET
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $id = $_GET['id'];

                    // Realiza a consulta para obter as informações do usuário
                    $query = "SELECT * FROM usuarios WHERE usuarios_codigo = $id";
                    $result = mysqli_query($conexao, $query);

                    // Verifica se o usuário existe
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);

                        // Realiza a ação de excluir o usuário
                        $queryExcluir = "DELETE FROM usuarios WHERE usuarios_codigo = $id";
                        mysqli_query($conexao, $queryExcluir);

                        // Exibe uma mensagem de sucesso
                        echo "<div class='alert alert-warning text-center' role='alert'>Usuário '" . $row['usuarios_nome'] . "' foi excluído com sucesso.</div>";
                    } else {
                        // Caso o usuário não seja encontrado, exibe uma mensagem de erro
                        echo "<div class='alert alert-danger text-center' role='alert'>Usuário não encontrado.</div>";
                    }
                } else {
                    // Caso não seja enviado um ID válido via GET, exibe uma mensagem de erro
                    echo "<div class='alert alert-danger text-center' role='alert'>ID inválido.</div>";
                }

                // Redireciona de volta para a página de controle de usuários após 3 segundos
                header("refresh:3;url=../views/controle_usuarios.php");
                ?>
            </div>
        </div>
    </div>
</body>

<?php include("../views/blades/footer.php") ?>
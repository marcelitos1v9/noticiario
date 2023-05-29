<?php
include("../models/conexao.php");
include("../views/blades/header.php");
?>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "SELECT * FROM usuarios WHERE usuarios_codigo = $id";
                    $result = mysqli_query($conexao, $query);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);

                        $queryExcluir = "DELETE FROM usuarios WHERE usuarios_codigo = $id";
                        mysqli_query($conexao, $queryExcluir);

                        echo "<div class='alert alert-warning text-center' role='alert'>Usuário '" . $row['usuarios_nome'] . "' foi excluído com sucesso.</div>";
                    } else {
                        echo "<div class='alert alert-danger text-center' role='alert'>Usuário não encontrado.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger text-center' role='alert'>ID inválido.</div>";
                }

                header("refresh:3;url=../views/controle_usuarios.php");
                ?>
            </div>
        </div>
    </div>
</body>

<?php include("../views/blades/footer.php") ?>
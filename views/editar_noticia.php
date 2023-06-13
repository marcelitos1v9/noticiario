<?php
include("../models/conexao.php");
include("../views/blades/header.php");

// Verifica se foi enviado um ID válido via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Realiza a consulta para obter as informações da notícia
    $query = "SELECT * FROM bloginfo WHERE bloginfo_codigo = $id";
    $result = mysqli_query($conexao, $query);

    // Verifica se a notícia existe
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifica se o formulário foi submetido
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtém os dados do formulário
            $titulo = $_POST['titulo'];
            $texto = $_POST['texto'];

            // Atualiza os dados da notícia no banco de dados
            $queryAtualizar = "UPDATE bloginfo SET bloginfo_titulo = '$titulo', bloginfo_corpo = '$texto' WHERE bloginfo_codigo = $id";
            mysqli_query($conexao, $queryAtualizar);

            // Exibe uma mensagem de sucesso
            echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-success text-center' role='alert'>Notícia atualizada com sucesso.</div></div></div></div>";
        }

        // Exibe o formulário de edição da notícia
        ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="mb-4 text-center">Editar Notícia</h1>
                    <form action="" method="POST">
                        <div class="form-group mt-3">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $row['bloginfo_titulo']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="texto">Texto</label>
                            <textarea class="form-control" id="texto" name="texto" rows="5"><?php echo $row['bloginfo_corpo']; ?></textarea>
                        </div>
                        <div class="form-group mt-4 d-flex justify-content-around">
                            <a href="./todas_noticias.php" class="btn btn-secondary ">Voltar</a>
                            <button type="submit" class="btn btn-primary">Atualizar Notícia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    } else {
        // Caso a notícia não seja encontrada, exibe uma mensagem de erro
        echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-danger text-center' role='alert'>Notícia não encontrada.</div></div></div></div>";
    }
} else {
    // Caso não seja enviado um ID válido via GET, exibe uma mensagem de erro
    echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-danger text-center' role='alert'>ID inválido.</div></div></div></div>";
}

include("../views/blades/footer.php");
?>
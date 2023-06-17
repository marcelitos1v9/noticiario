<?php
include("../models/conexao.php");
include("../views/blades/header.php");

// Verifica se foi enviado um ID válido via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Realiza a consulta para obter as informações da notícia
    $query = "SELECT * FROM blog
              INNER JOIN blogimgs ON blog.blog_blogimgs_codigo = blogimgs.blogimgs_codigo
              INNER JOIN bloginfo ON blog.blog_bloginfo_codigo = bloginfo.bloginfo_codigo
              WHERE blog.blog_codigo = $id";
    $result = mysqli_query($conexao, $query);

    // Verifica se a notícia existe
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifica se o formulário foi submetido
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtém os dados do formulário
            $titulo = $_POST['titulo'];
            $texto = $_POST['texto'];

            // Verifica se foi enviado um novo arquivo de imagem
            if ($_FILES['imagem']['error'] === 0) {
                // Remove a imagem atual
                $imagem_id = $row['blogimgs_codigo'];
                $imagem = $row['blogimgs_nome'];
                unlink("../imgs/$imagem");

                // Faz o upload do novo arquivo de imagem
                $imagem_temp = $_FILES['imagem']['tmp_name'];
                $imagem_nome = $_FILES['imagem']['name'];
                move_uploaded_file($imagem_temp, "../imgs/$imagem_nome");

                // Atualiza o código da imagem no banco de dados
                $queryImagemAtualizar = "UPDATE blogimgs SET blogimgs_nome = '$imagem_nome' WHERE blogimgs_codigo = $imagem_id";
                mysqli_query($conexao, $queryImagemAtualizar);
            }

            // Atualiza os dados da notícia no banco de dados
            $queryAtualizar = "UPDATE bloginfo SET bloginfo_titulo = '$titulo', bloginfo_corpo = '$texto' WHERE bloginfo_codigo = $id";
            mysqli_query($conexao, $queryAtualizar);

            // Exibe uma mensagem de sucesso
            echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6'><div class='alert alert-success text-center' role='alert'>Notícia atualizada com sucesso.</div></div></div></div>";
        }

        // Exibe a imagem atual da notícia
        $imagem = $row['blogimgs_nome'];
        echo "<div class='container mt-5'><div class='row justify-content-center'><div class='col-md-6 text-center'><img src='../imgs/$imagem' alt='Imagem da Notícia' class='img-fluid mb-4'></div></div></div>";

        // Exibe o formulário de edição da notícia
        ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="mb-4 text-center">Editar Notícia</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $row['bloginfo_titulo']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="texto">Texto</label>
                            <textarea class="form-control" id="texto" name="texto" rows="5"><?php echo $row['bloginfo_corpo']; ?></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="imagem">Imagem</label>
                            <input type="file" class="form-control-file" id="imagem" name="imagem">
                        </div>
                        <div class="form-group mt-4 d-flex justify-content-around">
                            <a href="./todas_noticias.php" class="btn btn-secondary">Voltar</a>
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
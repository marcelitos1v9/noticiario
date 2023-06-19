<?php
include("../models/conexao.php");
include("./blades/header.php");
?>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    margin-top: 20px;
}

h2 {
    color: #333;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.img-fluid {
    width: 100%;
    height: auto;
    border-radius: 5px;
}

.btn-secondary {
    background-color: #777;
    color: #fff;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
}

.btn-secondary:hover {
    background-color: #555;
}

.comment-form {
    margin-top: 40px;
}

.comment-form textarea {
    width: 100%;
    height: 100px;
    padding: 10px;
    border-radius: 5px;
    resize: none;
}

.comment-list {
    margin-top: 40px;
}

.comment {
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #ccc;
}

.comment-author {
    font-weight: bold;
}

.comment-date {
    color: #888;
    font-size: 12px;
}

.comment-content {
    margin-top: 10px;
}
.img-size {
  width: 700px; /* Defina o tamanho desejado para a largura */
  height: auto;
  border-radius: 5px;
}
</style>

<body class="fundo text-light">

    <div class="container my-5">

        <?php
    $varIda = $_GET["ida"];
    $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo INNER JOIN bloginfo ON blog_bloginfo_codigo  = bloginfo_codigo INNER JOIN usuarios ON usuarios_codigo = blog_usuarios_codigo WHERE blog_codigo = $varIda ");
    if (!$query) {
      die("Erro na consulta: " . mysqli_error($conexao));
    }
    while ($exibe = mysqli_fetch_array($query)) {
    ?>

        <div class="row mb-4">
            <div class="col-md-6 ">
                <h2 class="text-light"><?php echo $exibe['bloginfo_titulo'] ?></h2>
                <img src="../imgs/<?php echo $exibe['blogimgs_nome'] ?>" class="img-fluid img-size">
            </div>
            <div class="col-md-6 m-auto">
                <p><?php echo $exibe['bloginfo_corpo']; ?></p>
            </div>
        </div>

        <?php } ?>
        <div class="text-center">
            <a href="../" class="btn btn-dark">Voltar</a>
        </div>
        <div class="comment-form">
            <h3>Deixe um comentário</h3>
            <form action="../controllers/adicionar_comentario.php" method="post" onsubmit="return validateForm()">
                <input type="hidden" name="blog_codigo" value="<?php echo $varIda; ?>">
                <textarea name="comentario" id="comentario" placeholder="Digite seu comentário"></textarea>
                <button type="submit" class="btn btn-outline-light">Enviar</button>
            </form>
        </div>

        <script>
        function validateForm() {
            var comentario = document.getElementById("comentario").value.trim();
            if (comentario === "") {
                alert("Por favor, digite um comentário.");
                return false;
            }
            return true;
        }
        </script>


        <div class="comment-list">
            <h3>Comentários</h3>
            <?php
      $comentarios_query = mysqli_query($conexao, "SELECT comentarios.*, usuarios.usuarios_nome FROM comentarios INNER JOIN usuarios ON comentarios.usuario_id = usuarios.usuarios_codigo WHERE comentarios.blog_codigo = $varIda ORDER BY comentarios.data_comentario DESC");
      if (!$comentarios_query) {
        die("Erro na consulta: " . mysqli_error($conexao));
      }
      while ($comentario = mysqli_fetch_array($comentarios_query)) {
        $data_comentario = date('d/m/Y H:i:s', strtotime($comentario['data_comentario']));
      ?>
            <div class="comment">
                <div class="comment-author"><?php echo $comentario['usuarios_nome']; ?></div>
                <div class="comment-date"><?php echo $data_comentario; ?></div>
                <div class="comment-content"><?php echo $comentario['comentario']; ?></div>
            </div>
            <?php } ?>
        </div>

    </div>
    <?php include("./blades/footer.php"); ?>
</body>
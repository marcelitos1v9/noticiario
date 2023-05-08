<?php include("../models/conexao.php");
include("./blades/header.php");
?>
<body>
<div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="./controle_usuarios.php" method="GET">
                    <div class="form-group">
                        <label for="palavra_chave">Palavra-chave</label>
                        <input type="text" class="form-control" id="palavra_chave" name="palavra_chave">
                    </div>
                    <div class="form-group">
                        <label for="tipo_busca">Buscar por:</label>
                        <select class="form-control" id="tipo_busca" name="tipo_busca">
                            <option value="nome">Nome</option>
                            <option value="email">E-mail</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </div>

        <?php
        $palavra_chave = isset($_GET["palavra_chave"]) ? $_GET["palavra_chave"] : false;
        $tipo_busca = isset($_GET["tipo_busca"]) ? $_GET["tipo_busca"] : "nome";

        if ($palavra_chave) {
            if ($tipo_busca == "email") {
                $query = "SELECT * FROM usuarios WHERE $email LIKE '%$palavra_chave%'";
} else {
$query = "SELECT * FROM usuarios WHERE nome LIKE '%$palavra_chave%'";
}

        $result = mysqli_query($conexao, $query);
        $num_results = mysqli_num_rows($result);

        if ($num_results > 0) {
            echo "<div class='row mt-5'><div class='col-md-6 offset-md-3'><h3>Resultados da busca:</h3></div></div>";
            echo "<div class='row'>";
            while ($row = mysqli_fetch_assoc($result)) {
                // exibindo informações dos usuários encontrados
                echo "<div class='col-md-4 mt-4'><div class='card'><div class='card-body'><h5 class='card-title'>" . $row["nome"] . "</h5><p class='card-text'>" . $row["email"] . "</p></div></div></div>";
            }
            echo "</div>";
        } else {
            // caso não haja resultados, exibir mensagem
            echo "<div class='row mt-5'><div class='col-md-6 offset-md-3'><h3>Nenhum resultado encontrado.</h3></div></div>";
        }
    }
    ?>

</div>
</body>
<?php include("./blades/footer.php") ?>
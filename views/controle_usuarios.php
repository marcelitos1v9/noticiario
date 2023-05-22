<?php
include("../models/conexao.php");
include("./blades/header.php");
?>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Buscar Usuários</h2>
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
                    <div class="row">
                    <a href="../" class="btn btn-secondary col m-3">Voltar</a>
                    <button type="submit" class="btn btn-primary col m-3">Buscar</button>
                </form>
                </div>
            </div>
        </div>

        <?php
        $palavra_chave = isset($_GET["palavra_chave"]) ? $_GET["palavra_chave"] : false;
        $tipo_busca = isset($_GET["tipo_busca"]) ? $_GET["tipo_busca"] : "nome";

        if ($palavra_chave) {
            if ($tipo_busca == "email") {
                $query = "SELECT * FROM usuarios WHERE usuarios_email LIKE '%$palavra_chave%'";
            } else {
                $query = "SELECT * FROM usuarios WHERE usuarios_nome LIKE '%$palavra_chave%'";
            }

            $result = mysqli_query($conexao, $query);
            $num_results = mysqli_num_rows($result);

            if ($num_results > 0) {
                echo "<div class='row mt-5'><div class='col-md-12'><h3>Resultados da busca:</h3></div></div>";
                echo "<div class='row'>";
                echo "<div class='col-md-12'><table class='table'><thead><tr><th>Nome</th><th>E-mail</th><th>Ações</th></tr></thead><tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    // exibindo informações dos usuários encontrados
                    echo "<tr>";
                    echo "<td>" . $row["usuarios_nome"] . "</td>";
                    echo "<td>" . $row["usuarios_email"] . "</td>";
                    echo "<td><a href='./editar_usuario.php?id=" . $row["usuarios_codigo"] . "' class='btn btn-primary'>Editar</a> | <a href='../controllers/banir_usuario.php?id=" . $row["usuarios_codigo"] . "' class='btn btn-danger'>Banir</a></td>";
                    echo "</tr>";
                }
                echo "</tbody></table></div>";
                echo "</div>";
            } else {
                // caso não haja resultados, exibir mensagem
                echo "<div class='row mt-5'><div class='col-md-12'><h3>Nenhum resultado encontrado.</h3></div></div>";
            }
        }
        ?>

    </div>
</body>
<?php include("./blades/footer.php") ?>
<?php
function exibirMenu($conexao)
{
    

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $query_user = mysqli_query($conexao, "SELECT * FROM usuarios WHERE usuarios_codigo = $user_id");
        $exibe_user = mysqli_fetch_array($query_user);

        if ($exibe_user['usuarios_status'] == 2) {
            echo '<nav class="navbar fixed-top navbar-light navbar-expand-lg bg-light text-light mb-5 d-flex">
                        <div class="container d-flex justify-content-center">
                            <a class="nav-link" href="./views/configuracoes.php">Configurações da conta</a>
                            <a class="nav-link" href="./controllers/logout.php">Sair</a>
                        </div>
                    </nav>';
        } else if ($exibe_user['usuarios_status'] == 1) {
            echo '<nav class="navbar fixed-top navbar-light navbar-expand-lg bg-light text-light mb-5 d-flex">
                        <div class="container d-flex justify-content-center">
                            <a class="nav-link" href="./views/cms.php">Inserir nova notícia</a>
                            <a class="nav-link" href="./views/configuracoes.php">Configurações da conta</a>
                            <a class="nav-link" href="./controllers/logout.php">Sair</a>
                        </div>
                    </nav>';
        } else if ($exibe_user['usuarios_status'] == 0) {
            echo '<nav class="navbar fixed-top navbar-light navbar-expand-lg bg-light text-light mb-5 d-flex">
                        <div class="container d-flex justify-content-center">
                            <a class="nav-link" href="./views/cms.php">Inserir nova notícia</a>
                            <a class="nav-link" href="./views/todas_noticias.php">Noticias</a>
                            <a class="nav-link" href="./views/controle_usuarios.php">Controle de usuários</a>
                            <a class="nav-link" href="./controllers/logout.php">Sair</a>
                        </div>
                    </nav>';
        }
    } else {
        echo '<nav class="navbar fixed-top navbar-light navbar-expand-lg bg-light text-light mb-5 d-flex">
                    <div class="container d-flex justify-content-center">
                        <a class="nav-link" href="./views/login.php">Fazer login</a>
                        <a class="nav-link" href="./views/cadastro.php">Cadastrar</a>
                    </div>
                </nav>';
    }
}

// Para usar a função, basta chamar exibirMenu($conexao), onde $conexao é a conexão com o banco de dados.
?>
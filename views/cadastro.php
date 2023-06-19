<?php include("./blades/header.php"); ?>
<body class="fundo vh">

    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="../" class="btn btn-outline-dark">voltar</a>
                <h2 class="mt-3 ">Cadastro de Usuário</h2>

                <form action="../controllers/cadastrar_user.php" method="post">

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>

                    <div class="form-group">
                        <label for="confirmaSenha">Confirmar Senha:</label>
                        <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>

                </form>

            </div>
        </div>

    </div>
    </body>
<?php include("./blades/footer.php"); ?>
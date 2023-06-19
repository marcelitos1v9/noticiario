<?php
include("../models/conexao.php");
include("./blades/header.php");


?>
<style>
	body{
		overflow: hidden;
	}
	.container-fluid{
		height:100%;
		width:100%
	} 
</style>

<body class="fundo vh">
    <nav class="navbar fixed-top navbar-light bg-light mb-5 d-flex">
        <div class="container d-flex justify-content-center">
            <a class="nav-link" href="../">Voltar</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mt-4 mb-4">Login</h2>
                <?php if (isset($_GET['erro']) && $_GET['erro'] === 'Emailousenhaincorretos') {
    echo '<div class="alert alert-danger">Senha ou e-mail incorretos.</div>';
				} ?>
                <form action="../controllers/ver_login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="cadastro.php" class="btn btn-dark m-2 col-4">Cadastrar-se</a>
                        <button type="submit" class="btn btn-light m-2 col-4">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("./blades/footer.php"); ?>
<?php
include("../models/conexao.php");
include("./blades/header.php");


?>

<body>
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
					<button type="submit" class="btn btn-primary">Entrar</button>
				</form>
			</div>
		</div>
	</div>

   <?php include("./blades/footer.php"); ?>

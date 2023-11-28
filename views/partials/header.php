<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
	<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<a class="navbar-item" href="?pagina=instancias">Instâncias</a>
			<a class="navbar-item" href="?pagina=envios">Envios</a>
			<!-- <a class="navbar-item" href="?pagina=matriculas">Qualquer outra coisa</a> -->
		</div>

		<div id="navbarBasicExample" class="navbar-menu">
			<div class="navbar-start">
				<?php if (isset($_SESSION['login'])) { ?>
					<a class="navbar-item" href="logout.php">
						<?php echo $_SESSION['usuario']; ?>
						(sair)
					</a>
				<?php } ?>
			</div>

			<div class="navbar-end">
				<div class="navbar-item">
					<div class="buttons">
						<?php if (!isset($_SESSION['login'])) { ?>
							<a class="button is-light" href="login.php">
								<strong>Login</strong>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div id="conteudo" class="container">
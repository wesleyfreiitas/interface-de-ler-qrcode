<?php

# Iniciar sessão
session_start();

# Base de dados
include 'database/db.php';

# Conteúdo da página
if(isset($_SESSION['login'])){
	if(isset($_GET['pagina'])){
		$pagina = $_GET['pagina'];
	}
	else{
		$pagina = 'instancias';
	}
}
else{
	$pagina = 'home';
}

switch($pagina){
	// case 'envios': include 'views/envios.php'; break;
	case 'instancias': include 'views/instancias.php'; break;
	// case 'usuario': include 'views/usuarios.php'; break;
	case 'usuarios': include 'views/usuarios.php'; break;
	// case 'inserir_usuario': include 'views/inserir_usuario.php'; break;
	case 'inserir_envio': include 'views/inserir_envio.php'; break;
	default: include 'views/home.php'; break;
}

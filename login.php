<?php 

include './database/db.php';

// $usuario = $_POST['usuario'];
$usuario = addslashes($_POST['usuario']);

# antes
$senha = md5($_POST['senha']);
// $senha = $_POST['senha'];


$query = "SELECT * FROM USUARIOS WHERE USUARIO = '$usuario' and SENHA = '$senha'";

$consulta = mysqli_query($conexao, $query);

if(mysqli_num_rows($consulta) == 1){

	session_start();
	$_SESSION['login'] = true;
	$_SESSION['usuario'] = $usuario;

	header('location:index.php');
}
else{
	header('location:index.php?erro');
}
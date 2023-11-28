<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "envios";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);


$query = "SELECT * FROM ENVIOS";
$consulta_envios = mysqli_query($conexao, $query);

$query = "SELECT i.token, i.instancia, i.numero, i.descricao_instancia, i.id_instancia
FROM instancias_usuarios iu
JOIN instancias i ON iu.id_instancia = i.id_instancia
WHERE iu.id = '6'";

$consulta_instancias = mysqli_query($conexao, $query);

$query = "SELECT * FROM USUARIOS";
$consulta_usuarios = mysqli_query($conexao, $query);

$query = "SELECT instancias_usuarios.id_instancia_usuario, instancias.descricao_instancia, usuarios.cnpj 
FROM instancias, usuarios, instancias_usuarios
WHERE instancias_usuarios.id_instancia = instancias.id_instancia
AND instancias_usuarios.id = usuarios.id";

$consulta_match = mysqli_query($conexao, $query);
<?php 
require_once("config.php");

//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM myguests");
//echo json_encode($usuarios);

//Carrega um usuario
$usuario = new Usuario();
$usuario->loadById(3);
echo $usuario;
echo "<br><br>";
//Carrega todos os usuario
$usuariolista = Usuario::getList();
echo json_encode($usuariolista);
echo "<br><br>";
//Carrega uma lsta de usuarios buscando pelo nome
$search = Usuario::search("Ed");
echo json_encode($search);

echo "<br><br>";

//Carrega um usuário com login e a senha
$usuario2 = new Usuario();
$usuario2->login("jose", "Antonio");
echo $usuario2;

echo "<br><br>";

//criando um novo usuario
$usuario3 = new Usuario("Moura", "rrtye");

$usuario3->insert();

echo $usuario3;

echo "<br><br>";
$usuario4 = new Usuario();

$usuario4->loadById(21);

$usuario4->update("du", "3333");

echo $usuario4;


 ?>
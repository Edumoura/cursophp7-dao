<?php 
require_once("config.php");

//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM myguests");
//echo json_encode($usuarios);

//Carrega um usuario
$usuario = new Usuario();
$usuario->loadById(2);
echo $usuario;
echo "<br><br>";
//Carrega todos os usuario
$usuariolista = Usuario::getList();
echo json_encode($usuariolista);
echo "<br><br>";
//Carrega uma lsta de usuarios buscando pelo nome
$search = Usuario::search("o");
echo json_encode($search);

echo "<br><br>";

//Carrega um usuário com login e a senha
$usuario2 = new Usuario();
$usuario2->login("jose", "antonio");
echo $usuario2;


 ?>
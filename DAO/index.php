<?php

require_once("config.php");
/*
$sql = new Sql();

$dados = $sql->select("SELECT * FROM dados");

echo json_encode($dados);
*/
// Carrega um usuário
//$verifica = new dados();
//$verifica->loadById(5);
//echo $verifica;

// Carrega uma lista de usuários
//$lista = dados::getList();
//echo json_encode($lista);

// Carrega apenas um usuario

$search = dados::search("1");

echo json_encode($search);

?>
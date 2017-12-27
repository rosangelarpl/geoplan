<?php

include_once "classes/banco.php";

$quem = $_GET["id"];

$command = "select * from usuario where id = ?";
#Banco::instanciar()->beginTransaction();
$query = Banco::instanciar()->prepare($command);
$query->bindValue(1, $quem, Banco::PARAM_INT);
$query->execute();
#Banco::instanciar()->commit();

$usuario = $query->fetch(Banco::FETCH_ASSOC);
echo var_dump($query->fetchAll(Banco::FETCH_ASSOC));
echo $usuario["nome"];

<?php

include_once('conexao.php');

$id = $_POST['id'];

$result = $mysqli->query("UPDATE usuarios SET `nome` = '{$_POST['nome']}', `email` = '{$_POST['email']}', `senha` = '{$_POST['senha']}' WHERE (`id` = '{$id}')") or die($mysqli->error);

$_SESSION['message'] = "Registro atualizado com sucesso!";
$_SESSION['msg_type'] = "Sucesso!";

header("location: index.php");

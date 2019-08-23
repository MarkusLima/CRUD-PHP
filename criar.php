<?php 
session_start();

include_once ('conexao.php');

    if(isset($_POST['save'])){
        $name = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $mysqli ->query("insert into usuario(nome, email, senha)values ('$name', '$email', '$senha')")or 
        die($mysqli ->error);

        $_SESSION['message'] = "Registro criado com sucesso!";
        $_SESSION['msg_type'] = "Sucesso!";

        header("location: index.php");
    }
    
?>
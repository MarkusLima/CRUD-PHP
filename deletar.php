<?php 
session_start();


include_once ('conexao.php');

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        
        $mysqli ->query("delete from usuarios where id = $id")or die($mysqli ->error);

        $_SESSION['message'] = "Registro deletado com sucesso!";
        $_SESSION['msg_type'] = "Danger";

        header("location: index.php");
    }
    
?>
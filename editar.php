<?php 

include_once ('conexao.php');
include_once ('index.php');


    if(isset($_POST['edit'])){
        $id = $_GET['id'];
     
    
        $result = $mysqli ->query("select * from usuario where id= $id ") or die($mysqli ->error);

        if(($result)!= null) {
            $row = $result ->mysqli_fetch_array();
            $name = $row['nome'];
            $email = $row['email'];
            $senha = $row['senha'];

        }
        $_SESSION['message'] = "Registro atualizado com sucesso!";
        $_SESSION['msg_type'] = "Sucesso!";

        header("location: index.php");
    }
    
?>
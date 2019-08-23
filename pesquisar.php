<?php
include_once ('conexao.php');
include_once ('index.php');
    
    $pesquisar = $_POST['pesquisa'];
    $resultado = $mysqli ->query("SELECT * FROM usuario WHERE nome LIKE '%$pesquisar%' LIMIT 5")or die($mysqli ->error);

    if(($resultado)!= null){
    while($row = mysqli_fetch_array($resultado)){
        echo $row['nome']."  ------  " .$row['email']. "<br/>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <title>Crud PHP</title>
</head>
<body>
<div class="container">

    <?php
      include_once ('conexao.php');
      include_once ('criar.php');
      $result = $mysqli ->query("select* from usuario") or die($mysql ->error);
      //pre_r($result);
      //pre_r($result->fetch_assoc());
      //pre_r($result->fetch_assoc());
    ?> 

    <div class="row justify-content-center">
        <table class="table">
           <thead>
               <tr>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Senha</th>
                  <th> Action</th>
                 
                  
               </tr>
            </thead> 

            <?php while ($row = $result->fetch_assoc()):?> 

            <tr>
                
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['nome'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['senha'];?></td>
                                 
            </tr>
            <?php endwhile ?>
   
        </table>
  </div>


     <?php

        function pre_r($array){
         echo '<pre>';
         print_r($array);
         echo '</pre>';
    }
    
    ?>
    <div class="titulo">Cadastro</div>
    <hr/>
    <div class="formulario">
    <form  method="POST" action="conexao.php">
        <label>Nome </label><br>
        <input type="text" name="nome" placeholder="Digite seu Nome"/><br>
        <label>E-mail</label><br/>
        <input type="email" name="email" placeholder="Digite seu E-mail"/><br>
        <label>Senha</label><br/>
        <input type="password" name="senha" placeholder="Digite sua Senha"/><br/>
        <button type="submit" name="save">Enviar</button>
        <hr/>


    </form>
</div>
    <div class="abaixoFrom">Mk Sistemas</div><hr/>
</div>
</body>
</html>

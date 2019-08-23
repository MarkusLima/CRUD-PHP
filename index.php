<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Crud PHP</title>
</head>
<body>
    <div class="container">
    
         <!-- Botão para acionar modal -->
         <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
             Cadastrar
         </button>
                    <!-- Fim do botão -->

             <form  method="POST" action="pesquisar.php">
                 <label>Nome </label>
                 <input type="text" name="pesquisa" placeholder="Pesquisar"/>
                 <button type="submit">Pesquisar</button>
              </form>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inserir Dados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Digite seu Nome:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">E-mail:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Senha:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-outline-success">Enviar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fim Modal -->


      <?php
         include_once ('conexao.php');
         include_once ('criar.php');
         include_once ('editar.php');
         $result = $mysqli ->query("select* from usuario") or die($mysql ->error);
         //pre_r($result);
         //pre_r($result->fetch_assoc());
       ?>

         <?php if(isset($_SESSION['message'])):  ?>

           <div class = "alert-<?=$_SESSION['msg_type'] ?>">

              <?php echo $_SESSION['message']; unset($_SESSION['message']);?>

           </div>

           <?php endif; ?>

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
                     <td>
                     <a href="editar.php?edit=<?php echo $row['id'];?>"
                     class="btn btn-outline-primary">Editar</a>
                     <a href="deletar.php?delete=<?php echo $row['id'];?>"
                     class="btn btn-outline-danger">Deletar</a>
                     </td>
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


        <div class="">Cadastro</div> <hr/>
        <div class="row justify-content-center">
          <form  method="POST" action="criar.php">
             <label>Nome </label><br>
             <input type="text" name="nome" value ="<?php echo $name; ?>" placeholder="Digite seu Nome"/><br>
             <label>E-mail</label><br/>
             <input type="email" name="email" value ="<?php echo $email; ?>" placeholder="Digite seu E-mail"/><br>
             <label>Senha</label><br/>
             <input type="password" name="senha" value ="<?php echo $senha; ?>" placeholder="Digite sua Senha"/><br/>
              <button name="save">Enviar</button>
            </form>
       </div><br/>
        <div class="row justify-content-center">Mk Sistemas</div><hr/>
   </div>
</div>
   
</body>
</html>

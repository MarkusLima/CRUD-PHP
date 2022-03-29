<!DOCTYPE html>
<html lang="pt-BR">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <title>Crud PHP</title>

  <style>
    .position_btn_create {
      position: fixed;
      bottom: 0;
      right: 0;
      margin: 15px;
    }
  </style>
</head>

<body>
  <div class="container">

    <!-- Botão para acionar modal -->
    <button type="button" class="btn btn-success position_btn_create" data-toggle="modal" data-target="#exampleModal">
      Cadastrar
    </button>
    <!-- Fim do botão -->

    <!-- Modal Criar-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Inserir Dados</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="criar.php" method="post">
            <div class="modal-body">

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Digite seu Nome:</label>
                <input type="text" class="form-control" id="recipient-name" name="nome">
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">E-mail:</label>
                <input class="form-control" id="message-text" name="email">
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Senha:</label>
                <input class="form-control" id="message-text" name="senha">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-success">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Fim Modal Criar -->

    <!-- Modal Update-->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModal1Label">Atualizar Dados</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="editar.php" method="post">
            <div class="modal-body">

              <input type="text" class="d-none" id="id_update" name="id">

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Digite seu Nome:</label>
                <input type="text" class="form-control" id="nome_update" name="nome">
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">E-mail:</label>
                <input class="form-control" id="email_update" name="email">
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Senha:</label>
                <input class="form-control" id="senha_update" name="senha">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-success">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Fim Modal Update -->

    <?php
    include_once('conexao.php');
    $result = $mysqli->query("select* from usuarios") or die($mysql->error);
    ?>

    <?php if (isset($_SESSION['message'])) :  ?>

      <div class="alert-<?= $_SESSION['msg_type'] ?>">

        <?php echo $_SESSION['message'];
        unset($_SESSION['message']); ?>

      </div>

    <?php endif; ?>

    <div class="row justify-content-center mt-5">
      <table class="table" id="tables">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Senha</th>
            <th> Action</th>

          </tr>
        </thead>

        <?php while ($row = $result->fetch_assoc()) : ?>

          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['senha']; ?></td>
            <td>
              <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal1" onclick="updateDados('<?= $row['id']; ?>', '<?= $row['nome']; ?>', '<?= $row['email']; ?>', '<?= $row['senha']; ?>')">
                Editar
              </button>
              <a href="deletar.php?delete=<?php echo $row['id']; ?>" class="btn btn-outline-danger">Deletar</a>
            </td>
          </tr>

        <?php endwhile ?>
      </table>
    </div>

    <hr />
    <div class="row justify-content-center">Mk Sistemas</div>
  </div>

  <script>
    $(document).ready(function() {
      $('#tables').DataTable();

    });
    function updateDados(id, nome, email, senha) {
      $('#id_update').val(id);
      $('#nome_update').val(nome);
      $('#email_update').val(email);
      $('#senha_update').val(senha);
    }
  </script>

</body>

</html>
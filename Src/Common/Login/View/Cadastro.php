<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title></title>

    <?php
      // Importar Módulo de Conexão e Crud de Logs
      if(isset($_SESSION['logged'])){
        header('Location: /E-Commerce/Src/User/View/index.php');
      }
      require '../../../Common/MasterModel/Conn.php';
      require '../../../Common/MasterModel/CrudUsuario.php';
      require '../Controller/CrudUsuario.php';
    ?>
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="row">
        <div class="col">
          <label>Login: </label>
          <input type="text" name="login" required autofocus>
        </div>

        <div class="col">
          <label>Senha: </label>
          <input type="password" name="senha" required>
        </div>

        <div class="col">
          <label>Repita a Senha: </label>
          <input type="password" name="rsenha" required>
        </div>

        <div class="col">
          <label>Email: </label>
          <input type="email" name="email" required>
        </div>

        <div class="col">
          <label>Nome: </label>
          <input type="text" name="nome" required>
        </div>

        <!-- Adc mask -->
        <div class="col">
          <label>Telefone: </label>
          <input type="text" name="telefone" required>
          <label>Celular: </label>
          <input type="checkbox">
        </div>
      </div>

      <div class="col">
        <button type="submit" name="btn_cadastrar" value="">Cadastrar</button>
      </div>
    </form>

    <?php
      if(isset($_POST['btn_cadastrar'])){
        create($_POST);
      }

     ?>
  </body>
</html>

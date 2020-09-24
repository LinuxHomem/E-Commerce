<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- mobile visualization -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" href="https://cdn4.iconfinder.com/data/icons/coffee-108/512/coffee-cafe-13-512.png">

    <!-- import bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- import fontawesome css -->
    <script src="https://kit.fontawesome.com/8622f9455f.js" crossorigin="anonymous"></script>
    <!-- import personal css -->
    <link rel="stylesheet" href="Master.css">

    <?php
      // Importar Módulo de Conexão e Crud de Logs
      session_start();
      if(isset($_SESSION['logged'])){
        header('Location: /E-Commerce/Src/User/View/index.php');
      }
      require '../../../Common/MasterModel/Conn.php';
      require '../../../Common/MasterModel/CrudUsuario.php';
      require '../Controller/CrudUsuario.php';
      require '../../../Common/MasterController/NavBar.php';
    ?>
  </head>
  <body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a href='../../../User/View'><img class="mr-3" style="max-width: 50px;" src="https://cdn4.iconfinder.com/data/icons/coffee-108/512/coffee-cafe-13-512.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="nav" class="collapse navbar-collapse">
        <?php navbar(); ?>
      </div>
    </nav>
    <!-- NavBar -->

    <center><p class="title mt-5 pt-5">Login</p></center>

    <div class="container cont">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
          <label class="h3" for="login">Login</label>
          <input name="login" class="form-control form-control-lg" id="login" aria-describedby="lgHelp" placeholder="Insira seu Login" required>
          <small id='lgHelp' class="form-text text-muted">Não confunda o Login com Email ou Nome.</small>
        </div>

        <div class="form-group">
          <label class="h3" for="senha">Senha</label>
          <input type="password" name="senha" class="form-control form-control-lg" id="senha" placeholder="Insira sua Senha" required>
        </div>

        <button type="submit" name="btn_entrar" value="" class="btn btn-success btn-lg">Entrar</button>
        <a href="Cadastro.php" class="btn btn-warning btn-lg">Cadastrar-se</a>
      </form>

      <?php
        if(isset($_POST['btn_entrar'])){
          login($_POST);
        }
       ?>
    </div>

    <!-- import jquery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- import popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- import bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Cadastro</title>
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
      <a href="/E-Commerce/Src/User/View/index.php">
        <img style="max-height: 50px;" src="https://cdn4.iconfinder.com/data/icons/coffee-108/512/coffee-cafe-13-512.png">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          </li>
          <li class="nav-item">
          </li>
        </ul>
        <?php navbar(); ?>
      </div>
    </nav>
    <!-- NavBar -->

    <center><p class="title mt-5">Cadastro</p></center>

    <div class="container cont mb-5">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
          <label class="h4" for="login">Login</label>
          <input name="login" class="form-control" id="login" placeholder="Insira seu Login" required autofocus>
        </div>

        <div class="form-group">
          <label class="h4" for="senha">Senha</label>
          <input name="senha" type="password" class="form-control" id="senha" placeholder="Insira sua Senha" required>
        </div>

        <div class="form-group">
          <label class="h4" for="rsenha">Repita a Senha</label>
          <input name="rsenha" type="password" class="form-control" id="rsenha" placeholder="Repita a sua Senha" required>
        </div>

        <div class="form-group">
          <label class="h4" for="email">Email</label>
          <input name="email" type="email" class="form-control" id="email" placeholder="Insira seu Email" required>
        </div>

        <div class="form-group">
          <label class="h4" for="nome">Nome Completo</label>
          <input name="nome" class="form-control" id="nome" placeholder="Insira seu Nome" required>
        </div>

        <div class="form-group">
          <label class="h4" for="telefone">Telefone</label>
          <input name="telefone" class="form-control" id="telefone" placeholder="Insira seu Telefone" required>
        </div>

        <div class="form-group">
          <button onclick="phoneMask()" id="telop" type="button" class="btn btn-danger">Celular</button>
          <small class="form-text text-muted">Clique no botão para alterar a máscara para celular ou telefone.</small>
        </div>

        <button name="btn_cadastrar" value="" type="submit" class="btn btn-success btn-lg">Cadastrar-se</button>

        <a class="btn btn-warning btn-lg">Entrar</a>
      </form>
    </div>

    <?php
      if(isset($_POST['btn_cadastrar'])){
        create($_POST);
      }
     ?>

    <!-- import jquery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- import popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- import bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- import mask JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- import personal js -->
    <script src="../Controller/Cadastro.js"></script>
  </body>
</html>

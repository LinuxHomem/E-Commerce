<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Usuários</title>
    <link rel="shortcut icon" href="../../../../Images/Estoque/usuarios-favicon.png">

    <!-- Materialize Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Master Personal Css -->
    <link rel="stylesheet" href="Master.css">

    <?php
      // Importar Módulo de Conexão, Crud de Produtos e Crud de Logs
      if(!isset($_SESSION['adm'])){
        header('Location: /E-Commerce/Src/User/View/Index.php');
      }
      require '../../../Common/MasterModel/Conn.php';
      require '../../../Common/MasterModel/CrudUsuario.php';
      require '../Controller/RenderUsuarios.php';
    ?>
  </head>
  <body>
    <!-- Navbar -->
    <nav>
      <div class="nav-wrapper">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
          <li><a class="inav" href="../../../User/View"><i class="material-icons left">arrow_back_ios</i>Voltar Para Loja</a></li>
          <li><a class="inav" href="Index.php"><i class="material-icons left">menu</i>Início</a></li>
          <li><a class="inav" href="Estoque.php"><i class="material-icons left">storefront</i>Estoque</a></li>
          <li><a class="inav" href="Estatísticas.php"><i class="material-icons left">timeline</i>Estatísticas</a></li>
          <li><a class="inav" href="Configurações.php"><i class="material-icons left">settings</i>Configurações</a></li>
          <li><a class="inav" href="../../Pedidos/View/Pedidos.php"><i class="material-icons left">receipt</i>Pedidos</a></li>
        </ul>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Mobile Sidebar -->
    <ul class="sidenav" id="mobile-demo">
      <li class="margin"><p class="title2">Usuários</p></li>
      <li class="item"><a class="inav" href="../../../User/View"><i class="material-icons left">arrow_back_ios</i>Voltar Para Loja</a></li>
      <li class="item"><a class="inav" href="Index.php"><i class="material-icons left">menu</i>Início</a></li>
      <li class="item"><a class="inav" href="Estoque.php"><i class="material-icons left">storefront</i>Estoque</a></li>
      <li class="item"><a class="inav" href="Estatísticas.php"><i class="material-icons left">timeline</i>Estatísticas</a></li>
      <li class="item"><a class="inav" href="Configurações.php"><i class="material-icons left">settings</i>Configurações</a></li>
      <li class="item"><a class="inav" href="../../Pedidos/View/Pedidos.php"><i class="material-icons left">receipt</i>Pedidos</a></li>
    </ul>
    <!-- Mobile Sidebar -->

    <p class="title">USUÁRIOS</p>

    <div class="container">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="row">
          <div class="input-field col s10">
            <input type="text" name="search" id="search" class="validate" required>
            <label for="search">Pesquisa por Login</label>
          </div>

          <div class="col-2">
            <button type='submit'>
              <a class='btn-floating btn-large waves-effect waves-light green'>
                <i class='material-icons'>done</i>
              </a>
            </button>
          </div>
        </div>
      </form>

      <?php render(); ?>
    </div>

    <!-- Jquery Js -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script><style type="text/css"></style>
    <!-- Materialize JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!-- Jquery Mask JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <!-- Init Materialize JS -->
    <script type="text/javascript" src="../Controller/Init.js"></script>
  </body>
</html>

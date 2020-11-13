<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>E-Commerce Café - Encomenda</title>
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
      // Importar Módulo de Conexão, Crud de Logs e Crud de produtos
      if(!isset($_SESSION['logged'])){
        header('Location: /E-Commerce/Src/User/View');
      }
      require '../../Common/MasterModel/Conn.php';
      require '../../Common/MasterModel/CrudUsuario.php';
      require '../../Common/MasterModel/CrudProduto.php';
      require '../../Common/MasterModel/CrudPedido.php';
      require '../Controller/Perfil.php';
      require '../../Common/MasterController/NavBar.php';
    ?>
  </head>
  <body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a href='Index.php'><img class="mr-3" style="max-width: 50px;" src="https://cdn4.iconfinder.com/data/icons/coffee-108/512/coffee-cafe-13-512.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="nav" class="collapse navbar-collapse">
        <?php navbar(); ?>
      </div>
    </nav>
    <!-- NavBar -->

    <center><p class="title2 mt-5">Perfil</p></center>
    <div id="test">

    </div>
    <div class="container pt-3 mb-5 pb-3">
      <?php perfil(); ?>

      <div id="table">

      </div>
    </div>

    <!-- import jquery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- import popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- import bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- import pedidos JS -->
    <script src="../Controller\Pedidos.js"></script>
  </body>
</html>

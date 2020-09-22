<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Café do VAV - Pesquisar</title>
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
      session_start();
      require '../../Common/MasterModel/Conn.php';
      require '../Model/Pesquisa.php';
      require '../Controller/Pesquisa.php';
      require '../../Common/MasterController/NavBar.php';
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

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
      <div class="container mt-4 w-75">
        <center>
          <p style="font-family:Roboto; font-size: 25px;margin-top:5px">Categorias</p>
          <button name="search" value="Doce" title="Doce" type="submit" class="btn btn-danger btn-circle"><i class="fa fa-cookie-bite"></i></button>
          <button name="search" value="Salgado" title="Salgado" type="submit" class="btn btn-success btn-circle"><i class="fa fa-pizza-slice"></i></button>
          <button name="search" value="Bebida" title="Bebida" type="submit" class="btn btn-warning btn-circle"><i class="fa fa-coffee"></i></button>
          <button name="search" value="Favorito" title="Favorito" type="submit" class="btn btn-info btn-circle"><i class="fa fa-heart"></i></button>
        </center>
      </div>
    </form>

    <div style="background-color: #f1f1f1; max-width: 90%" class="container mt-4 pb-3">
      <center>
        <p class="pt-5" style="font-size:40pt"><?php title($_GET); ?></p>
        <hr class="w-25 mb-1">
        <p class="mt-3" style="font-size:18px">Feitos com os Melhores Ingredientes!</p>

        <?php
          if(!isset($_GET['pagina'])){
              $_GET['pagina'] = 1;
          }

          if(isset($_GET['search'])){
            renderSearh(read($_GET,true));
          }else{
            header('Location: /E-Commerce/Src/User/View/index.php');
          }
        ?>

        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <?php
              pagN(read($_GET,false));
             ?>
          </ul>
        </nav>
      </center>
    </div>

    <div class="container-xl mb-5 pb-5 mt-5 pt-5">
      <div class="jumbotron">
        <h1 class="display-3 text-warning pa">Procurando Algo?</h1>
        <p class="display-4 pb">Insira abaixo e clique em pesquisar!</p>
        <hr class="my-4">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2 pr-5" type="search" placeholder="Digite algo..." aria-label="Pesquisar">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>
    </div>

    <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12">
            <h6 class="text-uppercase font-weight-bold">Sobre o Site</h6>
            <p>Template feita por Vinícius A. Template para cafererias e vitrines.</p>
            <p>Imagens e textos somente ilustrativos.</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <center>
              <h6 class="text-uppercase font-weight-bold">Criador da Template</h6>
              <p> Vinícius A.</p>
            </center>
          </div>
        </div>
        <div class="footer-copyright text-center">© 2020 Copyright: Vinícius</div>
      </div>
    </footer>

    <!-- import jquery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- import popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- import bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Café do VAV</title>
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
      session_start();
      require '../../Common/MasterModel/Conn.php';
      require '../../Common/MasterModel/CrudProduto.php';
      require '../../Common/MasterController/NavBar.php';
      require '../Controller/Index.php';
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

    <form action="Pesquisa.php" method="get">
      <div class="container mt-4 w-75">
        <center>
          <p style="font-family:Roboto; font-size: 25px;margin-top:5px">Categorias</p>
          <button name="search" value="Doce" title="Doces" type="submit" class="btn btn-danger btn-circle"><i class="fa fa-cookie-bite"></i></button>
          <button name="search" value="Salgado" title="Salgados" type="submit" class="btn btn-success btn-circle"><i class="fa fa-pizza-slice"></i></button>
          <button name="search" value="Bebida" title="Bebidas" type="submit" class="btn btn-warning btn-circle"><i class="fa fa-coffee"></i></button>
        </center>
      </div>
    </form>

    <header class="page-header header container-fluid">
      <div class="overlay">
        <div class="description">
          <p id="way1" class="title" style="color: #ffffff; opacity: 0;">Café do VAV</p>
        </div>
      </div>
    </header>

    <center>
      <div class="card-deck mt-5 w-75">
        <?php card(); ?>
      </div>
    </center>

    <div class="cafe d-flex justify-content-center">
      <div class="cafe-txt align-self-center">
        <p class="cafe-sm">Inicie o seu dia com a melhor Bebida Gelada</p>
        <p id="way2" class="cafe-xl">Café.</p>
      </div>
    </div>

    <div id="way3" style="opacity: 0; position: relative; bottom: -5vh" class="container mt-5 cr">
      <div class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://istoe.com.br/wp-content/uploads/sites/14/2019/07/cafe.jpg" class="d-block w-100">
            <div class="carousel-caption d-none d-md-block over">
              <h5>Nosso Café Preto</h5>
              <p>No Café do Nathan, você encontra o melhor, mais barato e mais <br>
                tradicional café preto da região!</p>
            </div>
          </div>

          <div class="carousel-item">
            <img src="https://images6.alphacoders.com/101/thumb-1920-1017115.jpg" class="d-block w-100">
            <div class="carousel-caption d-none d-md-block over">
              <h5>Nossos Bolos</h5>
              <p>Além do nosso café, temos uma grande variedade de bolos que <br>
                acompanham seu café da manhã ou qualquer refeição do seu dia!</p>
            </div>
          </div>

          <div class="carousel-item">
            <img src="https://www.promobit.com.br/blog/wp-content/uploads/2018/10/16153710/coffee-983955_1920.jpg" class="d-block w-100">
            <div class="carousel-caption d-none d-md-block over">
              <h5>Café Expresso</h5>
              <p>Temos uma variedade de cafés, inclusive o tão querido expresso! <br>
              O mais popular expresso da região do jeitinho que você gosta!</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div style="opacity: 0; position: relative; bottom: -5vh" class="container-xl mb-5 pb-5 mt-1 pt-5 jb">
      <div class="jumbotron">
        <h1 class="display-3 text-warning pa">Procurando Algo?</h1>
        <p class="display-4 pb">Insira abaixo e clique em pesquisar!</p>
        <hr class="my-4">
        <form class="form-inline my-2 my-lg-0" method="get" action="Pesquisa.php">
          <input name="search" class="form-control mr-sm-2 pr-5" type="search" placeholder="Digite algo..." aria-label="Pesquisar">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>
    </div>

    <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12">
            <h6 class="text-uppercase font-weight-bold">Sobre o Site</h6>
            <p>Template feita por Vinícius A. e Lucas Castro Template para cafererias e vitrines.</p>
            <p>Imagens e textos somente ilustrativos. Site para Fins Didáticos, portanto Fontes foram ignoradas.</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <center>
              <h6 class="text-uppercase font-weight-bold">Criadores da Página</h6>
              <p> Vinícius A. e Lucas Castro</p>
            </center>
          </div>
        </div>
        <div class="footer-copyright text-center">© 2020</div>
      </div>
    </footer>

    <!-- import jquery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- import popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- import bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- waypoints JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <!-- import personal JS -->
    <script src="../Controller/Index.js" charset="utf-8"></script>
  </body>
</html>

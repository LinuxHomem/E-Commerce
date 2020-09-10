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
    <link rel="stylesheet" href="Main.css">
  </head>

  <body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <img style="max-height: 50px;" src="https://cdn4.iconfinder.com/data/icons/coffee-108/512/coffee-cafe-13-512.png">
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
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Digite algo..." aria-label="Pesquisar">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>
    </nav>
    <!-- NavBar -->

    <div class="container cat-deck">
      <center>
        <p style="font-family:Roboto; font-size: 25px;margin-top:5px">Categorias</p>
        <button title="Doces" type="button" class="btn btn-danger btn-circle"><i class="fa fa-cookie-bite"></i></button>
        <button title="Salgados" type="button" class="btn btn-success btn-circle"><i class="fa fa-pizza-slice"></i></button>
        <button title="Bebidas" type="button" class="btn btn-warning btn-circle"><i class="fa fa-coffee"></i></button>
        <button title="Favoritos" type="button" class="btn btn-info btn-circle"><i class="fa fa-heart"></i></button>
      </center>
    </div>

    <header class="page-header header container-fluid">
      <div class="overlay">
        <div class="description">
          <p id="way1" class="title" style="color: #ffffff;">Café do VAV</p>
        </div>
      </div>
    </header>

    <center>
      <div class="card-deck mt-5">
        <div style="opacity:0; bottom: -5vh" class="card cd1">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQspvDYrhpAN8w4NWaEFDTdMeOm1Dk5OFQUhw&usqp=CAU" class="card-img-top" alt="...">
            <div class="card-body" style="background-color: #f2f2f2">
            <h5 class="card-title">Café Expresso</h5>
            <p class="card-text">Café Expresso simples para acompanhar qualquer refeição.</p>
            <small><del>R$: 8,00</del></small>
            <h5 class="text-success">R$: 5,00</h5>
            <a style="font-size:20px" class="btn btn-warning">Encomendar</a>
          </div>
        </div>

        <div style="opacity:0; bottom: -5vh" class="card cd2">
          <img src="https://receitanatureba.com/wp-content/uploads/2017/03/Bolo-Simples-Fit-de-Chocolate-1200x1200.jpg" class="card-img-top" alt="...">
          <div class="card-body" style="background-color: #f2f2f2">
            <h5 class="card-title">Bolo de Chocolate</h5>
            <p class="card-text">Pedaço de Bolo de Chocolate para seu café da manhã.</p>
            <small><del>R$: 3,00</del></small>
            <h5 class="text-success">R$: 2,00</h5>
            <a style="font-size:20px" class="btn btn-warning">Encomendar</a>
          </div>
        </div>

        <div id="way2" style="opacity:0; bottom: -5vh" class="card cd3">
          <img src="https://s2.glbimg.com/cn2TYUeqZVCdtqXLhFsIkoQbGOw=/0x0:450x450/984x0/smart/filters:strip_icc()/s.glbimg.com/po/rc/media/2013/01/22/16_33_35_104_pao_de_queijo_2.jpg" class="card-img-top" alt="...">
          <div class="card-body" style="background-color: #f2f2f2">
            <h5 class="card-title">Pão de Queijo</h5>
            <p class="card-text">Pão de Queijo tradicional mineiro quentinho.</p>
            <small>400g</small>
            <h5 class="text-success">R$: 6,00</h5>
            <a style="font-size:20px" class="btn btn-warning">Encomendar</a>
          </div>
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

      <div class="card-deck mt-5">
        <div style="opacity:0; bottom: -5vh" class="card cd4">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQspvDYrhpAN8w4NWaEFDTdMeOm1Dk5OFQUhw&usqp=CAU" class="card-img-top" alt="...">
            <div class="card-body" style="background-color: #f2f2f2">
            <h5 class="card-title">Café Expresso</h5>
            <p class="card-text">Café Expresso simples para acompanhar qualquer refeição.</p>
            <small><del>R$: 8,00</del></small>
            <h5 class="text-success">R$: 5,00</h5>
            <a style="font-size:20px" class="btn btn-warning">Encomendar</a>
          </div>
        </div>

        <div style="opacity:0; bottom: -5vh" class="card cd5">
          <img src="https://receitanatureba.com/wp-content/uploads/2017/03/Bolo-Simples-Fit-de-Chocolate-1200x1200.jpg" class="card-img-top" alt="...">
          <div class="card-body" style="background-color: #f2f2f2">
            <h5 class="card-title">Bolo de Chocolate</h5>
            <p class="card-text">Pedaço de Bolo de Chocolate para seu café da manhã.</p>
            <small><del>R$: 3,00</del></small>
            <h5 class="text-success">R$: 2,00</h5>
            <a style="font-size:20px" class="btn btn-warning">Encomendar</a>
          </div>
        </div>

        <div id="way4" style="opacity:0; bottom: -5vh" class="card cd6">
          <img src="https://s2.glbimg.com/cn2TYUeqZVCdtqXLhFsIkoQbGOw=/0x0:450x450/984x0/smart/filters:strip_icc()/s.glbimg.com/po/rc/media/2013/01/22/16_33_35_104_pao_de_queijo_2.jpg" class="card-img-top" alt="...">
          <div class="card-body" style="background-color: #f2f2f2">
            <h5 class="card-title">Pão de Queijo</h5>
            <p class="card-text">Pão de Queijo tradicional mineiro quentinho.</p>
            <small>400g</small>
            <h5 class="text-success">R$: 6,00</h5>
            <a style="font-size:20px" class="btn btn-warning">Encomendar</a>
          </div>
        </div>
      </div>
    </center>

    <div style="opacity: 0; position: relative; bottom: -5vh" class="container-xl mb-5 pb-5 mt-5 pt-5 jb">
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
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- import popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- import bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- waypoints JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js" charset="utf-8"></script>
    <!-- import personal JS -->
    <script src="Index.js" charset="utf-8"></script>
  </body>
</html>

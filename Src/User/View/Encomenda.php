<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Café do VAV - Encomenda</title>
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
      if(!isset($_SESSION['logged'])){
        header('Location: /E-Commerce/Src/Common/Login/View/Login.php');
      }
      require '../../Common/MasterModel/Conn.php';
      require '../../Common/MasterModel/CrudProduto.php';
      require '../../Common/MasterController/NavBar.php';
      require '../../Common/MasterModel/CrudPedido.php';
      require '../Controller/Encomenda.php';
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

    <div class="container">
      <center>
        <div class="card w-50 mt-5">
          <?php
          if(isset($_POST['produto'])){
            $id = $_POST['produto'];
          }else if(isset($_POST['pedir'])){
            $id = $_POST['pedir'];
          }else if(isset($_POST['car'])){
          }else{
            header('Location: /E-Commerce/Src/User/View');
          }

          $instance = new \CrudProduto();
          $arr = $instance->read(array($id,"WHERE id = ?"));
          $arr = $arr[1][0];

          $image = "../../Common/Images/" . $arr['imagem'];
          $nome = $arr['nome'];
          $desc = $arr['descricao'];
          $small = $arr['small'];
          $valor = $arr['valor'];
          $id = $arr['id'];

          if(strstr($small,"R$")){
            $small = "<del>$small<del>";
          }

          echo "<img src='../../Common/Images/$image' class='card-img-top'>
                  <div class='card-body' style='background-color: #f2f2f2'>
                    <h5 class='card-title'>$nome</h5>
                    <p class='card-text'>$desc</p>
                    <small>$small</small>
                    <h5 class='text-success'>R$: $valor</h5>

                    <form action='Encomenda.php' method='post'>
                      <button name='pedir' value='$id' type='submit' style='font-size:20px' class='btn btn-warning'>Fazer Pedido</button>
                      <button name='car' value='$id' type='submit' style='font-size:20px' class='btn btn-info'>Adicionar ao Carrinho</button>
                    </form>
                  </div>";
          ?>

          <?php
            if(isset($_POST['pedir'])){
              pedir(array($_POST['pedir']));
            }else if(isset($_POST['car'])){
              carrinho($_POST['car']);
            }
          ?>

        </div>
      </center>
    </div>

    <div class="container-xl mb-5 pb-5 mt-5 pt-5">
      <div class="jumbotron">
        <h1 class="display-3 text-warning pa">Procurando Algo?</h1>
        <p class="display-4 pb">Insira abaixo e clique em pesquisar!</p>
        <hr class="my-4">
        <form class="form-inline my-2 my-lg-0">
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
  </body>
</html>

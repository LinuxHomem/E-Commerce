<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Estoque</title>
    <link rel="shortcut icon" href="../../../../Images/Estoque/estoque-favicon.png">

    <!-- Materialize Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Master Personal Css -->
    <link rel="stylesheet" href="Master.css">

    <?php
      // Importar Módulo de Conexão, Crud de Produtos e Crud de Logs
      session_start();
      if(!isset($_SESSION['adm'])){
        header('Location: /E-Commerce/Src/User/View/index.php');
      }
      require '../../../Common/MasterModel/Conn.php';
      require '../Model/CrudProduto.php';
      require '../../../Common/MasterModel/CrudLog.php';
      require '../Controller/CrudProduto.php';
    ?>
  </head>
  <body>
    <!-- Navbar -->
    <nav>
      <div class="nav-wrapper">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
          <li><a class="inav" href="../../../User/View"><i class="material-icons left">arrow_back_ios</i>Voltar Para Loja</a></li>
          <li><a class="inav" href="index.php"><i class="material-icons left">arrow_back_ios</i>Início</a></li>
          <li><a class="inav" href="Estatísticas.php"><i class="material-icons left">timeline</i>Estatísticas</a></li>
          <li><a class="inav" href="Configurações.php"><i class="material-icons left">settings</i>Configurações</a></li>
        </ul>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Mobile Sidebar -->
    <ul class="sidenav" id="mobile-demo">
      <li class="margin"><p class="title2">ESTOQUE</p></li>
      <li class="item"><a class="inav" href="../../../User/View"><i class="material-icons left">arrow_back_ios</i>Voltar Para Loja</a></li>
      <li class="item"><a class="inav" href="index.php"><i class="material-icons left">arrow_back_ios</i>Início</a></li>
      <li class="item"><a class="inav" href="Estatísticas.php"><i class="material-icons left">timeline</i>Estatísticas</a></li>
      <li class="item"><a class="inav" href="Configurações.php"><i class="material-icons left">settings</i>Configurações</a></li>
    </ul>
    <!-- Mobile Sidebar -->

    <p class="title">ESTOQUE</p>

    <div class="container">
      <ul class="collapsible">
        <!-- Pesquisar -->
        <li>
          <div class="collapsible-header">
            <i class="material-icons">search</i>
            Pesquisar
            <span class="badge"></span>
          </div>

          <div class="collapsible-body collap">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" id='vl' name="valor" required>
                  <label for="vl">Termo de Pesquisa</label>
                </div>
              </div>

              <div class="row">
                <div class="col s12">
                  <select required name="tipo">
                    <option value="">Tipo de Pesquisa...</option>
                    <option value="Nome">Nome</option>
                    <option value="ID">ID</option>
                    <option value="Categoria">Categoria</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col s6 center">
                  <button class="btn-large bt waves-effect waves-light blue" type="submit" name="btn_search">
                    Pesquisar
                  </button>
                </div>
              </form>

              <div class="col s6 center">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <button class="btn-large bt waves-effect waves-light blue" type="submit" name="btn_searchAll">
                    Exibir Tudo
                  </button>
                </form>
              </div>
            </div>
          </div>
        </li>
        <!-- Pesquisar -->

        <!-- Adicionar -->
        <li>
          <div class="collapsible-header">
            <i class="material-icons">add</i>
            Adicionar Produto
            <span class="badge"></span>
          </div>

          <div class="collapsible-body collap">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
              <div class="row">

                <div class="input-field col l4 s12">
                  <input id="0" type='text' name="nome" required>
                  <label for="0">Nome</label>
                </div>

                <div class="input-field col l3 s12">
                  <input id="1" class="mask" type='text' name="valor" required>
                  <label for="1">Valor</label>
                </div>

                <div class="input-field col l3 s12">
                  <input id="2" type='number' name="quantidade" required>
                  <label for="2">Quantidade</label>
                </div>
              </div>

              <!-- Segunda Linha -->
              <div class="row">
                <div class="file-field input-field col l10 s12">
                  <div class="btn red">
                    <span>Imagem</span>
                    <input name="imagem" type="file" accept="image/jpeg, image/jpg, image/png" required>
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
              </div>

              <!-- Terceira Linha -->
              <div class="row">
                <div class="input-field col l3 s12">
                  <select name="categoria" required>
                    <option value="" disabled selected>Selecione...</option>
                    <option value="Doce">Doce</option>
                    <option value="Salgado">Salgado</option>
                    <option value="Bebida">Bebida</option>
                  </select>
                  <label>Categoria</label>
                </div>

                <div class="input-field col l4 s12">
                  <textarea id="3" name="desc" class="materialize-textarea"></textarea>
                  <label for="3">Descrição</label>
                </div>

                <div class="input-field col l3 s12">
                  <input id="4" type="text" name="small" title="Informação adicional do produto. Ex.: 400g">
                  <label for="4">Small</label>
                </div>

                <div class="input-field col l2 s12 center">
                  <button type="submit" name="btn_add">
                    <a class="btn-floating btn-large waves-effect waves-light yellow accent-2">
                      <i style="color: #000000;" class="material-icons">add</i>
                    </a>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- Adicionar -->

        <!-- Editar -->
        <li>
          <div class="collapsible-header">
            <i class="material-icons">edit</i>
            Editar Produto
            <span class="badge"></span>
          </div>

          <div id="edit_collap" class="collapsible-body collap">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
              <div class="row">

                <div class="input-field col l2 s12">
                  <input type="number" id="id" name="id" required>
                  <label for="id" id="lbid">ID</label>
                </div>

                <div class="input-field col l3 s12">
                  <input type="text" id="name" name="nome" required>
                  <label for="name" id="lbname">Nome</label>
                </div>

                <div class="input-field col l3 s12">
                  <input class="mask" type="text" id="value" name="valor" required>
                  <label for="value" id="lbvalue">Valor</label>
                </div>

                <div class="input-field col l2 s12">
                  <input type="number" id="quantity" name="qtd" required>
                  <label for="quantity" id="lbquantity">Quantidade</label>
                </div>
              </div>

              <!-- Segunda Linha -->
              <div class="row">
                <div class="input-field col l3 s12">
                  <select id="cat" name="cat" required>
                    <option value="" disabled selected>Selecione...</option>
                    <option value="Doce">Doce</option>
                    <option value="Salgado">Salgado</option>
                    <option value="Bebida">Bebida</option>
                  </select>
                  <label>Categoria</label>
                </div>

                <div class="input-field col l4 s12">
                  <textarea id="desc" name="desc" class="materialize-textarea"></textarea>
                  <label for="desc" id="lbdesc">Descrição</label>
                </div>

                <div class="input-field col l3 s12">
                  <input id="small" type="text" name="small" title="Informação adicional do produto. Ex.: 400g">
                  <label for="small" id="lbsmall">Small</label>
                </div>

                <div class="input-field col l2 s12 center">
                  <button type="submit" name="btn_edit">
                    <a class="btn-floating btn-large waves-effect waves-light light-green accent-3">
                      <i style="color: #000000;" class="material-icons">done</i>
                    </a>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- Editar -->
      </ul>

      <!-- Jquery Js -->
      <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script><style type="text/css"></style>
      <!-- Materialize JS -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <!-- Jquery Mask JS -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
      <!-- Init Materialize JS -->
      <script type="text/javascript" src="../Controller/Init.js"></script>
      <!-- Collap Button -->
      <script type="text/javascript" src="../Controller/Collap.js"></script>
      <!-- Init Mask -->
      <script type="text/javascript">$(".mask").maskMoney({
        prefix:'R$: ',
        allowNegative: true,
        thousands:'.',
        decimal:',',
        affixesStay: true
      });</script>

      <?php
        if(isset($_POST['btn_add'])){
          print_r(create($_POST));
          echo read(array("","",""));

        }else if(isset($_POST['btn_search'])){
          echo read($_POST);

        }else if(isset($_POST['btn_edit'])){
          $ret = update($_POST);
          if(!$ret){
            echo "Não foi possível editar o produto.";
            echo read(array("","",""));
          }else{
            echo "Produto Editado. <br>";
            read(array($ret,"ID",""));
          }

        }else if(isset($_POST['btn_delete'])){
          echo delet($_POST['btn_delete']);
          read(array("","",""));

        }else if(isset($_POST['btn_searchAll'])){
          read(array("","",""));

        }else{
          echo read(array("","",""));

        }
      ?>
    </div>
  </body>
</html>

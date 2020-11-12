<?php
  function navbar(){
    echo "<ul class='navbar-nav mr-auto'>";

    if(isset($_SESSION['logged'])){
      echo "<li class='nav-item'>
              <a href='/E-Commerce/Src/User/View/Perfil.php' class='btn btn-dark my-2 my-sm-0 mr-1 ml-1'>Perfil</a>
            </li>";

      if(isset($_SESSION['adm'])){
        echo "<li class='nav-item'><a href='/E-Commerce/Src/Admin/Estoque/View/' class='btn btn-primary my-2 my-sm-0 mr-1 ml-1'>Estoque</a></li>";
        echo "<li class='nav-item'><a href='/E-Commerce/Src/Admin/Pedidos/View/Pedidos.php' class='btn btn-success my-2 my-sm-0 mr-1 ml-1'>Pedidos</a></li>";
      }
      echo "<li class='nav-item'><a href='/E-Commerce/Src/User/View/Carrinho.php' class='btn btn-secondary my-2 my-sm-0 mr-1 ml-1'>Carrinho</a></li>";
      echo "<li class='nav-item'><a href='/E-Commerce/Src/Common/Login/Controller/Logout.php' class='btn btn-danger my-2 my-sm-0 mr-1 ml-1'>Sair</a></li>";
    }else{
      echo "<li class='nav-item'><a href='/E-Commerce/Src/Common/Login/View/Login.php' class='btn btn-outline-dark my-2 my-sm-0 mr-1 ml-1'>Entrar</a></li>";
      echo "<li class='nav-item'><a href='/E-Commerce/Src/Common/Login/View/Cadastro.php' class='btn btn-success my-2 my-sm-0 mr-1 ml-1'>Cadastrar-se</a></li>";
    }

    echo "</ul>
          <form action='/E-Commerce/Src/User/View/Pesquisa.php' method='get' class='form-inline my-2 my-lg-0'>
            <input name='search' class='form-control mr-sm-2' type='search' placeholder='Digite algo...'>
            <button class='btn btn-secondary my-2 my-sm-0' type='submit'>Pesquisar</button>
          </form>";
  }

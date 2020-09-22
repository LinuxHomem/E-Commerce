<?php
  function navbar(){
    if(isset($_SESSION['logged'])){
      echo "<a href='/E-Commerce/Src/Common/Perfil' class='btn btn-dark my-2 my-sm-0 mr-1 ml-1'>Perfil</a>";
      if(isset($_SESSION['adm'])){
        echo "<a href='/E-Commerce/Src/Admin/Estoque/View/' class='btn btn-primary my-2 my-sm-0 mr-1 ml-1'>Estoque</a>";
        echo "<a href='/E-Commerce/Src/Admin/Pedidos/' class='btn btn-success my-2 my-sm-0 mr-1 ml-1'>Pedidos</a>";
      }
      echo "<a href='/E-Commerce/Src/User/View/Carrinho.php' class='btn btn-secondary my-2 my-sm-0 mr-1 ml-1'>Carrinho</a>";
      echo "<a href='/E-Commerce/Src/Common/Login/Controller/Logout.php' class='btn btn-danger my-2 my-sm-0 mr-1 ml-1'>Sair</a>";
    }else{
      echo "<a href='/E-Commerce/Src/Common/Login/View/Cadastro.php' class='btn btn-success my-2 my-sm-0 mr-1 ml-1'>Cadastrar-se</a>";
      echo "<a href='/E-Commerce/Src/Common/Login/View/Login.php' class='btn btn-outline-dark my-2 my-sm-0 mr-1 ml-1'>Entrar</a>";
    }
  }

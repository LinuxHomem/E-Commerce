<?php
  function carrinho($id){
    if(!isset($_SESSION['carrinho'])){
      $_SESSION = array();
    }

    $_SESSION['carrinho'][] = $id;

    echo "<script>location.href = 'Carrinho.php';</script>";
  }

  function renderCar(){
    if(isset($_SESSION['carrinho']) and count($_SESSION['carrinho']) > 0){
      $arr = $_SESSION['carrinho'];

      echo "<table class='table'>
              <thead>
                <tr>
                  <th scope='col'>Id</th>
                  <th scope='col'>Nome</th>
                  <th scope='col'>Info</th>
                  <th scope='col'>Valor</th>
                  <th scope='col'></th>
                </tr>
              </thead>
              <tbody>";

      foreach ($arr as $prod) {
        $instance = new \CrudProduto();
        $arr = $instance->read(array($prod,"WHERE id = ?"));
        $arr = $arr[1][0];

        $id = $arr['id'];
        $nome = $arr['nome'];
        $info = $arr['small'];
        $valor = $arr['valor'];

        echo "<tr>
                <th scope='col'>$id</th>
                <th scope='col'>$nome</th>
                <th scope='col'>$info</th>
                <th scope='col'>$valor</th>
                <th scope='col'>
                  <button type='submit' name='remove' value='$id' class='btn btn-danger my-2 my-sm-0 mr-1 ml-1'>Remover</button>
                </th>
              </tr>";
      }

      echo "</tbody></table>";
      echo "<button type='submit' name='pedir' value='' class='btn btn-success btn-lg my-2 my-sm-0 mr-1 ml-1'>Finalizar Pedidos</button>";
    }else{
      echo "<center class'mt-5'>Nada por aqui. Vá ao seu perfil para conferir seus pedidos.</center>";
    }
  }

  function remove($prod){
    if(isset($_SESSION)){
      $i = array_search($prod,$_SESSION['carrinho']);
      if(isset($_SESSION['carrinho']["$i"])){
        unset($_SESSION['carrinho']["$i"]);
      }
    }
  }

  function pedir($arr){

  }

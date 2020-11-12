<?php
  if(isset($_POST['get'])){
    session_start();
    header('Content-Type: application/json');

    require '../../Common/MasterModel/Conn.php';
    require '../../Common/MasterModel/CrudProduto.php';
    require '../../Common/MasterModel/CrudPedido.php';


    $instance = new \CrudPedido();
    $arr = $instance->read($_SESSION['id'],"WHERE user_id = ?");

    $produtos = array();

    foreach($arr as $ped){
      $proid = $ped['prod_id'];

      $instance = new \CrudProduto();
      $produto = $instance->read(array($proid,"WHERE id = ?"));
      $produto = $produto[1][0];
      $produto['situacao'] = $ped['situacao'];
      $produto['numpd'] = $ped['id'];
      $produtos[] = $produto;
    }

    echo json_encode($produtos);
  }

  function perfil(){
    $instance = new \CrudUsuario();
    $arr = $instance->read(array("",$_SESSION['id'],"id = ?"));
    $arr = $arr[0];

    $id = $arr['id'];
    $login = $arr['login'];
    $email = $arr['email'];
    $nome = $arr['nome'];
    $tel = $arr['telefone'];

    echo "<p class='h4 mb-4'>Nome: $nome</p>
          <p class='h4 mb-4'>Login: $login</p>
          <p class='h4 mb-4'>Email: $email</p>
          <p class='h4 mb-4'>Telefone: $tel</p>";
  }

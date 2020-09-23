<?php
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
          <p class='h4 mb-4'>Telefone: $tel</p>
          <center>
            <p class='h3 mt-5 mb-5'>Pedidos:</p>
            <table class='table'>
              <thead>
                <tr>
                  <th>N° do Pedido</th>
                  <th>Produto</th>
                  <th>Valor</th>
                  <th>Situação</th>
                </tr>
              </thead>
              <tbody>";

    $instance = new \CrudPedido();
    $arr = $instance->read($id,"WHERE user_id = ?");

    foreach($arr as $ped){
      $proid = $ped['prod_id'];

      $instance = new \CrudProduto();
      $return = $instance->read(array($proid,"WHERE id = ?"));
      $return = $return[1][0];

      $numpd = $ped['id'];
      $produto = $return['nome'];
      $valor = $return['valor'];
      $sit = $ped['situacao'];

      if($sit == 0){
        $sit = "<td style='color:#ff0000;'>Pendente<td>";
      }else{
        $sit = "<td style='color:#00ff00;'>Pronto</td>";
      }

      echo "<tr>
              <td>$numpd</td>
              <td>$produto</td>
              <td>R$:$valor</td>
              $sit";
    }
    echo"</tbody></table></center>";
  }

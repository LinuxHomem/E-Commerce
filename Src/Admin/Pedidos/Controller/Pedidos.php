<?php
  function pedidos(){
    $instance = new \CrudPedido();
    $pedidos = $instance->read("","");

    if(count($pedidos) > 0){

      echo "<table>
              <thead>
                <tr>
                  <th>N° do Pedido</th>
                  <th>Nome</th>
                  <th>Produto</th>
                  <th>Valor</th>
                  <th><th>
                </tr>
              </thead>
              <tbody>";

      foreach($pedidos as $pedi){
        $prodid = $pedi['prod_id'];

        $instance = new \CrudProduto();
        $prod = $instance->read(array($prodid,"WHERE id = ?"));
        $prod = $prod[1][0];

        $qtd = $prod['quantidade'] - 1;

        $instance = new \CrudUsuario();
        $user = $instance->read(array("",$pedi['user_id'],"id = ?"));
        $user = $user[0];

        $npedi = $pedi['id'];
        $nome = $user['nome'];
        $produto = $prod['nome'];
        $valor = $prod['valor'];
        echo "<tr>
                <td>$npedi</td>
                <td>$nome</td>
                <td>$produto</td>
                <td>R$:$valor</td>
                <td>";

        if($pedi['situacao'] == 0){
          echo "<button type='submit' name='pronto' value='$npedi$$prodid$$qtd'>
                  <a class='btn-floating btn-large waves-effect waves-light light-green accent-3'>
                    <i style='color: #000000;' class='material-icons'>done</i>
                  </a>
                </button>";
        }

        echo "<button type='submit' name='remove' value='$npedi'>
                <a class='btn-floating btn-large waves-effect waves-light red'>
                  <i style='color: #000000;' class='material-icons'>delete</i>
                </a>
              </button>
            </td>
          </tr>";
      }

      echo "</tbody></table>";
    }else{
      echo "<center><p>Sem pedidos aqui :)<p></center>";
    }
  }

  function pronto(){
    if(isset($_POST['pronto'])){
      $arr = explode("$",$_POST['pronto']);

      $pedi_id = $arr[0];
      $prod_id = $arr[1];
      $qtd = $arr[2];

      // $instance = new \CrudProduto();
      // $prod = $instance->removeOne($prod_id,$qtd);

      $instance = new \CrudPedido();
      $pedidos = $instance->pronto($pedi_id);
    }else if(isset($_POST['remove'])){
      $id = $_POST['remove'];

      $instance = new \CrudPedido();
      $instance->delete($id);
    }
  }

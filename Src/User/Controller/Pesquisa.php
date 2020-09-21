<?php
  // limpeza de xss
  function clear($arr){
    $arr2 = array();
    foreach ($arr as $key => $value) {
      $value = htmlspecialchars($value);
      $arr2[] = $value;
    }
    return $arr2;
  }
  // limpeza de xss

  // read section
  function read($vArr){
    $arr = array($vArr['search'],$vArr['pagina']);
    $cArr = clear($arr);
    unset($arr);

    if($cArr[0] == 'Doce' or $cArr[0] == 'Salgado' or $cArr[0] == 'Bebida'){
      $arr[] = "WHERE categoria = ?";
      $arr[] = $cArr[0];
    }else if($cArr[0] == 'Favoritos'){
      // FAVORITOSSSSS
    }else{
      $arr[] = "WHERE nome LIKE ?";
      $arr[] = "%" . $cArr[0] . "%";
    }

    if($cArr[1] != 1){
      $arr[] = (($cArr[1] / 2) * 10) + 1;
    }else{
      $arr[] = 0;
    }

    $arr[] = $cArr[1] * 10;

    $instance = new \Pesquisa();
    $return = $instance->read($arr);

    return $return;
  }
  // read section

  // renderizar produtos
  function renderSearh($arr){
    $row = 0;

    foreach ($arr[1] as $prod) {
      // começar nova linha de 4 produtos
      if($row == 0){
        echo "<div class='card-deck mb-5 mt-5'>";
      }

      $id = $prod['id'];
      $nome = $prod['nome'];
      $valor = $prod['valor'];
      $desc = $prod['descricao'];
      $small = $prod['small'];

      if(strstr($small,"R$")){
        $small = "<del>" . $small . "<del>";
      }

      echo "<div style='max-width: 293px' class='card'>
              <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQspvDYrhpAN8w4NWaEFDTdMeOm1Dk5OFQUhw&usqp=CAU' class='card-img-top'>
              <div class='card-body' style='background-color: #f2f2f2'>
                <h5 class='card-title'>$nome</h5>
                <p class='card-text'>$desc</p>
                <small>$small</small>
                <h5 class='text-success'>R$: $valor</h5>

                <form action='Produto.php' method='get'>
                  <button name='produto' value='$id' type='submit' style='font-size:20px' class='btn btn-warning'>Encomendar</button>
                </form>
              </div>
            </div>";

      $row++;
      //  final linha de 4 produtos
      if($row == 4){
        echo "</div>";
        $row = 0;
      }
    }

    if($row != 0){
      echo "</div>";
    }
  }
  // renderizar produtos

  function title($arr){
    $i = $arr['search'];
    if($i == 'Doce' or $i == 'Salgado' or $i == 'Bebida' or $i == 'Favorito'){
      echo $i . "s";
    }else{
      echo "Resultado de: " . $i;
    }
  }

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
  function read($vArr,$bol){
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

    if($bol){
      if($cArr[1] != 1){
        $arr[] = (($cArr[1] / 2) * 10);
      }else{
        $arr[] = 0;
      }

      $arr[2] = "LIMIT " . $arr[2] . ",";

      $arr[] = $cArr[1] * 10;
    }else{
      $arr[] = "";
      $arr[] = "";
    }

    $instance = new \Pesquisa();
    $return = $instance->read($arr);
    return $return;
  }
  // read section

  // renderizar produtos
  function renderSearh($arr){
    $row = 0;
    foreach($arr[1] as $prod){
      // começar nova linha de 4 produtos
      if($row == 0){
        echo "<div class='card-deck mb-5 mt-5'>";
      }

      $id = $prod['id'];
      $nome = $prod['nome'];
      $valor = $prod['valor'];
      $desc = $prod['descricao'];
      $small = $prod['small'];
      $image = "../../Common/Images/" . $prod['imagem'];

      if(strstr($small,"R$")){
        $small = "<del>" . $small . "<del>";
      }

      echo "<div style='max-width: 293px' class='card'>
              <img src='$image' class='card-img-top'>
              <div class='card-body' style='background-color: #f2f2f2'>
                <h5 class='card-title'>$nome</h5>
                <p class='card-text'>$desc</p>
                <small>$small</small>
                <h5 class='text-success'>R$: $valor</h5>

                <form action='Encomenda.php' method='post'>
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

  function pagN($arr){
    $count = $arr[0];

    $search = $_GET['search'];
    $pagina = $_GET['pagina'];

    $pgs = ceil($count / 10);
    if($pgs != 0){
      $sh = $_GET['search'];
      echo "<li class='page-item'>
              <a class='page-link' href='Pesquisa.php?search=$sh&pagina=1'>Primeiro</a>
            </li>";

      for($i=0; $i<$pgs; $i++){
        $pg = $i + 1;
        echo "<li class='page-item ";

        if($pg == $pagina){
          echo "active' ";
        }else{
          echo "' ";
        }

        echo "><a class='page-link' href='Pesquisa.php?search=$search&pagina=$pg'>$pg</a></li>";
      }
      echo "<li class='page-item'>
              <a class='page-link' href='Pesquisa.php?search=$search&pagina=$pgs'>Último</a>
            </li>";
    }else{
      echo "Nenhum Produto Encontrado";
    }
  }

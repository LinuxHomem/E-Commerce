<?php
  function card(){
    $instance = new \CrudProduto();
    $return = $instance->read(array(0,"WHERE quantidade > ?"));

    $prod = array();
    $num;

    for ($i=0; $i < 3; $i++) {
      $num = rand(0,$return[0]-1);

      while(in_array($num,$prod)){
        $num = rand(0,$return[0]-1);
      }

      $prod[] = $num;
    }

    $return = $return[1];
    $i = 1;

    foreach ($prod as $value) {
      $produto = $return[$value];

      $id = $produto['id'];
      $imagem = $produto['imagem'];
      $nome = $produto['nome'];
      $desc = $produto['descricao'];
      $small = $produto['small'];
      $valor = $produto['valor'];

      if(strstr($small,"R$")){
        $small = "<del>$small<del>";
      }

      echo "<div style='opacity:0; bottom: -5vh' class='card cd$i'>
              <img src='../../Common/Images/$imagem' class='card-img-top'>
              <div class='card-body' style='background-color: #f2f2f2'>
                <h5 class='card-title'>$nome</h5>
                <p class='card-text'>$desc</p>
                <small>$small</small>
                <h5 class='text-success'>$valor</h5>
                <form action='Encomenda.php' method='post'>
                  <button type='submit' name='produto' value='$id' style='font-size:20px' class='btn btn-warning'>Encomendar</button>
                </form>
              </div>
            </div>";
      $i++;
    }
  }

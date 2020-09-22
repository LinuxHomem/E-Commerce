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

  // create section
  function create($arr){
    array_pop($arr);
    $arr['valor'] = explode(" ",$arr['valor']);
    $arr['valor'] = $arr['valor'][1];

    $cArr = clear($arr);
    $type = array("png", "jpeg", "jpg");
    $fileType = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

    if(in_array($fileType,$type)){
      $temp = $_FILES['imagem']['tmp_name'];
      $name = uniqid() . ".$fileType";

      $cArr = array_chunk($cArr,3);
      $cArr[0][] = $name;
      $cArr = array_merge($cArr[0],$cArr[1]);
      if(move_uploaded_file($temp, "../../../Common/Images/$name")){

        $instance = new \CrudProduto();
        return $instance->create($cArr);
      }else{
        echo "Não foi possível fazer upload da imagem <br>";
      }
    }else{
      echo "Selecione um Formato de imagem válido <br>";
    }
  }
  // create section

  // read section
  function read($arr){
    array_pop($arr);
    $cArr = clear($arr);

    if($cArr[1] == "Nome"){
      $tipo = $cArr[1];
      $term = $cArr[0];
      $cArr[1] = "WHERE nome LIKE ?";
      $cArr[0] = "%" . $cArr[0] . "%";
    }else if($cArr[1] == "ID"){
      $tipo = $cArr[1];
      $term = $cArr[0];
      $cArr[1] = 'WHERE id = ?';
    }else if($cArr[1] == ""){
      $tipo = "";
    }else if($cArr[1] == "Categoria"){
      $tipo = $cArr[1];
      $term = $cArr[0];
      $cArr[1] = "WHERE categoria LIKE ?";
      $cArr[0] = "%" . $cArr[0] . "%";
    }else{
      return 'Tipo Inválido';
    }

    $instance = new \CrudProduto();
    $arr = $instance->read($cArr);

    if($arr === false){
      echo "Não foi possível fazer a leitura.";
    }else{
      if($tipo != "" && $tipo != "Categoria"){
        echo $arr[0] . " Produto(s) Encontrado(s) Para o " . $tipo . ": " . $term;
      }else if($tipo == "Categoria"){
        echo $arr[0] . " Produto(s) Encontrado(s) Para a " . $tipo . ": " . $term;
      }else{
        echo "Exibindo Tudo.";
      }

      $server = $_SERVER['PHP_SELF'];

      echo "<form action='$server' method='post'>
              <table class='striped centered'>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Descrição</th>
                    <th>Small</th>
                  </tr>
                </thead>
                <tbody>";

      for($i=0;$i < $arr[0];$i++){
        $values = $arr[1][$i];
        $id = $values['id'];
        $nome = $values['nome'];
        $cat = $values['categoria'];
        $valor = $values['valor'];
        $qtd = $values['quantidade'];
        $desc = $values['descricao'];
        $small = $values['small'];

        echo "<tr>
                <td>$id</td>
                <td id='$id nome' value='$nome'>$nome</td>
                <td id='$id cat' value='$cat'>$cat</td>
                <td id='$id valor' value='$valor'>R$:$valor</td>
                <td id='$id qtd' value='$qtd'>$qtd</td>
                <td id='$id desc' value='$desc'>$desc</td>
                <td id='$id small' value='$small'>$small</td>";

        echo "<td>
                <button type='button' onclick='edit(this.value);' value='$id' name='btn_edit1'>
                  <a class='btn-floating btn-small waves-effect waves-light orange'>
                    <i class='material-icons'>edit</i>
                  </a>

                </button>
                <button type='submit' value='$id' name='btn_delete'>
                  <a class='btn-floating btn-small waves-effect waves-light red'>
                    <i class='material-icons'>delete</i>
                  </a>
                </button>
              </td>
            </tr>";
      }
      echo "</tbody>
          </table>
        </form>";
    }
  }
  // read section

  // update section
  function update($arr){
    array_pop($arr);

    if(strstr($arr['valor'],'R$')){
      $arr['valor'] = explode(" ",$arr['valor']);
      $arr['valor'] = $arr['valor'][1];
    }

    $cArr = clear($arr);
    $cArr[] = array_shift($cArr);

    $instance = new \CrudProduto();
    $ret = $instance->update($cArr);
    return $ret;
  }
  // update section

  // delete section
  function delet($id){
    $id = htmlspecialchars($id);
    $instance = new \CrudProduto();
    return $instance->delete($id);
  }
  // delete section

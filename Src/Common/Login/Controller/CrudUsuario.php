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
    $cArr = clear($arr);

    // verificações
    $err = array();
    if(strlen($cArr[0]) <= 3){
      $err[] = "Seu login precisa ter pelo menos 4 caracteres";
    }

    if($cArr[1] != $cArr[2]){
      $err[] = "As senhas não conferem";
    }

    if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $cArr[1])){
      $err[] = "Sua senha precisa conter no mínimo 8 caracteres contendo
      uma letra minúscula, maiúscula e um número";
    }

    array_splice($cArr,2,1);
    $cArr[1] = md5($cArr[1]);

    if(count($err) == 0){
      $instance = new \CrudUsuario();
      return $instance->create($cArr);
    }else{
      foreach($err as $value){
        echo $value . '<br>';
      }
    }
  }
  // create section

  // login session
  function login($arr){
    array_pop($arr);
    $cArr = clear($arr);
    $cArr[1] = md5($cArr[1]);
    $sch = array("",$cArr[0],'login = ?');

    $instance = new \CrudUsuario();
    $arr = $instance->read($sch);

    if(count($arr) == 1){
      $sch = array($cArr[0], $cArr[1],'login = ? and senha = ?');

      $instance = new \CrudUsuario();
      $arr = $instance->read($sch);

      if(count($arr) == 1){
        $arr = $arr[0];

        $_SESSION['logged'] = true;
        $_SESSION['id'] = $arr['id'];
        $_SESSION['login'] = $arr['login'];

        if($arr['adm'] == 1){
          $_SESSION['adm'] = true;
        }

        header('Location: /E-Commerce/Src/User/View/index.php');
      }else{
        echo "Senha Inválida";
      }

    }else{
      echo "Login Inválido";
    }
  }
  // login session

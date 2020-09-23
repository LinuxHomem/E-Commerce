<?php
  class CrudUsuario{
    // create section
    public function create($arr){
      $sql = "INSERT INTO `cafe`.`usuarios` VALUES (NULL,?,?,?,?,?,0)";
      $stmt = Conexao::getConn()->prepare($sql);

      $i = 1;
      foreach ($arr as $value) {
        $stmt->bindValue($i,$value);
        $i++;
      }

      if($stmt->execute() === false){
        echo "<script>alert('Não foi possível realizar cadastro')</script>";
      }else{
        header('Location: /E-Commerce/Src/Common/Login/View/Login.php');
      }
    }
    // create section

    // read section
    public function read($arr){
      $sql = "SELECT * FROM `cafe`.`usuarios` WHERE $arr[2]";
      $stmt = Conexao::getConn()->prepare($sql);
      if($arr[0] == ""){
        $stmt->bindValue(1,$arr[1]);
      }else{
        $stmt->bindValue(1,$arr[0]);
        $stmt->bindValue(2,$arr[1]);
      }

      if($stmt->execute() === false){
        return false;
      }else{
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      }
    }
    // read section
}

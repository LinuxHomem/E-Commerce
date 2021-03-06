<?php
  date_default_timezone_set('America/Sao_Paulo');
  class CrudLog{
    // create section
    public function create($id,$op){
      $arr = new CrudProduto;
      $arr = $arr->read(array("",""));

      $data = date("Y-m-d");
      $max = 0;
      $i = 0;
      foreach ($arr[1] as $value) {
        $j = $arr[1][$i]["valor"];
        $j = str_replace(".","",$j);
        $j = str_replace(",",".",$j);
        $j *= $arr[1][$i]["quantidade"];
        $max += $j;
        $i++;
      }

      $values = array($data,$max,$arr[0],$op,$id);

      $sql = "INSERT INTO `cafe`.`logs` VALUES (NULL,?,?,?,?,?)";
      $stmt = Conexao::getConn()->prepare($sql);

      $i = 1;
      foreach ($values as $value) {
        $stmt->bindValue($i,$values[$i-1]);
        $i++;
      }

      if($stmt->execute() === false){
        echo "Falha ao Gravar Log. <br>";
      }
    }
    // create section

    // read section
    public function read(){
      $sql = "SELECT * FROM `cafe`.`logs` ORDER BY id";
      $stmt = Conexao::getConn()->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    // read section

    // delete section
    public function delete(){
      $sql = "TRUNCATE TABLE `cafe`.`logs`";
      $stmt = Conexao::getConn()->prepare($sql);
      $stmt->execute();
    }
    // delete section
  }

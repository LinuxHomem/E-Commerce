<?php

class Pesquisa{
  // read section
    public function read($arr){
      // Obter itens
      $sql = "SELECT * FROM `cafe` . `produtos` $arr[0] ORDER BY id LIMIT $arr[2],$arr[3]";
      $stmt = Conexao::getConn()->prepare($sql);
      $stmt->bindValue(1,$arr[1]);

      // Quantidade de itens
      $sql = "SELECT * FROM `cafe` . `produtos` ORDER BY id";
      $stmt2 = Conexao::getConn()->prepare($sql);
      $stmt2->execute();

      if($stmt->execute() === false){
        return false;
      }else{
        return array($stmt2->rowCount(),$stmt->fetchAll(\PDO::FETCH_ASSOC));
      }
    }
    // read section
  }

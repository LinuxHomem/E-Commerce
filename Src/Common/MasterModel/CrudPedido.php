<?php
class Pesquisa{
    // read section
    public function read($arr){
      // Obter itens
      $sql = "SELECT * FROM `cafe` . `pedidos` $arr[0] ORDER BY id $arr[2] $arr[3]";
      $stmt = Conexao::getConn()->prepare($sql);
      $stmt->bindValue(1,$arr[1]);

      if($stmt->execute() === false){
        return false;
      }else{
        return array($stmt->rowCount(),$stmt->fetchAll(\PDO::FETCH_ASSOC));
      }
    }
    // read section
  }

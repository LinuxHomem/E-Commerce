<?php
class CrudPedido{
    // read section
    public function read($id,$term){
      $sql = "SELECT * FROM `cafe` . `pedidos` $term";
      $stmt = Conexao::getConn()->prepare($sql);

      if($term != ""){
        $stmt->bindValue(1,$id);
      }

      if($stmt->execute() === false){
        return false;
      }else{
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      }
    }
    // read section

    public function create($userid,$prodid){
      $sql = "INSERT INTO `cafe`.`pedidos` VALUES (NULL,?,?,0)";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$userid);
      $stmt->bindValue(2,$prodid);

      if($stmt->execute() === false){
        return false;
      }else{
        return true;
      }
    }

    public function pronto($id){
      $sql = "UPDATE `cafe`.`pedidos` SET situacao = ? WHERE id = ?";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,1);
      $stmt->bindValue(2,$id);

      if($stmt->execute() === false){
        return false;
      }else{
        return true;
      }
    }

    public function delete($id){
      $sql = "DELETE FROM `cafe`.`pedidos` WHERE id = ?";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$id);

      if($stmt->execute() === false){
        return false;
      }else{
        return true;
      }
    }

    // reset id section
    public function resetId(){
      function sql($sql){
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
      }
      $sql = "ALTER TABLE `cafe`.`pedidos` DROP `id`";
      sql($sql);

      $sql = "ALTER TABLE `cafe`.`pedidos` ADD `id` INT(255) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`)";
      sql($sql);
    }
    // reset id section
  }

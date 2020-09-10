<?php
  class CrudUsuario{
    // create section
    public function create($arr){
      $sql = "INSERT INTO `cafe`.`usuarios` VALUES (NULL,?,?,?,?,?,NULL)";
      $stmt = Conexao::getConn()->prepare($sql);

      $i = 1;
      foreach ($arr as $value) {
        $stmt->bindValue($i,$value);
        $i++;
      }

      if($stmt->execute() === false){
        echo "Não Foi";
      }else{
        echo "Foi";
      }
    }
    // create section

    // read section
    public function read($arr){
      $sql = "SELECT * FROM `cafe`.`usuarios` WHERE $arr[1]";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$arr[0]);

      if($stmt->execute() === false){
        return 'erro';
      }else{
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      }
    }
    // read section

    // update section
    public function update($arr){
      $sql = "UPDATE `cafe`.`usuarios` SET nome = ?, valor = ?, quantidade = ?, categoria = ?, descricao = ?, small = ? WHERE id = ?";
      $stmt = Conexao::getConn()->prepare($sql);

      $i = 1;
      foreach ($arr as $value) {
        $stmt->bindValue($i,$value);
        $i++;
      }

      if($stmt->execute() === false){
        return false;
      }else{
        $instance = new \CrudLog;
        $instance->create($arr[6],"update");

        return $arr[6];
      }
    }
    // update section

    // delete section
    public function delete($id){
      $sql = "DELETE FROM `cafe`.`usuarios` WHERE id = ?";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$id);

      if($stmt->execute() === false){
        return "Falha ao Deletar o Produto. <br>";
      }else{
        $instance = new \CrudLog;
        $instance->create($id,"delete");

        $ret = "Item com o id '$id' foi deletado! <br>";
        return $ret;
      }
    }
    // delete section

    // reset id section
    public function resetId(){
      function sql($sql){
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
      }
      $sql = "ALTER TABLE `cafe`.`produtos` DROP `id`";
      sql($sql);

      $sql = "ALTER TABLE `cafe`.`produtos` ADD `id` INT(255) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`)";
      sql($sql);
    }
    // reset id section
  }

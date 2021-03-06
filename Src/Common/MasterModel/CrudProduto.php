<?php
  class CrudProduto{
    // create section
    public function create($arr){
      $sql = "INSERT INTO `cafe`.`produtos` VALUES (NULL,?,?,?,?,?,?,?)";
      $stmt = Conexao::getConn()->prepare($sql);

      $i = 1;
      foreach ($arr as $value) {
        $stmt->bindValue($i,$value);
        $i++;
      }

      if($stmt->execute() === false){
        return "Falha ao Cadastrar o Produto. <br>";
      }else{
        $id = self::read(array("",""));

        $instance = new \CrudLog;
        $instance->create(end($id[1])["id"],"create");

        return "Produto Cadastrado. <br>";
      }
    }
    // create section

    // read section
    public function read($arr){
      $sql = "SELECT * FROM `cafe`.`produtos` $arr[1] ORDER BY id";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$arr[0]);

      if($stmt->execute() === false){
        return false;
      }else{
        return array($stmt->rowCount(),$stmt->fetchAll(\PDO::FETCH_ASSOC));
      }
    }
    // read section

    // update section
    public function update($arr){
      $sql = "UPDATE `cafe`.`produtos` SET nome = ?, valor = ?, quantidade = ?, categoria = ?, descricao = ?, small = ? WHERE id = ?";
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
      $sql = "DELETE FROM `cafe`.`produtos` WHERE id = ?";
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

    public function removeOne($id,$qtd){
      $sql = "UPDATE `cafe`.`produtos` SET quantidade = ? WHERE id = ?";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$qtd);
      $stmt->bindValue(2,$id);

      if($stmt->execute() === false){
        return false;
      }else{
        return true;
      }
    }
  }

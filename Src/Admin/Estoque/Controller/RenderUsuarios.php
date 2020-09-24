<?php
  function render(){
    if(isset($_POST['search'])){
      $instance = new \CrudUsuario();
      $arr = $instance->read(array("","%" . $_POST['search'] . "%","nome LIKE ?"));
    }else{
      $instance = new \CrudUsuario();
      $arr = $instance->read(array("","0","id > ?"));
    }

    echo "<table>
            <thead>
              <tr>
                <th>Id</th>
                <th>Login</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
              </tr>
            </thead>

            <tbody>";

    foreach($arr as $user){
      $id = $user['id'];
      $login = $user['login'];
      $email = $user['email'];
      $nome = $user['nome'];
      $tel = $user['telefone'];

      echo "<tr>
              <td>$id</td>
              <td>$login</td>
              <td>$email</td>
              <td>$nome</td>
              <td>$tel</td>
            </tr>";
    }
    echo "</tbody></table>";
  }

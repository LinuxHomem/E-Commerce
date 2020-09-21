<?php
class Conexao{

  private static $instance;

  public static function getConn(){
    if(!isset(self::$instance)){
      self::$instance = new \PDO('mysql:host=localhost:3307;dbnme=cafe;charset=utf8','root','');
    }
    return self::$instance;
  }
}

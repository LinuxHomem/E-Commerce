<?php
  session_start();
  $_SESSION = array();
  session_destroy();
  header('Location: /E-Commerce/Src/User/View/index.php');

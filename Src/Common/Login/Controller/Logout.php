<?php
  $_SESSION = array();
  session_destroy();
  header('Location: /E-Commerce/Src/User/View/Index.php');

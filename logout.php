<?php
  session_start();

  unset($_SESSION["usuario"]);
  session_destroy();

  include_once "index.php";

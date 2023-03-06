<?php
  session_start();

  $_SESSION["fio_user"]="";
  $_SESSION["login"]=0;
  $_SESSION["text_error"]="";
  $_SESSION['res_kol']=0;

  setcookie("remember_me", "", time() - 3600);
  header ("Location: /");
?>
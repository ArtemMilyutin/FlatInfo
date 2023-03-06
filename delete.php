<?php
  session_start();
  if(empty($_SESSION["login"]) || $_SESSION["login"]==0)
  {
    $_SESSION["text_error"]="Пользователь не авторизован!";
    header ("Location: /");
  }
  include_once "link.php";

  if(empty($_GET["id"]) && $_SESSION["login"]!=0)
  {
      header ("Location: /view.php");
  }
  $query_delete = "delete from 'info_flats' where `id`=".$_GET["id"];
  $result_delete = mysqli_query($link, $query_delete) or die("Query failed : " . mysqli_error());

  header ("Location: /");
?>
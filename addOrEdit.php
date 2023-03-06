<?php
  session_start();
  if(empty($_SESSION["login"]) || $_SESSION["login"]==0)
  {
    $_SESSION["text_error"]="Пользователь не авторизован!";
    header ("Location: /");
  }
  include_once "link.php";

  $district = $_POST['district'];
  $adjacent = $_POST['adjacent'];
  $total_rooms = $_POST['total_rooms'];
  $area = $_POST['area'];
  $tel = $_POST['tel'];
            
  if($_GET['id']>0)
  {
    $query_update = "update info_flats set `district`='".$district."', `adjacent`='".$adjacent."', `total_rooms`='".$total_rooms."', `area`=".$area.", `tel`='".$tel."' where id=".$id;
    $result_update = mysqli_query($link, $query_update) or die("Query failed : " . mysqli_error());    
  }
  else
  {
    $query_insert = "insert into info_flats (`district`, `adjacent`, `total_rooms`, `area`, `tel`) VALUES ('".$district."', '".$adjacent."', '".$total_rooms."', '".$area."', '".$tel."')";
    $result_insert = mysqli_query($link, $query_insert) or die("Query failed : " . mysqli_error());
  }  
  header ("Location: /");
?>
<?php
  session_start();

  include_once "link.php";

  $login = $_POST['loginuser'];
  $pass = $_POST['pass'];
  if(empty($_POST['remember']))
  {
    $remember = 0;
  }
  else  $remember = 1;
  
  $textError="";

  $queryLogin = "select * from login where login='".$login."'";
  $resLogin = mysqli_query($link, $queryLogin) or die("Query failed : " . mysqli_error()); 
  
  if (mysqli_num_rows($resLogin) > 0) 
	{	
	  while($array = mysqli_fetch_array($resLogin))
	  {
      if( $array["password"]==$pass)
      {
        if(md5($_POST['norobot']) == $_SESSION['res_kol'])
				{
          if($remember==1)
          {
            setcookie("remember_me", $array["id"], time() + (1000 * 60 * 60 * 24 * 1));
          }
          else
          {
            setcookie("remember_me", "", time() - 3600);
          }
          $_SESSION["login"]=$array["id"];
          $_SESSION["fio_user"]=$array["username"];
          header ("Location: /view.php");   
        }
        else
				{
					$_SESSION["text_error"] = "Каптча введена не верно!";
					header ("Location: /index.php");
				}     
      }
      else
      {
        $_SESSION["text_error"] = "Не верный пароль!";
        header ("Location: /index.php");
      }
    }
  }
  else
  {
    $_SESSION["text_error"] = "Такого пользователя не существует!";
    header ("Location: /index.php");
  }
?>
<?php 
  session_start();

  if(isset($_COOKIE["remember_me"]) && !empty($_COOKIE["remember_me"]))
  {    
    $_SESSION["login"] = $_COOKIE["remember_me"];
  }
  else{
    $_SESSION["login"] = 0;
  }

  if(!empty($_SESSION["login"]) && $_SESSION["login"]!=0)
  {
    $_SESSION["text_error"]="";
    header ("Location: /view.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Авторизация</title>
</head>
<body>
  <form action="/login.php" method="POST">
    <div class="form" style="width: 20%; text-align:center">
      Логин:
      <input id="loginuser" name ="loginuser" class="input" required type="text" /><br><br>
      Пароль:
      <input id="pass" name="pass" class="input" required type="text" /><br><br>
      <input id="remember" name="remember"  type="checkbox" />Запомнить меня<br><br>
      <img src="captcha.php" style="margin-left: 10%; margin-right:10%;"/><br>      
      Введите символы черного цвета: <br>
      <input class="input" type="text" name="norobot" /><br>
      <span style="color:red;">
        <?php  
          echo (!empty($_SESSION["text_error"])) ? $_SESSION["text_error"]:""; 
          $_SESSION["text_error"]="";
        ?></span>
      <br>
      <input type="submit" value="Вход" class="button" />
      <input type="button"  class="button" onclick="location.href = '/registrationForm.php';" value="Регистрация" /> 
    </div>
  </form>
</body>
</html>
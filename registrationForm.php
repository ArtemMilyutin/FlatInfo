<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Регистрация</title>
</head>
<body>  
  <form action="/registration.php" method="POST">
    <div class="form" style="width: 13%; text-align:center">
      Логин:
      <input id="loginuser" name="loginuser" class="input" required type="text" /><br><br>
      Пароль:
      <input id="pass" name ="pass" class="input" required type="text" /><br><br>
      ФИО:
      <input id="fio" name ="fio" class="input" required type="text" /><br><br>
      <img src="captcha.php" style="margin-left: 20%; margin-right:20%;"/><br><br>
      Введите символы черного цвет: <br>
      <input class="input" type="text" name="norobot" /><br>
      <span style="color:red;">
        <?php  
          echo (!empty($_SESSION["reg_error"])) ? $_SESSION["reg_error"]:""; 
          $_SESSION["reg_error"]="";
        ?></span>
      <br>
      <div style="text-align: center">
        <input type="submit" value="Зарегистрироваться" class="button" />
        <input type="button"  class="button" onclick="location.href = '/';" value="Назад" />
      </div>
    </div>
  </form>
</body>
</html>
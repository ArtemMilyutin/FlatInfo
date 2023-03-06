<?php 
  session_start();
  if(empty($_SESSION["login"]) || $_SESSION["login"]==0)
  {
    $_SESSION["text_error"]="Пользователь не авторизован!";
    header ("Location: /");
  }
  include_once "link.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
    if(empty($_GET))
      $id=0;
    else
      $id=$_GET['id'];

    if($id>0)
    {
      $query = "select * from `info_flats` where `id`=".$id;            
      $res = mysqli_query($link, $query) or die("Query failed : " . mysqli_error());

      if (mysqli_num_rows($res) > 0) 
			{	
			  while($flat = mysqli_fetch_array($res))
			  {
          $district = $flat[1];
          $adjacent = $flat[2];
          $total_rooms = $flat[3];
          $area = $flat[4];
          $tel = $flat[5];          
        }
      }
      $nameButton="Редактировать";
    }
    else
    {
      $district = '';
      $adjacent = '';
      $total_rooms = '';
      $area = '';
      $tel = '';

      $nameButton="Добавить";
    }
  ?>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title><?php echo $nameButton;?></title>
</head>
<body>  
  <form action="/addOrEdit.php?id=<?php echo $id;?>" method="POST">
    <div class="form">
      Район: 
      <input id="district" name="district" class="input" required type="text" value="<?php echo $district;?>"/><br><br>
      Кол-во смежных комнат: 
      <input id="adjacent" name ="adjacent" class="input" required type="text" value="<?php echo $adjacent;?>"/><br><br>
      Общее кол-во комнат: 
      <input id="total_rooms" name ="total_rooms" class="input" required type="text" value="<?php echo $total_rooms;?>"/><br><br>
      Площадь: 
      <input id="area" name="area" class="input" required type="text" value="<?php echo $area;?>"/><br><br>
      Телефон: 
      <input id="tel" name="tel" class="input" required type="text" value="<?php echo $tel;?>"/>
      <br><br>
      <input type="submit" value="<?php echo $nameButton;?>" class="button" />
      <input type="button" onclick="window.location.href = '/';" value="Отмена" class="button" />
    </div>
  </form>
</body>
</html>
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
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Информация о квартирах</title>
</head>
<body>
  <div class="table" style="text-align: center;">
    <span><?php echo $_SESSION["fio_user"];?></span> &nbsp; &nbsp;&nbsp;    
    <a href="/logout.php" >Выход</a>
  </div>
  <div class="table" style="width:30%;text-align:left; border:0">
    <span style="font-size:20px">←</span><a href="/view.php" > На главную</a> <br>
  </div>
  <table class="table" id="table">
    <thead>
      <tr>
        <th colspan="5">Кол-во смежных комнат меньше или равно двум</th>
      </tr>
      <tr>
        <th>Район</th>
        <th style="width: 15%">Кол-во смежных комнат</th>
        <th style="width: 15%">Общее кол-во комнат</th>
        <th>Площадь</th>
        <th>Телефон</th>
      </tr>
    </thead>
    <tbody id="adjacent_rooms">      
      <?php
        $query = "select * from `info_flats`";            
        $res = mysqli_query($link, $query) or die("Query failed : " . mysqli_error());
        
        $lines_count = mysqli_num_rows($res);
        if ($lines_count > 0) 
			  {	
			    while($flat = mysqli_fetch_array($res))
			    {
            if(intval($flat[2])<=2)
              echo '<tr>
                      <td>'.$flat[1].'</td>
                      <td>'.$flat[2].'</td>
                      <td>'.$flat[3].'</td>
                      <td>'.$flat[4].'</td>
                      <td>'.$flat[5].'</td>                        
                    </tr>';
          }
        }
      ?>
    </tbody>
  </table>    
  <table class="table" id="table2">
    <thead>
      <th>Район</th>
      <th>Кол-во квартир с телефоном</th>
      <th>Процент квартир с телефоном</th>
    </thead>
    <tbody id="have_phone">      
      <?php        
        $query1 = "select * from `info_flats` where trim(`tel`) != '' and trim(`tel`) != '-'";            
        $res1 = mysqli_query($link, $query1) or die("Query failed : " . mysqli_error());

        $mass_district = array();
        $mass_kol_in_district = array();
        if ($lines_count > 0) 
			  {	
			    while($flat = mysqli_fetch_array($res1))
			    {
            $district = $flat[1];
            $phone = $flat[5];            
            $position = array_search(trim($district),$mass_district);
            if($position!=false)
            {
              $mass_kol_in_district[$position] = intval($mass_kol_in_district[$position])+1;
            }
            else
            {
              array_push($mass_district,$district);
              array_push($mass_kol_in_district,1);
            }
          }
        }      
        foreach($mass_district as $key=>$dist)
        {
          $kol = $mass_kol_in_district[$key];
          echo '<tr>
                  <td>'.$dist.'</td>
                  <td>'.$kol.'</td>
                  <td>'.($kol*100)/$lines_count.'</td>                       
                </tr>';
        }
      ?>
    </tbody>
  </table>    
</body>
</html>
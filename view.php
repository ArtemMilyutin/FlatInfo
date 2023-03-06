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
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
    <symbol id="edit">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </symbol>
    <symbol id="del">
      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
    </symbol>
  </svg>
</head>
<body>
  <div class="table" style="text-align: center;">
    <span><?php echo $_SESSION["fio_user"];?></span> &nbsp; &nbsp;&nbsp;    
    <a href="/logout.php" >Выход</a>
  </div>
  <div style="text-align: center; margin-bottom: 20px">
    <a href="/run.php" class="button">Выполнить</a>
    <a href="/addOrEditForm.php" class="button">Добавить</a>
  </div>
  <table class="table" id="table">
    <thead>
      <th>Район</th>
      <th style="width: 15%">Кол-во смежных комнат</th>
      <th style="width: 15%">Общее кол-во комнат</th>
      <th>Площадь</th>
      <th>Телефон</th>
      <th>Опции</th>
    </thead>
    <tbody>      
        <?php 
            $query = "select * from `info_flats`";            
            $res = mysqli_query($link, $query) or die("Query failed : " . mysqli_error());
            $resultHTML="";
            
            if (mysqli_num_rows($res) > 0) 
			    	{	
			    	  while($flat = mysqli_fetch_array($res))
			        {
                $resultHTML .= '<tr>
                                  <td>'.$flat[1].'</td>
                                  <td>'.$flat[2].'</td>
                                  <td>'.$flat[3].'</td>
                                  <td>'.$flat[4].'</td>
                                  <td>'.$flat[5].'</td>
                                  <td>
                                      <a href="/delete.php?id='.$flat[0].'" title="Удалить">
                                        <svg width="18" height="18" role="img" ><use xlink:href="#del"/></svg>
                                      </a><br> 
                                      <a href="/addOrEditForm.php?id='.$flat[0].'" title="Редактировать">
                                        <svg width="18" height="18" role="img" ><use xlink:href="#edit"/></svg>
                                      </a>
                                  </td>
                                </tr>';
              }
            }
            echo $resultHTML;
        ?>      
    </tbody>
  </table>
</body>
</html>
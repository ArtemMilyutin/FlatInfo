  <?php
    session_start();

    include_once "link.php";
    if($_POST['norobotreg']==$_SESSION['res_kol'])
    {
      if(!empty($_POST))
      {
        $login=$_POST["loginuser"];
        $pass=$_POST["pass"];
        $fio=$_POST["fio"];
      }
      else 
      {
        $_SESSION["reg_error"] = "Ошибка регистрации данных. Попробуйсте снова.";
        header ("Location: /registrationForm.php");
        die;
      }
    }
    else 
    {
      $_SESSION["reg_error"] = "Каптча введена не верно!";
      header ("Location: /registrationForm.php");
      die;
    }

    $queryReg = "select * from login where `login`='".$login."'";            
    $resReg = mysqli_query($link, $queryReg) or die("Query failed : " . mysqli_error());
    if (mysqli_num_rows($resReg) == 0) 
		{	
		  $queryInsert = "insert into login (`login`, `password`, `username`) VALUES ('".$login."', '".$pass."', '".$fio."')";
      $resInsert = mysqli_query($link, $queryInsert) or die("Query failed : " . mysqli_error());
      $_SESSION["reg_error"] = "";
      header ("Location: /");
    }
    else
    {
      $_SESSION["reg_error"] = "Такой пользователь уже существует.";
      header ("Location: /registrationForm.php");
    }
      
  ?>  
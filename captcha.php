<?php

session_start();
 
// создаем случайное число и сохраняем в сессии 
$permitted_chars = '023456789ABCDEFGHKLMNOPQRSTUVXYZ';
$randomnr = substr(str_shuffle($permitted_chars), 0, 6);
$good_rand  = "";
$res_kol  = "";
$index = rand(0,5);
$index2 = null ;
while($index2 == null)
{
	$new= rand(0,5);
	if($new != $index)
		$index2=$new;		
}
//создаем изображение
$im = imagecreatetruecolor(230, 70); 
//цвета:
$white = imagecolorallocate($im, 255, 255, 255);
$red = imagecolorallocate($im, 255, 0, 0);
$black = imagecolorallocate($im, 0, 0, 0);

imagefilledrectangle($im, 0, 0, 240, 70, $red);

$font = 'arial'; 
for($i=0;$i<6;$i++)
{
	$rotate=rand(40,-40);
	if($i!=$index && $i!= $index2)
	{
		$good_rand.=$randomnr[$i];
		$res_kol.=$randomnr[$i];
		if($i==0)
		{
			imagettftext($im, 28, $rotate, 27, 50, $black, $font, $randomnr[$i]);
		}
		else
		{
			imagettftext($im, 28, $rotate, ((32*($i+1))-5), 50, $black, $font, $randomnr[$i]);
		}
	}
	else
	{
		if($i==0)
		{
			imagettftext($im, 28, $rotate, 27, 50, $white, $font, $randomnr[$i]);
		}
		else
		{
			imagettftext($im, 28, $rotate, ((32*($i+1))-5), 50, $white, $font, $randomnr[$i]);
		}
	}
}
$_SESSION['res_kol'] = md5($res_kol);

// предотвращаем кэширование на стороне пользователя
header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//отсылаем изображение браузеру
header ("Content-type: image/gif");
imagegif($im);
imagedestroy($im);

?>
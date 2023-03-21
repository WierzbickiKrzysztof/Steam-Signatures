<?php
///////////////////////////////////////////////////////////////////////////////////////
/*
Steam Signature 0111 Beta 1.0 Build 1878
Działanie: Styl Error - wyświetlane podczas błędów; styl uniwersalny, napisy wyświetlane ze zmiennych

Changelog:
Przeniesiono na BitBucket

Copyright © Krzysztof "Danios512" Wierzbicki 2018
*/
///////////////////////////////////////////////////////////////////////////////////////

//Tło Błędu
$im = @imagecreatefrompng($images_path."/".$error_background_file);



///////Info o projekcie
//imagettftext($im, 10, 0, 430, 13, $text_admin, $font, $styleet1);
//imagettftext($im, 10, 0, 430, 28, $text_admin, $font, $styleet2);
//imagettftext($im, 10, 0, 396, 43, $text_admin, $font, $styleet3);
//imagettftext($im, 10, 0, 396, 73, $text_admin, $font, $styleet4);


$is = imagecreatefrompng($images_path."/".$additional_background_file);

imagecopy($im,$is,0,0,0,0,526,166); // 1 pozycja x, 2 y, 3 x(nie znane działanie), 4 y(nie znane działanie), 5 i 6 wymiary grafiki wczytywanej
imagedestroy($is);

//Pobranie i wklejenie avatara

// $is = imagecreatefromjpeg($linkavatar);
// imagecopy($im,$is,0,11,0,0,64,64); // 1 pozycja 0 albo 5 2 pozycja 11 albo 12
// imagedestroy($is);

//Poziom gracza

//Ostatnie gry

//Funkcja sprawdzenia czy grafika istnieje - kod znaleziony w internecie
function remote_file_exists($filename) {
$ch = curl_init($filename);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_exec($ch);
$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
return ($response_code == 200);
}


$font = $fonts_path."/OpenSans-Bold.ttf";


//Kolory
$text_color = imagecolorallocate($im, 255,255,255);
$text_vip = imagecolorallocate($im, 255,255,0);
$text_admin = imagecolorallocate($im, 255,0 ,0);
$text_nick = imagecolorallocate($im, 0,0,0);



imagettftext($im, 16, 0, 69, 29, $text_color, $font, $error1); //4 wartość była 40 - zmieniono z powodu nachodzenia nicku(najczęsciej z y i g) na range - jeszcze poprawić i dopasować






$color_status = imagecolorallocate($im, 87,203,222);//#57cbde // niebieski



imagettftext($im, 11.6, 0, 72, 49, $color_status, $font, $error2);

imagettftext($im, 11.6, 0, 76, 68, $color_status, $font, $error3);

imagettftext($im, 9.5, 0, 10, 109, $text_color, $font, $error4);

imagettftext($im, 9.5, 0, 10, 124, $text_color, $font, $error5);

imagettftext($im, 9.5, 0, 10, 139, $text_color, $font, $error6);


//Trzecia kolumna
imagettftext($im, 15.5, 0, 314, 112, $text_color, $font, "Level");

                    ////23




imagettftext($im, 15.5, 0, 406, 112, $text_color, $font, "3");  //405 albo 406








imagettftext($im, 9.5, 0, 317, 128, $text_color, $font, "Games: 0111");
imagettftext($im, 9.5, 0, 317, 143, $text_color, $font, "Badges: Half Life 3");
imagettftext($im, 9.5, 0, 317, 158, $text_color, $font, "Groups: Comfirmed");




/////////////Grupy 1 duża ikona////////////////////


// $grupa1 = $group1;
// $grupa01 = "tmp/loga/icongd".$groupid1.".jpg";
// //Sprawdzenie za pomocą funkcji czy grafika istnieje

// 	if(!file_exists($grupa01)){

// 		$image = imagecreatefromjpeg($grupa1);

// 		imagejpeg($image, $grupa01, 100);
// 		$is = imagecreatefromjpeg("$grupa01");
// 	}else{
// 		$is = imagecreatefromjpeg("$grupa01");
// 	}




imagecopy($im,$is,450,95,0,0,64,64); // 1 pozycja 0 albo 5 2 pozycja 11 albo 12
imagedestroy($is);



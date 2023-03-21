<?php
///////////////////////////////////////////////////////////////////////////////////////////
///////////                     Steam Signature                        ////////////////////
///////////                                                            ////////////////////
///////////                         Style 1                            ////////////////////
///////////                                                            ////////////////////
///////////        Copyright © Krzysztof Wierzbicki 2016-2020          ////////////////////
///////////////////////////////////////////////////////////////////////////////////////////



//Additional Background
$is = imagecreatefrompng($images_path."/".$additional_background_file);
imagecopy($im,$is,0,0,0,0,526,166);
imagedestroy($is);


//Avatar
$is = imagecreatefromjpeg($avatar_image_url);
imagecopy($im,$is,0,11,0,0,64,64);
imagedestroy($is);

//Level
if($level >= 0 && $level <= 9){
	$text_color_lvl = imagecolorallocate($im, 0,0,0);

}elseif($level >= 10 && $level <= 19){
	$text_color_lvl = imagecolorallocate($im, 180, 0, 30);

}elseif($level >= 20 && $level <= 29){
	$text_color_lvl = imagecolorallocate($im, 203, 33, 0);

}elseif($level >= 30 && $level <= 39){
	$text_color_lvl = imagecolorallocate($im, 254, 196, 0);

}elseif($level >= 40 && $level <= 49){
	$text_color_lvl = imagecolorallocate($im, 13, 81, 0);

}elseif($level >= 50 && $level <= 59){
	$text_color_lvl = imagecolorallocate($im, 255,255,255);

}elseif($level >= 50 && $level <= 59){
	$text_color_lvl = imagecolorallocate($im, 255,255,255);

}elseif($level >= 60 && $level <= 69){
	$text_color_lvl = imagecolorallocate($im, 255,255,255);

}elseif($level >= 70 && $level <= 79){
	$text_color_lvl = imagecolorallocate($im, 255,255,255);

}elseif($level >= 80 && $level <= 89){
	$text_color_lvl = imagecolorallocate($im, 255,255,255);

}elseif($level >= 90 && $level <= 99){
	$text_color_lvl = imagecolorallocate($im, 255,255,255);

}elseif($level >= 100 && $level <= 199){
	$text_color_lvl = imagecolorallocate($im, 255,255,255);

}else{
	$text_color_lvl = imagecolorallocate($im, 255,255,255);
}


//Last Activity

//Funkcja sprawdzenia czy grafika istnieje - kod znaleziony w internecie
	function remote_file_exists($filename) {
		$ch = curl_init($filename);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_exec($ch);
		$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return ($response_code == 200);
	}


//Get Images for Last Activity


function save_activity_image_on_server($last_activity_image, $last_activity_app_id){
	$last_activity_image_on_server = "tmp/last_activity/l_a_".$last_activity_app_id.".jpg";

	if(!file_exists($last_activity_image_on_server)){
		$width = 120;
		$height = 45;

		list($width_orig, $height_orig) = getimagesize($last_activity_image);

		$ratio_orig = $width_orig/$height_orig;

		if ($width/$height > $ratio_orig) {
			$width = $height*$ratio_orig;

		}else{
			$height = $width/$ratio_orig;
		}

		$image_p = imagecreatetruecolor($width, $height);

		$last_activity_image_explode = explode(".", $last_activity_image);

		if ($last_activity_image_explode[3] == "gif"){

			$image = imagecreatefromgif($last_activity_image);

		}else{
			$image = imagecreatefromjpeg($last_activity_image);
		}

		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		imagejpeg($image_p, $last_activity_image_on_server, 100);
		$is = imagecreatefromjpeg($last_activity_image_on_server);

	}else{
		$is = imagecreatefromjpeg($last_activity_image_on_server);
	}

	return $is;
}



//#1
$is = save_activity_image_on_server($last_activity_image_1, $last_activity_app_id_1);

imagecopy($im,$is,13,113,0,0,120,45);
imagedestroy($is);

//#2
$is = save_activity_image_on_server($last_activity_image_2, $last_activity_app_id_2);

imagecopy($im,$is,141,113,0,0,120,45);
imagedestroy($is);




//Font
$font = $fonts_path."/OpenSans-Bold.ttf";


//Colors
$text_color = imagecolorallocate($im, 255,255,255);
$text_vip = imagecolorallocate($im, 255,255,0);
$text_admin = imagecolorallocate($im, 87,203,222);
$text_nick = imagecolorallocate($im, 0,0,0);


//Nickname
imagettftext($im, 16, 0, 69, 29, $text_color, $font, $nickname);



if($status_steam == "Offline"){
	$color_status = imagecolorallocate($im, 137,137,137); //#898989 // szary

}elseif($status_steam == "Online"){
	$color_status = imagecolorallocate($im, 87,203,222);//#57cbde // niebieski

}else{
	$color_status = imagecolorallocate($im, 144,186,60); //#90ba3c // zielony

}


//Steam Status
imagettftext($im, 11.6, 0, 72, 49, $color_status, $font, $status_steam);
//Steam Status In-Game
imagettftext($im, 11.6, 0, 76, 68, $color_status, $font, $status_name_in_game);
//Last Activity text
imagettftext($im, 9.5, 0, 10, 109, $text_color, $font, "Ostatnia aktywność"); //Last activity
//Level text
imagettftext($im, 15.5, 0, 314, 112, $text_color, $font, "Poziom"); //Level
//Level
imagettftext($im, 15.5, 0, 406, 112, $text_color_lvl, $font, $level);  //405 albo 406
//Games
imagettftext($im, 9.5, 0, 317, 128, $text_color, $font, "Gry: ".$games_amount); //Games
//Badges
imagettftext($im, 9.5, 0, 317, 143, $text_color, $font, "Odznaki: ".$badges_amount); //Badges
//Groups
imagettftext($im, 9.5, 0, 317, 158, $text_color, $font, "Grupy: ".$groups_amount); //Groups

//Group image
$group_image_on_server = "tmp/groups/group_".$group_id_1.".jpg";
//Sprawdzenie za pomocą funkcji czy grafika istnieje

	if(!file_exists($group_image_on_server)){

		$image = imagecreatefromjpeg($group_image_1);

		imagejpeg($image, $group_image_on_server, 100);
		$is = imagecreatefromjpeg($group_image_on_server);
	}else{
		$is = imagecreatefromjpeg($group_image_on_server);
	}

imagecopy($im,$is,450,95,0,0,64,64);
imagedestroy($is);


// Dodatkowe napisy z Config

	imagettftext($im, 7, 0, 270, 17, $text_admin, $font, $style2t1);
	imagettftext($im, 7, 0, 270, 32, $text_admin, $font, $style2t2);
	imagettftext($im, 7, 0, 270, 47, $text_admin, $font, $style2t3);
	imagettftext($im, 7, 0, 270, 62, $text_admin, $font, $style2t4);
	imagettftext($im, 7, 0, 270, 77, $text_admin, $font, $style2t5);



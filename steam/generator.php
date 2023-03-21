<?php

///////////////////////////////////////////////////////////////////////////////////////////
///////////                     Steam Signature                        ////////////////////
///////////                                                            ////////////////////
///////////                 Main file - Generator                      ////////////////////
///////////                                                            ////////////////////
///////////        Copyright © Krzysztof Wierzbicki 2016-2020          ////////////////////
///////////////////////////////////////////////////////////////////////////////////////////


// ! Set header / Ustawienie headera !
header('Content-Type: image/png');


// ! Get information from URL / Pobranie wartości z URL !

//ID
$steam_id = $_GET['id'];
//Style
$style_id = $_GET['s'];
//Background
$background_id = $_GET['t'];


// ! Path files / Lokalizacje plików !
//Directory
$scripts_path = "scripts"; //Scripts
$styles_path = "styles/styles"; //Styles
$patterns_path = "styles/styles/patterns"; //Patterns
$images_path = "styles/images"; //Images
$fonts_path = "styles/fonts"; //Fonts

//File names
$background_file = "styles/images/background_".$style_id."_".$background_id.".png"; //File name for normal backgrounds
$error_background_file = "background_error.png"; //File name for error background
$additional_background_file = "additional_background.png"; //File name for additional background

//PHP files
$error_style_path = "styles/styles/style_error.php"; //Error Style
$normal_style_path = "styles/styles/style_".$style_id.".php"; //Normal Style


// ! Loading important scripts / Wczytywanie wymaganych skryptów !

//Config
require "scripts/config.php";

//Technical Break
if($technical_break == true){

	//Wczytanie Error 0 - Przerwa Techniczna
	$error1 = $error0t1;
	$error2 = $error0t2;
	$error3 = $error0t3;
	$error4 = $error0t4;
	$error5 = $error0t5;
	$error6 = $error0t6;
	require $error_style_path;


}else{  

	//TMP (on/off)
	if($tmp == true){
        //Stworzenie losowego ciągu znaków do nazwy
        $hash=md5($_SERVER['REQUEST_URI']);

        //Nazwa pliku z lokalizacją
        $filename="tmp/tmp_steam_".$hash.".png";

        if(file_exists($filename)){
            $ctime=filectime($filename);
            if(time()-$ctime<1800)  { //30 min
                readfile($filename);
                exit;
            }
            @unlink($filename);
        }
	}


	//Load API
    if($steam_id == 0){
        require "scripts/demo_api.php";
    }else{
        require "scripts/api.php";
    }



	//Check API work
	if($game_check == "Games"){
	    //Load MainScript
		require "scripts/mainscript.php";

	}else{
        //Error 1 - Private Profile or API doesn't work
        $error1 = $error1t1;
        $error2 = $error1t2;
        $error3 = $error1t3;
        $error4 = $error1t4;
        $error5 = $error1t5;
        $error6 = $error1t6;
        require $error_style_path;
		
	}

}

// ! Generate and display Signature / Kod odpowiadający za wyświetlenie grafiki !

if($tmp == false){ //TMP off

	imagepng($im);
	imagedestroy($im);
	//readfile($im);

	
}else{ //TMP on

	imagepng($im,$filename);
	imagedestroy($im);
	readfile($filename);

}


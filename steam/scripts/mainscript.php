<?php
///////////////////////////////////////////////////////////////////////////////////////////
///////////                     Steam Signature                        ////////////////////
///////////                                                            ////////////////////
///////////                     Main Script file                       ////////////////////
///////////                                                            ////////////////////
///////////        Copyright © Krzysztof Wierzbicki 2016-2020          ////////////////////
///////////////////////////////////////////////////////////////////////////////////////////


//Sprawdzanie Styli Standardowych
if(file_exists($normal_style_path)){

	if(file_exists($background_file)){

		$im = imagecreatefrompng($background_file);

		require $normal_style_path;


	}else{

		//Wczytanie Error 3 - Tło nie istnieje
		$error1 = $error3t1;
		$error2 = $error3t2;
		$error3 = $error3t3;
		$error4 = $error3t4;
		$error5 = $error3t5;
		$error6 = $error3t6;
		include "error.php";

	}



}else{

	//Wczytanie Error 2 - Styl nie istnieje
	$error1 = $error2t1;
	$error2 = $error2t2;
	$error3 = $error2t3;
	$error4 = $error2t4;
	$error5 = $error2t5;
	$error6 = $error2t6;
	include "error.php";

}


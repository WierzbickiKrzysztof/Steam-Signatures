<?php
///////////////////////////////////////////////////////////////////////////////////////////
///////////                     Steam Signature                        ////////////////////
///////////                                                            ////////////////////
///////////                          API                               ////////////////////
///////////                                                            ////////////////////
///////////        Copyright © Krzysztof Wierzbicki 2016-2020          ////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
	
	


//Simple HTML DOM
require "simple_html_dom.php";


file_put_contents('tmp/profile-'.$steam_id.'.html', file_get_contents('https://steamcommunity.com/profiles/'.$steam_id));
$html = file_get_html('tmp/profile-'.$steam_id.'.html'); // Link do profilu gracza


//Last Activity
//#1
$last_activity_link_1 = $html->find(".game_info_cap a",0)->href;
$last_activity_explode_1 = explode("/", $last_activity_link_1);
$last_activity_app_id_1 = $last_activity_explode_1[4]; //USE THIS in Styles

//#2
$last_activity_link_2 = $html->find(".game_info_cap a",1)->href;
$last_activity_explode_2 = explode("/", $last_activity_link_2);
$last_activity_app_id_2 = $last_activity_explode_2[4]; //USE THIS in Styles

//Last Activity Images
$last_activity_image_1 = $html->find(".game_info_cap a img",0)->src; //USE THIS in Styles
$last_activity_image_2 =  $html->find(".game_info_cap a img",1)->src; //USE THIS in Styles



//Games Amount
$games_amount = trim($html->find(".profile_count_link_total",1)->plaintext); //USE THIS in Styles

//Badges Amount
$badges_amount = trim($html->find(".profile_count_link_total",0)->plaintext); //USE THIS in Styles

//Groups Amount
$groups_amount = trim($html->find(".profile_count_link_total",5)->plaintext); //USE THIS in Styles


//Groups
$group_image_1 =  $html->find(".profile_group_avatar a img",0)->src; //USE THIS in Styles

$group_link_1 = $html->find(".profile_group_avatar a",0)->href;
$group_explode_1 = explode("/", $group_link_1);
$group_id_1 = $group_explode_1[4]; //USE THIS in Styles

//Avatar
$avatar_link = $html->find(".playerAvatarAutoSizeInner img",0)->src;
$avatar_explode = explode("_", $avatar_link);
$avatar_image_url = $avatar_explode[0]."_medium.jpg"; //USE THIS in Styles


//Status online, offilne, w grze

$status_name = $html->find(".profile_in_game_header",0)->plaintext;

if($status_name == "Currently Online"){
    $status_steam = "Online"; //USE THIS in Styles

}elseif($status_name == "Currently In-Game"){
    $status_steam = "W grze"; // Currently In-Game //USE THIS in Styles

}elseif($status_name == "In non-Steam game"){
    $status_steam = "W grze spoza Steam"; // In non-Steam game //USE THIS in Styles

}elseif($status_name == "Currently Offline"){
    $status_steam = "Offline"; //USE THIS in Styles

}else{
    $status_steam = "Error 404 :)"; //USE THIS in Styles
}


$status_name_in_game = $html->find(".profile_in_game_name",0)->plaintext; //USE THIS in Styles

if($status_name == "Currently Offline"){
    //$status_name_in_game_explode = explode(" ", $status_name_in_game);
    //$status_name_in_game = "Ostatnio online ".$status_name_in_game_explode[2]." h ".$status_name_in_game_explode[4]." min temu"; // Last online ".$status2_e[2]." h ".$status2_e[4]." min ago
}


//Nickname
$nickname = $html->find(".actual_persona_name",0)->plaintext; //USE THIS in Styles



//Level
$level = $html->find(".friendPlayerLevelNum",0)->plaintext; //USE THIS in Styles


//Zmienna do sprawdzania czy pozycja Games jest udostępniona na profilu
$game_check = trim($html->find(".count_link_label",1)->plaintext);

<?php
date_default_timezone_set('Asia/Tehran');
require 'vendor/autoload.php';
require_once 'lib/config.php';
	$data 		= json_decode(file_get_contents('php://input'), true);	//Recive Data From Bot
	$jsondata 	= file_get_contents('php://input');
	$client 	= new Zelenin\Telegram\Bot\Api($token);					//Create client Bot
	$chatid 	= $data['message']['chat']['id'];					//Parse Recived Data
	$text 		= $data['message']['text'];
	$messageid 	= $data['message']['message_id'];
	$updateid 	= $data['update_id'];
	$senderid 	= $data['message']['from']['id'];
	$datetime 		= $data['message']['date'];
		include 'lib/dbinsert.php';
			$dbdatachk = $db->where('senderid', $senderid);
			$userchk = $db->getOne ("imoein_senderid");
				if(($senderid == $userchk['senderid'])){			
					include 'inc/keyboard.php';
					include 'switch.php';
			}else{
					include 'default.php';
				}			
?>
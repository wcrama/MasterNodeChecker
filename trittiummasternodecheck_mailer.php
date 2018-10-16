<?php

// This is the URL for TRITTIUM MasterNode
$url = 'https://explorer.trittium.cc/ext/mn_list?_=1539677706210';

// This is the Public MasterNode Address
$token = 'TCiBdQaFM3SXRV96NEpQKi9Kh9kEcXrPXD';

// Load all data $url website
$json = file_get_contents($url);

// Decode JSON message
$dataset = json_decode($json,true);

// Skip to 'data' so array is possible
$dataset = $dataset['data'];

// This is for sending mail
$headers = 'From: masternode@checker.com' . "\r\n" .
			'Reply-To: masternode@checker.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

// Look through all data looking for $token, print details, then this script checks status:
// If Enabled then do nothing, if disabled i want to receive an email at THISISMY@EMAIL.COM !
foreach($dataset as $item){
	if($item['address'] == $token){
		echo $item['address'].' - '.$item['status'];
		if($item['status'] != 'ENABLED'){
			mail('THISISMY@EMAIL.COM','FILL IN SUBJECT','MASTERNODE IS OFFLINE',$headers);
		}
	}
}
?>

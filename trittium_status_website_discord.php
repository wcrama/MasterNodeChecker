<?php
// This script search $url for $public_address and shows $status
$url = 'https://explorer.trittium.cc/ext/mn_list?_=1539677706210';
$public_address = 'TCiBdQaFM3SXRV96NEpQKi9Kh9kEcXrPXD';
$json = file_get_contents($url);
$dataset = json_decode($json,true);
$dataset = $dataset['data'];
foreach($dataset as $item){
	if($item['address'] == $public_address){
		if($item['status'] == 'ENABLED'){
			$status = '<br><b><font color="green">Master Node is ONLINE !</font></b>';
		} else {
// Send Discord Message to Channel
			$curl = curl_init("https://discordapp.com/api/webhooks/0000000000000/TH1S1S$AMPL3C0DE0FD!$C0RDW3bh0OkS");
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array("content" => ":warning:  MN1 is OFFLINE  :warning:", "username" => "TRITTIUM MASTER NODE")));

            echo curl_exec($curl);
            $status = '<br><b><font color="red">Master Node is OFFLINE !</font></b>';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta http-equiv="refresh" content="60">
<title>MASTERNODE STATUS</title>
</head>
<body>
<!-- TRITTIUM LOGO BASE 64 -->
<img style='display:block; width:175px;height:50px;' id='base64image'                 
       src='data:image/jpeg;base64,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' 
	   />
<?php echo $status?>
</body>
</html>

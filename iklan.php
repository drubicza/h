<?php
error_reporting(0);
function signup($socks){
	$arr = array("\r","	");
	$url = "http://newapp.gonixend.com:80/api/v2/account.signUp.php";
	$h = explode("\n",str_replace($arr,"","Content-Type: application/x-www-form-urlencoded; charset=UTF-8
	User-Agent: Dalvik/2.1.0 (Linux; U; Android 8.1.0; Redmi 6 MIUI/V10.0.6.0.OCGMIFH)
	Host: newapp.gonixend.com
	Connection: Keep-Alive"));
	$get = file_get_contents("https://api.randomuser.me");
	$j = json_decode($get, true);
	$getName = $j['results'][0]['name']['first'];
	$getName2 = $j['results'][0]['name']['last'];
	$rand = rand(00,99);
	$email = $getName2.$rand."@gmail.com";
	$pass = 'a'.rand(0000,9999);
	$username = $getName.$rand."123";
	$body = "password=".$pass."&clientId=1&fullname=".$getName."%20".$getName2."&email=".$email."&username=".$getName2."&";
	return curl($url,$h,$body,$socks);
}
function curl($url,$h,$body,$socks=null){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	curl_setopt($ch, CURLOPT_PROXY, $socks);
	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$x = curl_exec($ch); curl_close($ch);
	return json_decode($x,true);
}
function refer($reff,$socks){
	$arr = array("\r","	");
	$data = signup($socks);
	$aid = $data['accountId'];
	$atok = $data['accessToken'];
	$user = $data['account'][0]['username'];
	$body = 'data={
	"clientId":"1",
	"accountId":"'.$aid.'",
	"accessToken":"'.$atok.'",
	"user":"'.$user.'",
	"name":"refer",
	"value":"'.$reff.'",
	"dev_name":"Redmi 6",
	"dev_man":"Xiaomi",
	"ver":"2.1",
	"pckg":"com.hols.app"
}&';
	$url = "http://newapp.gonixend.com:80/api/v2/account.Refer.php";
	$h = explode("\n",str_replace($arr,"","Content-Type: application/x-www-form-urlencoded; charset=UTF-8
	User-Agent: Dalvik/2.1.0 (Linux; U; Android 8.1.0; Redmi 6 MIUI/V10.0.6.0.OCGMIFH)
	Host: newapp.gonixend.com
	Connection: Keep-Alive"));
	return curl($url,$h,$body,$socks);
}
echo "Hols - Ganar Dinero\n";
echo "Thanks To : Muhammad Ikhsan Aprilyadi\n\n";
echo "Socks 5 : ";
$file = trim(fgets(STDIN));
echo "Reff : ";
$ref = trim(fgets(STDIN));
$socks = explode("\n",str_replace("\r","",file_get_contents($file))); $a=0;
while($a<count($socks)){
	$proxy = $socks[$a];
	$submit = refer($ref,$proxy)['response_title'];
	echo "[$a] $submit\n";
	$a++;
}
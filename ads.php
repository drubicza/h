<?php
function bngst($a,$id,$token,$user)
{
    $body = 'data={"clientId":"1","accountId":"'.$id.
            '","accessToken":"'.$token.
            '","user":"'.$user.
            '","name":"5","value":"Admob Video Credit","dev_name":"Redmi 6","dev_man":"Xiaomi","ver":"2.1","pckg":"com.hols.app"}&"';
    $ch   = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://newapp.gonixend.com:80/api/v2/account.Reward.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    $headers   = array();
    $headers[] = "User-Agent: Dalvik/2.1.0 (Linux; U; Android 8.1.0; Redmi 6 MIUI/V10.0.6.0.OCGMIFH)";
    $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    return $result;
}

function njing($a,$id,$token,$user)
{
    $body = 'data={"clientId":"1","accountId":"'.$id.
            '","accessToken":"'.$token.
            '","user":"'.$user.
            '","ver":"2.1","pckg":"com.hols.app"}&"';
    $ch   = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://newapp.gonixend.com:80/api/v2/account.Balance.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    $headers   = array();
    $headers[] = "User-Agent: Dalvik/2.1.0 (Linux; U; Android 8.1.0; Redmi 6 MIUI/V10.0.6.0.OCGMIFH)";
    $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    return $result;
}

print "Hols - Ganar Dinero\n";
print "Thanks To : Muhammad Ikhsan Aprilyadi\n\n";

echo "accountId : ";
$id = trim(fgets(STDIN));

echo "accessToken : ";
$token = trim(fgets(STDIN));

echo "user : ";
$user = trim(fgets(STDIN));

echo "Jumlah   : ";
$jum = trim(fgets(STDIN));

echo "\x1b[0m\n";
echo "Sedang login...\n\n";

for ($a = 1; $a < $jum; $a++) {
    sleep(4);
    $pertama = json_decode(bngst($a, $id, $token, $user));
    $kedua   = json_decode(njing($a, $id, $token, $user));
    $data    = $pertama->error_description;
    $data2   = $kedua->user_balance;

    echo "[+] ".$data." - ".$data2." [+]\n";
}
?>

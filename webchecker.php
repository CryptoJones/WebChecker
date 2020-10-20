<?php
$url = "http://www.cryptospace.com/";
check_site($url);

function check_site() {
    global $url;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //because SSL is self-signed
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    $final_data = substr($data, 0, 8);
    if(stripos($data, "HTTP/1.1")!== false){
        //do nothing
    } else{
        $to = "7035551212@vtext.com";
        $subject = "Website Down";
        $body = "{$url} is down!";
        mail ($to, $subject, $body);
        }
}
?>

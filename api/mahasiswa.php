<?php

function http_request($url){
    // persiapkan curl
    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, $url);

    // return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string
    $output = curl_exec($ch);

    // tutup curl
    curl_close($ch);

    // mengembalikan hasil curl
    return $output;
}

$profile = http_request("http://localhost/soa/api/Mahasiswa");

// ubah string JSON menjadi array
$profile = json_decode($profile, TRUE);

echo "<pre>";
print_r($profile);
echo "</pre>";

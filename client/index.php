<?php

/**
 * Method: POST, PUT, GET etc
 * data: array("param" => "value") ==> index.php?param=value
 */
function callAPI($method, $url, $data = false)
{
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

$url = "http://localhost/rest_test/api/monapi.php";

$infos = array(
    'table' => 'produit',
    'id' => 3
);

echo(callAPI('GET', $url, $infos)."<br>");
echo(callAPI('POST', $url, $infos)."<br>");
echo(callAPI('PUT', $url, $infos)."<br>");
echo(callAPI('DELETE', $url, $infos));
<?php

header('Content-Type: application/json');

$table = filter_input(INPUT_GET, 'table', FILTER_SANITIZE_STRING) ??
        filter_input(INPUT_POST, 'table', FILTER_SANITIZE_STRING);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ??
        filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
function reponse($code, $message, $result=""){
    $retour = array(
        'code' => $code,
        'message' => $message,
        'result' => $result
    );
    echo json_encode($retour, JSON_UNESCAPED_UNICODE);
}

switch($_SERVER['REQUEST_METHOD']){
    case 'GET': // récupération
        reponse('200', 'OK', "GET table=$table id=$id");
        break;
    case 'POST': // ajout
        reponse('200', 'OK', "POST table=$table id=$id");
        break;
    case 'PUT': // modification
        reponse('200', 'OK', "PUT table=$table id=$id");
        break;
    case 'DELETE': // supression
        reponse('200', 'OK', "DELETE table=$table id=$id");
        break;
}

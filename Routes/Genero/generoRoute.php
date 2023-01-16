<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: *');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require_once "./../../Controller/GeneroController.php";

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET')
{
}

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST')
{
    $registro = new GeneroController();
    if (empty($_POST)) {
        $data = [
            'status' => 405,
            'message' => 'Methodo not allowed'
        ];
        header("HTTP/1.1 405 Methodo not allowed");
        echo json_encode($data);
    } else {
        $registro->saveGenero($_POST);
    } 
}
<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: *');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require_once "./../../Controller/PersonaController.php";

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET')
{
    $registro = new PersonaController();
    if (empty($_GET)) {
        $data = [
            'status' => 405,
            'message' => 'Method not allowed'
        ];
        header("HTTP/1.1 405 Method not allowed");
        echo json_encode($data);
    } else {
        $registro->loginGet($_GET);
    }
}

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST')
{
    $registro = new PersonaController();
    if (empty($_POST)) {
        $data = [
            'status' => 405,
            'message' => 'Methodo not allowed'
        ];
        header("HTTP/1.1 405 Methodo not allowed");
        echo json_encode($data);
    } else {
        $registro->loginPost($_POST);
    }
    
}
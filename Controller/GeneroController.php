<?php

 require_once "./../../Model/GeneroModel.php";

 class GeneroController{
    public function saveGenero($json)
    {
        //&& preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $json['json'])
        if(isset($json['json'])){
            $objJson = json_decode($json['json']);
            $result = GeneroModel::saveGenero($objJson);
            $this->fnReturnJson(200, $result);
        }else{
            $this->fnReturnJson(422, null);
            exit();
        }
    }

    public function fnReturnJson($status, $objeto)
    {
        switch($status)
        {
            case 200:
                $data = array(
                    "status" => $status,
                    "message" => 'Success',
                    "result" => $objeto
                );
                echo json_encode($data, http_response_code($data["status"]));
                break;
            case 422:
                $data = array(
                    'status' => $status,
                    'message' => 'Data is wrong',
                );
                echo json_encode($data, http_response_code($data["status"]));
                break;
            case 500:
                $data = [
                    'status' => $status,
                    'message' => 'Internal Server Error'
                ];
                echo json_encode($data, http_response_code($data["status"]));
                break;
        }

    }

 }





 
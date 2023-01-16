<?php

class TestController
{
    public function read()
    {
        $json = array(
            "detalle" => "Exito"
        );
        echo json_encode($json, true);
        return;
    }
}
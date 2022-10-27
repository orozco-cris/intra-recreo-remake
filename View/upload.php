<?php


    date_default_timezone_set('America/Guayaquil');
    $hoy = getdate();
    $dia = $hoy["mday"];
    $mes = $hoy["mon"];
    $anio = $hoy["year"];
    $circular_codigo = "".$hoy["year"].$hoy["mon"] . $hoy["mday"] . $hoy["hours"] . $hoy["minutes"] . $hoy["seconds"] ."";
    $hora = $hoy["hours"] . ":" . $hoy["minutes"] . ":" . $hoy["seconds"];

    if(!empty($_FILES['file']['name'])){
        $tamano = $_FILES['file']['size'];
        if($tamano<32649899){
            $uploaddir = '../Resources/uploads/';
            $imageFileType = strtolower(pathinfo(basename($_FILES["file"]["name"]), PATHINFO_EXTENSION));
            $target_file = $uploaddir . $circular_codigo . ".".$imageFileType;
            // $uploadfile = $uploaddir . basename($_FILES['userfile']['name']) . "." . $imageFileType;
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                echo $circular_codigo.".".$imageFileType;
                return $circular_codigo;
            }else{
                $circular_codigo="";
                echo $circular_codigo;
            return  $circular_codigo;
            }

        }else{
            $circular_codigo="";
            echo $circular_codigo;
            return  $circular_codigo;
        }
    }
    else {
    $circular_codigo="";
    return  $circular_codigo;
    }


   
?>
<?php









    if(!empty($_FILES['file']['name'])){
        $nombre = $_GET['foo'];
        echo $nombre;
        $nombre=strtolower($nombre);
        $tamano = $_FILES['file']['size'];
        if($tamano<32649899){
            $uploaddir = '../Resources/uploads/';
            $imageFileType = strtolower(pathinfo(basename($_FILES["file"]["name"]), PATHINFO_EXTENSION));
            $target_file = $uploaddir . $nombre . ".".$imageFileType;
            // $uploadfile = $uploaddir . basename($_FILES['userfile']['name']) . "." . $imageFileType;
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                $nombre= $nombre.".".$imageFileType;
                return $nombre;
            }else{
                $nombre="";
            return  $nombre;
            }

        }else{
            $nombre="";
            return  $nombre;
        }
    }
    else {
    $nombre="";
    return  $nombre;
    }


   
?>
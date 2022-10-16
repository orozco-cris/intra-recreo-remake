<?php
if(!empty($_FILES['file']['name'])){
    $tamano = $_FILES['file']['size'];
    echo "tamaño";
    echo $tamano;
  if($tamano<3264989){
    if(move_uploaded_file($_FILES['file']['tmp_name'],"../Resources/uploads/".$_FILES['file']['name'])){
        echo "Archivo subido correctamente";
        return 1;
    }else{
         echo "Ocurrió algunos problemas. Inténtelo más tarde.";
        return 0;
    }
   
}else{
    echo "Imagen sobrepasa el peso permitido";
    return 0;
}
}

?>
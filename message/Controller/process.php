<?php

require_once './controllEmail.php';

//require '../libMail/vendor/autoload.php';
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

include '../Controller/info_desk.php';

$id= $_POST["id_ser"];

if(isset($_POST["service"])){
    $trol = $_POST["service"];
    switch ($trol){
        case "0":
            $id = 1;
            break;
        case "1":
            $id = 2;
            break;
        case "2":
            $id = 3;
            break;
        case "3":
            $id = 4;
            break;
        case "Desing y desarrollo web":
            $id = 1;
            break;
        case "Gestion de redes sociales":
            $id = 2;
            break;
        case "Marketing Digital":
            $id = 3;
            break;
        case "Branding y desing":
            $id = 4;
            break;
    }
}

//QUITAMOS MESA Y RESPUESTA, PARA Q NO SE SOBRESCRIBAN EL MENSAJE POR CORREOS:

// $mesa1 = SendMessage($menssage[0][$id-1],$imagenes_main[0][$id-1],$title[0][$id-1]);
$mesa2 = SendMessage($menssage[1][$id-1],$imagenes_main[1][$id-1],$title[1][$id-1]);
// $mesa3 = SendMessage($menssage[2][$id-1],$imagenes_main[2][$id-1],$title[2][$id-1]);



$email = $_POST["email"];

        
$respuesta2 = mainController::funcionName($title[1][$id-1],$email,$mesa2);
    
        
        
    

        



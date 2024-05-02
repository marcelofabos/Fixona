<?php
include "conexion.php";

$conexion = new Conexion();
$cnx = $conexion->Conectar();

// Evitar inyección SQL utilizando prepared statements
$getMesg = $_POST['text'];

// Comprobando la consulta del usuario en la base de datos
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE ?";
$stmt = $cnx->prepare($check_data);

// Ejecutar la consulta con el valor proporcionado
$stmt->execute(["%$getMesg%"]);

// Si hay resultados, devolver la respuesta del chatbot
if ($stmt->rowCount() > 0) {
    $fetch_data = $stmt->fetch(PDO::FETCH_ASSOC);
    $respuesta = $fetch_data['replies'];
    echo $respuesta;
} else {
    // Si no hay resultados, devolver un mensaje alternativo
    echo "¡Lo siento, no puedo ayudarte con este inconveniente! Favor comunícate con el administrador en el siguiente enlace:
            </br><a href='https://wa.me/51940759137?text=LEDER tengo una duda... Culturisame'>Contacto</a>";
}
?>

<?php

header('Content-Type: application/json');

require_once 'responses/nuevoResponse.php';
require_once 'request/nuevoRequest.php';
require_once '../GS2-Ej-17/modelo/listMediosContacto.php';
require_once '../GS2-Ej-17/modelo/vehiculo.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

if ($Siniestro->NroPoliza >1000 && $Siniestro->NroPoliza<0 ) {
    # code...
}


echo json_encode($resp);
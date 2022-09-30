
<?php

header('Content-Type: application/json');

require_once 'responses/nuevoResponse.php';
require_once 'request/nuevoRequest.php';


$json = file_get_contents('php://input', true);
$req = json_decode($json);

$resp = new NuevoResponse();
$resp->IsOk = true;



if ($req->NroPoliza > 1000 or $req->NroPoliza < 0) {
    $resp->IsOk = false;
    $resp->Mensaje[] = "La póliza no existe";
} else {
    if ($req->Vehiculo == null) {
        $resp->IsOk = false;
        $resp->Mensaje[] = "Debe indicar el vehículo";
    }
    if ($req->Vehiculo->Marca == null or $req->Vehiculo->Modelo == null or $req->Vehiculo->Version == null or $req->Vehiculo->Anio == null) {
        $resp->IsOk = false;
        $resp->Mensaje[] = "Debe indicar todas las propiedades del vehiculo";
    }
    if ($req->ListMediosContacto == null) {
        $resp->IsOk = false;
        $resp->Mensaje[] = "Debe indicar al menos un medio de contacto";
    }else {
        foreach ($req->ListMediosContacto as $mc) {
            if ($mc->MedioContactoDescripcion != 'Celular' or  $mc->MedioContactoDescripcion != 'Email') {
                $resp->IsOk = false;
                $resp->Mensaje[] = "Debe indicar medios de contacto válidos";
            }
        }
    }

}


echo json_encode($resp);
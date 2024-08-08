<?php
//recibir un json
$inputJSON = file_get_contents('php://input');

if ($inputJSON) {
    $data = json_decode($inputJSON, true);

    //verificamos para saber si el json tiene un dato
    if (isset($data['dato']) && strlen($data['dato']) === 8 && ctype_digit($data['dato'])) {

        // Datos
        $token = 'apis-token-7965.B9KHGPZuU49jyb7VyHOBX86Wy'; //crear tu cuenta en apis net y generar tu propio token
        $dni = $data['dato'];

        // Iniciar llamada a API
        $curl = curl_init();

        // Buscar dni
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: https://apis.net.pe/consulta-dni-api',
                'Authorization: Bearer ' . $token
            ),
        ));

        $response = curl_exec($curl);
        echo $response;
        // curl_close($curl);
        // // Datos listos para usar
        // $persona = json_decode($response);
        // var_dump($persona);

    } else {
        //respuesta DNI para campos faltantes
        $response = array('error' => false, 'message' => 'El dni recibido no contiene 8 digitos');
        echo json_encode($response);

    }

}else{
    //en caso de que no recibio ningun dni
    $response = array('error' => false, 'message' => 'no se recibio un json');
        echo json_encode($response);
}

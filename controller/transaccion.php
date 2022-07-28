<?php
if($_SERVER['REQUEST_METHOD']=== 'OPCIONS'){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Transaccion.php");

    $transaccion = new Transaccion();
    $body = json_decode(file_get_contents("php://input"), true);
    switch($_GET["opc"]){
        case "Gettransaccions":
            $datos=$transaccion->get_transaccions();
            echo json_encode($datos);
        break;
            case "Gettransaccion":
                $datos=$transaccion->get_transaccion($body["Codigo_transaccion"]);
                echo json_encode($datos);
            break;

            case "InsertTransaccion":
                $datos=$transaccion->insert_transaccion($body["Codigo_transaccion"],$body ["Tipo_transaccion"],$body ["Cod_cliente"],$body ["Fecha_transaccion"],$body ["Monto_transaccion"],$body ["Sucursal"],$body ["Num_cuenta"]);
                echo json_encode("Nueva Transacción Agregada Correctamente");

            break;

            case "UpdateTransaccion":
                $datos=$transaccion->update_transaccion($body["Codigo_transaccion"],$body ["Tipo_transaccion"],$body ["Cod_cliente"],$body ["Fecha_transaccion"],$body ["Monto_transaccion"],$body ["Sucursal"],$body ["Num_cuenta"]);
                echo json_encode("Datos Transacción Actualizados Correctamente");

            break;

            case "DeleteTransaccion":
                $datos=$transaccion->delete_transaccion($body["Codigo_transaccion"]);
                echo json_encode("Datos de Transacción Eliminados Correctamente");

            break;


    }



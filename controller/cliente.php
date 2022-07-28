<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Cliente.php");

    $cliente = new Cliente();
    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]) {
        case "GetClientes":
            $datos = $cliente->get_clientes();
            echo json_encode($datos);
            break;
        case "GetCliente":
            $datos = $cliente->get_cliente($body['numeroCliente']);
            echo json_encode($datos);
             break;
        case "InsertCliente":
            $datos = $cliente->insert_cliente($body['nombres'], $body['apellidos'], $body['rtn'], $body['saldoActual'], $body['numeroCuenta']);
            echo json_encode("Nuevo Cliente Agregado Correctamente");
            break;
        case "UpdateCliente":
            $datos = $cliente->update_cliente($body['numeroCliente'], $body['nombres'], $body['apellidos'], $body['rtn'], $body['saldoActual'], $body['numeroCuenta']);
            echo json_encode("Datos del Cliente Actualizado");
            break;
        case "DeleteCliente":
            $datos = $cliente->delete_cliente($body['numeroCliente']);
            echo json_encode("Datos de Cliente Eliminados");
            break;
       }
?>
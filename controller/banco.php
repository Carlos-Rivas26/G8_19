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
    require_once("../models/Banco.php");

    $banco = new Banco();
    $body = json_decode(file_get_contents("php://input"), true);


    switch($_GET["opc"]){

        case "Getbancos":
        $datos=$banco->get_bancos();
        echo json_encode($datos);
         break;

         case "Getbanco":
            $datos=$banco->get_banco($body["Codigo_Banco"]);
            echo json_encode($datos);
             break;

             case "InsertBanco":
                $datos=$banco->insert_banco($body[ "Codigo_Banco"],$body ["Nombre_Banco"],$body[ "Oficina_Principal"],$body ["Cantidad_Sucursales"],$body["Fecha_Fundacion"],$body["Pais"],$body["RTN"]);
                echo json_encode("Nuevo Banco Agregado Correctamente");
                 break;

             case "UpdateBanco" :
                $datos=$banco->Update_Banco($body[ "Codigo_Banco"],$body ["Nombre_Banco"],$body[ "Oficina_Principal"],$body ["Cantidad_Sucursales"],$body["Fecha_Fundacion"],$body["Pais"],$body["RTN"]);
                echo json_encode("Datos Banco Actualizado");
            break;

            case "DeleteBanco":
                $datos=$banco->delete_Banco($body["Codigo_Banco"]);
                echo json_encode("Datos de Banco Eliminados");
            break;

       }



?>
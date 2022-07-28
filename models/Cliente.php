<?php

class Cliente extends conectar
{
    public function get_clientes()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM clientes";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_cliente($numeroCliente)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM clientes WHERE numeroCliente=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $numeroCliente);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_cliente($nombres, $apellidos, $rtn, $saldoActual, $numeroCuenta)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO clientes(nombres, apellidos, rtn, saldoActual, numeroCuenta)
                VALUES (?, ?, ?, ?, ?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombres);
        $sql->bindValue(2, $apellidos);
        $sql->bindValue(3, $rtn);
        $sql->bindValue(4, $saldoActual);
        $sql->bindValue(5, $numeroCuenta);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_cliente($numeroCliente)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM clientes WHERE numeroCliente=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $numeroCliente);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_cliente($numeroCliente, $nombres, $apellidos, $rtn, $saldoActual, $numeroCuenta)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE clientes 
                SET nombres = ?, apellidos = ?, rtn = ?, saldoActual = ?, numeroCuenta = ?
                WHERE numeroCliente = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombres);
        $sql->bindValue(2, $apellidos);
        $sql->bindValue(3, $rtn);
        $sql->bindValue(4, $saldoActual);
        $sql->bindValue(5, $numeroCuenta);
        $sql->bindValue(6, $numeroCliente);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
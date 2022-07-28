<?php
class transaccion extends Conectar{
    public function get_transaccions(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM transaccion ";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_transaccion($Codigo_transaccion){
        $conectar= parent::conexion();
        parent:: set_names();
        $sql="SELECT * FROM transaccion WHERE  Codigo_transaccion=?";
        $sql=$conectar->prepare($sql);
        $sql ->bindvalue(1, $Codigo_transaccion);
        $sql ->execute();
        return $resultado=$sql ->fetchAll(PDO:: FETCH_ASSOC);
    }

    public function insert_transaccion($Codigo_transaccion, $Tipo_transaccion, $Cod_cliente, $Fecha_transaccion, $Monto_transaccion, $Sucursal, $Num_cuenta){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO Transaccion(Codigo_transaccion,Tipo_transaccion,Cod_cliente,Fecha_transaccion,Monto_transaccion,Sucursal,Num_cuenta)
        VALUES (?,?,?,?,?,?,?);";
        $sql=$conectar ->prepare($sql);
        $sql ->bindvalue(1, $Codigo_transaccion); 
        $sql ->bindvalue(2, $Tipo_transaccion); 
        $sql ->bindvalue(3, $Cod_cliente); 
        $sql ->bindvalue(4, $Fecha_transaccion); 
        $sql ->bindvalue(5, $Monto_transaccion); 
        $sql ->bindvalue(6, $Sucursal); 
        $sql ->bindvalue(7, $Num_cuenta);
        $sql ->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_transaccion($Codigo_transaccion, $Tipo_transaccion, $Cod_cliente, $Fecha_transaccion, $Monto_transaccion, $Sucursal, $Num_cuenta){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE Transaccion SET Tipo_transaccion=? ,Cod_cliente=? ,Fecha_transaccion=? ,Monto_transaccion=? ,Sucursal=?, Num_cuenta=? WHERE Codigo_transaccion=?"; 
        $sql=$conectar ->prepare($sql);
        $sql ->bindvalue(1, $Tipo_transaccion); 
        $sql ->bindvalue(2, $Cod_cliente); 
        $sql ->bindvalue(3, $Fecha_transaccion); 
        $sql ->bindvalue(4, $Monto_transaccion); 
        $sql ->bindvalue(5, $Sucursal); 
        $sql ->bindvalue(6, $Num_cuenta);
        $sql ->bindvalue(7, $Codigo_transaccion);
        $sql ->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);   
    }

    public function delete_transaccion($Codigo_transaccion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM Transaccion WHERE Codigo_transaccion=?";
        $sql=$conectar ->prepare($sql);
        $sql->bindValue(1, $Codigo_transaccion);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}
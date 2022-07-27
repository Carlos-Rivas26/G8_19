<?php
class banco extends Conectar{

    public function get_bancos(){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT * FROM banco ";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); }
       
    public function get_banco($Codigo_Banco) {
        $conectar= parent::conexion() ;
        parent::set_names();
        $sql="SELECT * FROM banco WHERE Codigo_Banco=?";
        $sql=$conectar->prepare($sql);
        $sql->bindvalue(1, $Codigo_Banco);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_banco($Codigo_Banco, $Nombre_Banco, $Oficina_Principal, $Cantidad_Sucursales, $Fecha_Fundacion, $Pais, $RTN){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO banco(Codigo_Banco, Nombre_Banco, Oficina_Principal, Cantidad_Sucursales, Fecha_Fundacion, Pais, RTN)
        VALUES (?, ?, ?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindvalue(1, $Codigo_Banco);
        $sql->bindvalue(2, $Nombre_Banco );
        $sql->bindvalue(3, $Oficina_Principal);
        $sql->bindvalue(4, $Cantidad_Sucursales);
        $sql->bindvalue(5, $Fecha_Fundacion);
        $sql->bindvalue(6, $Pais);
        $sql->bindvalue(7, $RTN);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Update_Banco($Codigo_Banco, $Nombre_Banco, $Oficina_Principal, $Cantidad_Sucursales, $Fecha_Fundacion, $Pais, $RTN){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE banco SET  Nombre_Banco=? , Oficina_Principal=? ,Cantidad_Sucursales=?, Fecha_Fundacion=? , Pais=? , RTN=?   WHERE Codigo_Banco=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindvalue(1, $Nombre_Banco );
        $sql->bindvalue(2, $Oficina_Principal);
        $sql->bindvalue(3, $Cantidad_Sucursales);
        $sql->bindvalue(4, $Fecha_Fundacion);
        $sql->bindvalue(5, $Pais);
        $sql->bindvalue(6, $RTN);
        $sql->bindvalue(7, $Codigo_Banco);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_Banco($Codigo_Banco){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM banco  WHERE Codigo_Banco = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Codigo_Banco);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
  }

?>
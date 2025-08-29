<?php
  class Producto extends Conectar{
    public function get_productos(){
        $conectar= parent::Conexion();
        parent::set_names();
        $sql="SELECT * FROM tm_productos";
        $sql=$conectar->prepare($sql);
        $sql-> execute();
        return $resultado=$sql->fetchAll();
    }

public function get_productos_x_id($prod_id){
        $conectar= parent::Conexion();
        parent::set_names();
        $sql="SELECT * FROM tm_productos WHERE prod_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$prod_id);
        $sql-> execute();
        return $resultado=$sql->fetchAll();
    }
    
  }
    
?>
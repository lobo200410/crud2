<?php
class Producto extends Conectar{
    // Constructor para asegurar que la conexión se establezca al crear una instancia
    public function __construct(){
        $this->Conexion();
        $this->set_name();
    }
    
    public function get_producto(){
        try {
            $sql = "SELECT * FROM tm_producto WHERE est=1";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en get_producto: " . $e->getMessage());
            return [];
        }
    }
    
    public function get_producto_x_id($prod_id){
        try {
            $sql = "SELECT * FROM tm_producto WHERE prod_id = ?";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(1, $prod_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en get_producto_x_id: " . $e->getMessage());
            return [];
        }
    }
    
    public function delete_producto($prod_id){
        try {
            $sql = "UPDATE tm_producto SET est = 0, fech_elim = now() WHERE prod_id = ?";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(1, $prod_id);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("Error en delete_producto: " . $e->getMessage());
            return 0;
        }
    }
    
    public function insert_producto($prod_nom){
        try {
            $sql = "INSERT INTO tm_producto (prod_nom, fech_crea, est) VALUES (?, now(), 1)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(1, $prod_nom);
            $stmt->execute();
            return $this->dbh->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error en insert_producto: " . $e->getMessage());
            return 0;
        }
    }
    
    public function update_producto($prod_id, $prod_nom){
        try {
            $sql = "UPDATE tm_producto SET prod_nom = ?, fech_modi = now() WHERE prod_id = ?";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(1, $prod_nom);
            $stmt->bindValue(2, $prod_id);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("Error en update_producto: " . $e->getMessage());
            return 0;
        }
    }

    
}
?>
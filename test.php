<?php
require_once __DIR__ . '/config/conexion.php';


$conectar = new Conectar();
$conexion = $conectar->Conexion();

if ($conexion) {
    echo "✅ Conexión exitosa a la base de datos.";
    // Opcional: prueba un query
    $stmt = $conexion->query("SELECT DATABASE()");
    $row = $stmt->fetch();
    echo "<br>Base de datos actual: " . $row[0];
} else {
    echo "❌ Error en la conexión.";
}
?>

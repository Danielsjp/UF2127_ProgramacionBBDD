<?php
//C:\xampp\php\php.exe -S localhost:8000
// Datos de acceso a la base de datos
$host = "127.0.0.1";
$database = "colores";
$database = "biblioteca";
$port = 3307;
$user = "root";
$password = "root";


try {
    // Crear una conexión a la base de datos pdo
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $password);
    // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    foreach ($conn->query('SELECT * FROM usuarios') as $fila) {
        echo "<pre>";
        print_r($fila['nombre_usuario']);
        echo "</pre>";
    }
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>
<?php

// echo "Soy index.php";
// include 'connection.php';
// require 'connection.php';
// include_once 'connection.php';

require_once 'connection.php';

// 1. Definir la sentencia (query)
$select = "SELECT * FROM colores;";
// 2. Preparar la sentencia
$select_pre = $conn->prepare($select);
// 3. Ejecutar la sentencia
$select_pre-> execute();
// 4. Obtener los resultados
$arraY_filas = $select_pre->fetchAll(PDO::FETCH_ASSOC);
?>  
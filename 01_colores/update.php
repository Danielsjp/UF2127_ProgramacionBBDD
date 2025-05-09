<?php

require_once 'connection.php';

// 1. Definir la sentencia preparada
$update = "update FROM colores WHERE id_color = ?;";
// 2. Preparar la sentencia
$update_pre = $conn->prepare($delete);
// 3. Ejecutar la sentencia
$update_pre->execute([$_GET['id']]);

$update_pre = null;
$conn = null;

header('location: index.php');
<?php
require_once 'connection.php';

// 1. Definir la sentencia preparada
$delete = "DELETE FROM colores WHERE id_color = ?;";
// 2. Preparar la sentencia
$delete_pre = $conn->prepare($delete);
// 3. Ejecutar la sentencia
$delete_pre->execute([$_GET['id']]);

$insert_pre = null;
$conn = null;

header('location: index.php');
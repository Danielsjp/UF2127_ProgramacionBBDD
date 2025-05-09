<?php

require_once 'connection.php';
require_once 'traduccion_colores.php';

// $_POST
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$usuario = $_POST['usuario'];
// lo ponemos en minúscula
$color_es = strtolower($_POST['color']);
$encontrado = false;

foreach ($array_colores_es_en as $clave => $valor) {
    if ($clave == $color_es) {
       $encontrado = true;
       break;
    }
}
if (!$encontrado)
{
$color_es = "blanco";
// $color_en = "white";
}


// 1. Definir la sentencia preparada
$insert = "INSERT INTO colores(usuario, color_es, color_en) VALUES (?, ?, ?);";
// 2. Preparar la sentencia
$insert_pre = $conn->prepare($insert);
// 3. Ejecutar la sentencia
$insert_pre-> execute([$usuario, $color_es, $array_colores_es_en[$color_es]]);

// volver a casa
header('location: index.php');
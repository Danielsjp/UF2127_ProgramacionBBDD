<?php

// echo "Soy index.php";
// include 'connection.php';
// require 'connection.php';
// include_once 'connection.php';

require_once 'connection.php';

$array_fondo_claro = ["white", "yellow", "pink", "orange","green"];

// 1. Definir la sentencia (query)
$select = "SELECT * FROM colores;";
// 2. Preparar la sentencia
$select_pre = $conn->prepare($select);
// 3. Ejecutar la sentencia
$select_pre-> execute();
// 4. Obtener los resultados
$arraY_filas = $select_pre->fetchAll();

// foreach ($arraY_filas as $fila) {
//     echo "<pre>";
//     print_r($fila);
//     echo "</pre>";
// }

?>  

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header><h1>Nuestros colores preferidos</h1></header>
    <main>
        <section>
            <h2>Nuestros usuarios</h2>
            <?php foreach ($arraY_filas as $fila) : ?>
                <?php $color = "white"; 
                if (in_array($fila['color_en'], $array_fondo_claro)) {
                    $color = "black";
                }
                ?>
                <div style="background-color: <?= $fila['color_en'] ?>;color:<?=$color?>">
                        <p> <?php echo $fila['usuario'] ?> </p>
                        <span class="icons">
                        <a href=""><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="delete.php?id=<?= $fila['id_color'] ?>">
                        <i class="fa-solid fa-trash-can">
                        </i>
                        </a>   
                        
                    </span>
                </div>
            <?php endforeach ?>      
        </section>
        <section>
            <h2>Indica tus datos</h2>
            <form action="insert.php" method="post">
        <fieldset>
        <div>
        <label for="usuario">Nombre del usuario</label>
        <input type="text" name="usuario" id="usuario" required>
        </div>
        <div>
        <label for="usuario">Nombre del color:</label>
        <input type="text" name="color" id="color" required>
        </div>
        <div>
            <button type="submit">Enviar Datos</button>
            <button type="reset">Limpiar formulario</button>
        </div>
        </fieldset>    
        </section>
    </main>
</body>
</html>
<?php
    if(!empty($_POST["btnregistro"])){
        //validacion de campos basica
        if(!empty($_POST["nombre"])){
            $nombre = $_POST["nombre"];
            $sql = $conexion->query("INSERT INTO category (name) VALUES ('$nombre')");
            if($sql === TRUE){ // Use === for strict comparison
                header("location: index.php");
                exit(); // Terminate script after redirect
            }else{
                echo '<div class="alert alert-danger"> Error al registrar categoría: ' . $conexion->error . '</div>'; // Print error message
            }
        }else{
            echo '<div class="alert alert-warning"> Campo vacío</div>'; // Accented character added
        }
    }
?>


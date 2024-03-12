<?php

    if(!empty($_POST["btncrear"])){
        //validacion de campos basica
        if(!empty($_POST["nombre"]) and !empty($_POST["categoria"]) and !empty($_POST["precio"])){
            $nombre         = $_POST["nombre"];
            $categoria      = $_POST["categoria"];
            $precio         = $_POST["precio"];

            $sql            = $conexion->query("INSERT INTO product (name, category, price) VALUES ('$nombre', '$categoria', '$precio')");
            if($sql === TRUE){ // Use === for strict comparison
                header("location: index.php");
                echo '<div class="alert alert-success"> Producto registrado correctamente</div>';
            }else{
                echo '<div class="alert alert-danger"> Error al registrar producto: ' . $conexion->error . '</div>'; // Print error message
            }
        }else{
            echo '<div class="alert alert-warning"> Alguno de los campos está vacío</div>'; // Accented character added
        }
    }
?>

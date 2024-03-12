<?php
    if(!empty($_POST["btncrear"])){
        // Validación de campos básica
        if(!empty($_POST["nombre"]) && !empty($_POST["categoria"]) && !empty($_POST["precio"])){
            $nombre = $_POST["nombre"];
            $categoria = $_POST["categoria"];
            
            // Remove any formatting characters from the price and convert it to a numeric value
            $precio = str_replace([',', '.'], ['', ''], $_POST["precio"]);

            // Insert the cleaned-up price value into the database
            $sql = $conexion->query("INSERT INTO product (name, category, price) VALUES ('$nombre', '$categoria', '$precio')");
            if($sql === TRUE){
                echo '<div class="alert alert-success">Producto registrado correctamente</div>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar producto: ' . $conexion->error . '</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
        }
    }
?>

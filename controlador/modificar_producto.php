<?php
    if (!empty($_POST["btnmodificar"])) {
        // Basic field validation
        if (!empty($_POST["nombre"]) && !empty($_POST["categoria"]) && !empty($_POST["precio"])) {
            $id         = $_POST["id"];
            $nombre     = $_POST["nombre"];
            $categoria  = $_POST["categoria"];
            $precio = str_replace([',', '.'], ['', ''], $_POST["precio"]);

            $sql        = $conexion->query("UPDATE product SET name ='$nombre', category =$categoria, price =$precio WHERE id =$id");
            

            if ($sql == 1) { // Check if query executed successfully
                header("location: index.php");
            } else {
                echo '<div class="alert alert-danger"> Error al modificar producto: ' . $conexion->error . '</div>'; // Print error message
            }
        } else {
            echo '<div class="alert alert-warning"> Alguno de los campos está vacío</div>'; 
        }
    }
?>

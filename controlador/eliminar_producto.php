<?php 
    if (!empty($_GET["id"])) {
            $id         = $_GET["id"];
            $sql        = $conexion->query("DELETE from product  WHERE id =$id");
            if ($sql == 1) { // Check if query executed successfully
                echo '<div class="alert alert-success"> Producto eliminado correctamente</div>'; 
            } else {
                echo '<div class="alert alert-danger"> Error al eliminar producto: ' . $conexion->error . '</div>'; // Print error message
            }
    }
?>

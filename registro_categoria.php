<?php 
    // include "modelo/conexion.php";
    // $id     = $_GET["id"];
    // $sql    = $conexion->query("select * from product where id = $id");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/ceafd37e31.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <form class="col-4 p-3 m-auto" method ="POST">
            <h3 class="text-center text-secondary">Crear categoria</h3>
                <?php  
                    include "modelo/conexion.php";
                    include "controlador/registro_categoria.php";
                ?>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control"  aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
            <button type="submit" class="btn btn-primary" name="btnregistro" value="ok">Registrar</button>
        </form>
    </body>
</html>
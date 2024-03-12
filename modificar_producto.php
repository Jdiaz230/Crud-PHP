<?php 
    include "modelo/conexion.php";
    $id     = $_GET["id"];
    $sql    = $conexion->query("select * from product where id = $id");
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
            <h3 class="text-center text-secondary">Modificar producto</h3>
                <?php  
                    include "controlador/modificar_producto.php";
                        
                    while($datos = $sql->fetch_object()){
                ?>
                    <input type="hidden" name="id" value ="<?= $_GET["id"] ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?= $datos->name ?>" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <input type="text" name="categoria" class="form-control" value="<?= $datos->category ?>" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" name="precio" class="form-control" value="<?= $datos->price ?>" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                <?php
                    }
                ?>
            
            <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
        </form>
    </body>
</html>
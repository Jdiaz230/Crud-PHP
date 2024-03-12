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
    <title>Modificar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ceafd37e31.js" crossorigin="anonymous"></script>
    <style>
        /* Custom CSS styles */
        .form-container {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid row">
        <div class="form-container">
            <form class="col-4 p-3 m-auto" method="POST">
                <h3 class="text-center text-secondary">Modificar producto</h3>
                <?php  
                    include "controlador/modificar_producto.php";
                        
                    while($datos = $sql->fetch_object()){
                ?>
                    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?= $datos->name ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select name="categoria" class="form-control">
                            <?php
                                // Fetch categories from the database
                                $categorias_query = $conexion->query("SELECT id, name FROM category");
                                while ($categoria = $categorias_query->fetch_assoc()) {
                                    $selected = ($categoria['id'] == $datos->category) ? 'selected' : '';
                                    echo "<option value='{$categoria['id']}' $selected>{$categoria['name']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" name="precio" id="precio" class="form-control" value="<?= $datos->price ?>" oninput="formatPrice(this)">
                    </div>
                <?php
                    }
                ?>
                <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function confirmDelete(id) {
            document.getElementById('deleteButton').setAttribute('href', 'index.php?id=' + id);
            $('#confirmDeleteModal').modal('show');
        }
        function formatPrice(input) {
            let value = input.value.replace(/\D/g, '');
            let numericValue = parseFloat(value);

            if (!isNaN(numericValue)) {
                let formattedPrice = new Intl.NumberFormat('es-CO', { minimumFractionDigits: 0 }).format(numericValue);
                input.value = formattedPrice;
            } else {
                input.value = '';
            }
        }

    </script>
</body>
</html>

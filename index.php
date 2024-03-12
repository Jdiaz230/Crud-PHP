<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud en php y mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ceafd37e31.js" crossorigin="anonymous"></script>
    <style>
        /* Custom CSS styles */
        .form-container {
            background-color: #97DCF3;
            padding: 20px;
            border-radius: 10px;
        }
        .table-container {
            background-color: #97DCF3;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1 class="text-center">CRUD EN PHP Y MYSQL PRUEBA</h1>
    <?php 
        include "modelo/conexion.php";
        include "controlador/eliminar_producto.php";
    ?>
    <div class="container-fluid row">
        <div class="col-md-4">
            <div class="form-container">
                <form method="POST">
                    <h3 class="text-center ">Registro de producto</h3>
                    <?php include "controlador/registro_producto.php"; ?>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select name="categoria" class="form-control" aria-describedby="emailHelp">
                            <?php
                            // Fetch categories from the database
                            $categorias_query = $conexion->query("SELECT id, name FROM category");
                            while ($categoria = $categorias_query->fetch_assoc()) {
                                echo "<option value='{$categoria['id']}'>{$categoria['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" name="precio" id="precio" class="form-control" aria-describedby="emailHelp" oninput="formatPrice(this)">
                    </div>
                    <button type="submit" class="btn btn-secondary" name="btncrear" value="ok">Crear</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="table-container">
                <div class="col-md-12">
                    <a href="registro_categoria.php" class="btn btn-small btn-secondary">Crear categoria</a>
                </div>
                <table class="table">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Precio</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql  = $conexion->query("SELECT product.id, product.name, category.name AS category, product.price FROM product INNER JOIN category ON product.category = category.id");
                            while($datos = $sql->fetch_object()){
                        ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <td><?= $datos->name ?></td>
                            <td><?= $datos->category ?></td>
                            <td><?= $datos->price ?></td>
                            <td>
                                <a href="modificar_producto.php?id=<?= $datos->id ?>" class="btn btn-small btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-small btn-danger" onclick="confirmDelete(<?= $datos->id ?>)"><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td></td>
                        </tr>
                        <?php
                            }
                        ?>   
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Estas seguro que eliminaras el producto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a id="deleteButton" href="#" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
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

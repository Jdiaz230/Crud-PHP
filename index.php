<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Crud en php y mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ceafd37e31.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center">CRUD EN PHP Y MY SQL PRUEBA</h1>
    <?php 
                include "modelo/conexion.php";
                include "controlador/eliminar_producto.php";
    ?>
    <div class="container-fluid row">  
        <form class="col-4 p-3" method ="POST">
            <h3 class="text-center text-secondary">Registro de producto</h3>
            <?php
                include "controlador/registro_producto.php";
            ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input type="text" name="categoria" class="form-control" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-primary" name="btncrear" value="ok">Crear</button>
        </form>
        <div class="col-8 p-4">
        <div>
            <a href="registro_categoria.php" class = "btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
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
                        include "modelo/conexion.php";
                        $sql  = $conexion->query("SELECT product.id, product.name, category.name AS category, product.price FROM product INNER JOIN category ON product.category = category.id");
                        while($datos = $sql->fetch_object()){
                    ?>
                    <tr>
                        <td><?= $datos->id ?></td>
                        <td><?= $datos->name ?></td>
                        <td><?= $datos->category ?></td> <!-- Display category name instead of category ID -->
                        <td><?= $datos->price ?></td>
                        <td>
                            <a href="modificar_producto.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
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
            <a id="deleteButton" href="#" class="btn btn-danger">Elminiar</a>
        </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function confirmDelete(id) {
        document.getElementById('deleteButton').setAttribute('href', 'index.php?id=' + id);
        $('#confirmDeleteModal').modal('show');
    }
</script>

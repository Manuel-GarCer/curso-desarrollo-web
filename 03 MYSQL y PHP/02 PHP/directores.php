<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP - CRUD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1 class="text-center pt-5 pb-5 bg-primary text-white">Bienvenidos(as) a Pelicomic</h1>
    <h2 class="text-center pt-3 pb-3 bg-secondary">Sección Directores</h3>
    <section class="container">
        <div class="row p-4">
            <a href="./" class="btn btn-success">Regresar</a>
        </div>
        <div class="row">
            <?php
                $query = "SELECT b.dire_id, b.dire_img, b.dire_nac, CONCAT(b.dire_nombres, ' ', b.dire_apellidos) AS director, a.peli_nombre FROM directores b INNER JOIN peliculas a ON b.dire_peli_id = a.peli_id;";
                $query_res = mysqli_query($conexion, $query);
                while($fila = mysqli_fetch_array($query_res)){
                    ?>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <img src="<?php echo $fila['dire_img']; ?>" alt="" width="100%">
                            <h4 class="text-info"><?php echo $fila['director']; ?></h4>
                            <div>
                                <strong>Nacionalidad: </strong><?php echo $fila['dire_nac']; ?>
                            </div>
                            <div>
                                <strong>Pelicula: </strong><?php echo $fila['peli_nombre']; ?>
                            </div>
                            <div class="mt-1">
                                <a href="editar.php?id=<?php echo $fila['dire_id']; ?>" class="btn btn-success">editar</a>
                                <a href="borrar.php?delete=<?php echo $fila['dire_id']; ?>" class="btn btn-danger">borrar</a>
                            </div>
                        </div>
                <?php }
            ?>
        </div>
    </section>
</body>
</html>
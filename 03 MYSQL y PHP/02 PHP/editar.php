<?php include "conexion.php"; ?>
<?php ob_start(); ?>
<!-- se pone ob_start() para q cargue librerias es php incluido header (q esta al final) -->
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
    <section class="container">
        <div class="row p-4">
            <a href="./" class="btn btn-success">HOME</a>
        </div>
        <div class="row justify-content-center">
            <h4 class="text-center col-md-12">Editar los datos de la película</h4>
            <?php //se hace el algoritmo para editar q será el siguiente:
                $id = $_GET['id'];
                $query = "SELECT * FROM peliculas WHERE peli_id = {$id}";
                $query_res = mysqli_query($conexion, $query);
                $fila = mysqli_fetch_array($query_res);
                // print_r($fila);
                
            ?>
            <form method="post" class="col-md-6 mt-4 pb-5">
                <div class="form-group">
                    <label for="peli_nombre">Nombre de la pelicula</label>
                    <input type="text" class="form-control" name="peli_nombre" id="peli_nombre" required value="<?php echo $fila['peli_nombre']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_genero">Género</label>
                    <input type="text" class="form-control" name="peli_genero" id="peli_genero" required value="<?php echo $fila['peli_genero']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_estreno">Fecha estreno</label>
                    <input type="date" class="form-control" name="peli_estreno" id="peli_estreno" required value="<?php echo $fila['peli_estreno']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_restricciones">Restricciones</label>
                    <input type="text" class="form-control" name="peli_restricciones" id="peli_restricciones" required value="<?php echo $fila['peli_restricciones']; ?>"> 
                </div>
                <div class="form-group">
                    <label for="peli_img">Imagen URL</label>
                    <input type="text" class="form-control" name="peli_img" id="peli_img" required value="<?php echo $fila['peli_img']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_dire_id">Director</label>
                    <select name="peli_dire_id" id="peli_dire_id" class="form-control" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <!-- <option value="2">Jon Watts</option> -->
                        <?php
                            $query = "SELECT * FROM directores";
                            $query_res = mysqli_query($conexion, $query);
                            while($fila = mysqli_fetch_array($query_res)){
                                // echo "<option value='{$fila['dire_id']}'>{$fila['dire_nombres']} {$fila['dire_apellidos']}</option>";
                                ?>
                                    <option value="<?php echo $fila['dire_id']; ?>">
                                        <?php 
                                            echo $fila['dire_nombres'] . " " . $fila['dire_apellidos']; 
                                        ?>
                                    </option>
                            <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Guardar" name="guardar">
                </div>
            </form>
            <?php
                // if(isset($_POST['guardar'])){
                //     $peli_nombre = $_POST["peli_nombre"];
                //     $peli_genero = $_POST['peli_genero'];
                //     $peli_estreno = $_POST['peli_estreno'];
                //     $peli_restricciones = $_POST['peli_restricciones'];
                //     $peli_img = $_POST['peli_img'];
                //     $peli_dire_id = $_POST['peli_dire_id'];
                    
                //     $query = "INSERT INTO peliculas (peli_dire_id, peli_img, peli_nombre, peli_genero, peli_estreno, peli_restricciones) VALUES ({$peli_dire_id}, '{$peli_img}', '{$peli_nombre}', '{$peli_genero}', '{$peli_estreno}', '{$peli_restricciones}')";
                //     $query_res = mysqli_query($conexion, $query);
                //     header('Location: ./');
                // }
            ?>
        </div>
    </section>
</body>
</html>
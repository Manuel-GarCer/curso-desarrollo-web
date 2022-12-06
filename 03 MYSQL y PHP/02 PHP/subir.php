<?php include "conexion.php"; ?>
<?php ob_start(); ?> 
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
            <h4 class="text-center col-md-12">Ingresa los datos de la película</h4>
            <form method="post" class="col-md-6 mt-4 pb-5">
                <div class="form-group">
                    <label for="peli_nombre">Nombre de la pelicula</label>
                    <input type="text" class="form-control" name="peli_nombre" id="peli_nombre" required>
                    <!-- required: atributo para que nos salga un mensaje de llenar (si se lo deja en blanco) -->
                </div>
                <div class="form-group">
                    <label for="peli_genero">Género</label>
                    <input type="text" class="form-control" name="peli_genero" id="peli_genero" required>
                </div>
                <div class="form-group">
                    <label for="peli_estreno">Fecha estreno</label>
                    <input type="date" class="form-control" name="peli_estreno" id="peli_estreno" required>
                    <!-- se le pone type="date" para q aparezca la fecha dinamicamente -->
                </div>
                <div class="form-group">
                    <label for="peli_restricciones">Restricciones</label>
                    <input type="text" class="form-control" name="peli_restricciones" id="peli_restricciones" required>
                </div>
                <div class="form-group">
                    <label for="peli_img">Imagen URL</label>
                    <input type="text" class="form-control" name="peli_img" id="peli_img" required>
                </div>
                <div class="form-group">
                    <label for="peli_dire_id">Director</label>
                    <select name="peli_dire_id" id="peli_dire_id" class="form-control" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <!-- <option value="2">Jon Watts</option> -->
                        <?php
                            $query = "SELECT * FROM directores"; //todo para q nos salga toda la lista d directores 
                            $query_res = mysqli_query($conexion, $query);
                            while($fila = mysqli_fetch_array($query_res)){ //para q itere en toda la lista 
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
                if(isset($_POST['guardar'])){ // isset: esta establecido o creado o un evento de escucha
                    //  echo "si ejecutaste el formulario"
                    $peli_nombre = $_POST["peli_nombre"];
                    //  echo $peli_nombre: te imprime solo el nombre ya asi los demas 
                    $peli_genero = $_POST['peli_genero'];
                    $peli_estreno = $_POST['peli_estreno'];
                    $peli_restricciones = $_POST['peli_restricciones'];
                    $peli_img = $_POST['peli_img'];
                    $peli_dire_id = $_POST['peli_dire_id'];

                    //para insertar cuando llenamos todo el formulario se hace lo siguiente:
                    $query = "INSERT INTO peliculas (peli_dire_id, peli_img, peli_nombre, peli_genero, peli_estreno, peli_restricciones) VALUES ({$peli_dire_id}, '{$peli_img}', '{$peli_nombre}', '{$peli_genero}', '{$peli_estreno}', '{$peli_restricciones}')";
                    //ojo: se pone las {} en referencia a q estoy manipulando variables en php y sin '' comillas por ser un entero por ejemplo en directores, los demas si
                    $query_res = mysqli_query($conexion, $query); //esto para q ejecute la respuesta
                    header('Location: ./'); //header: para actualizar la pagina y no se suba el mismo formulario varias veces y se dirija denuevo a la pagina principal
                }
            ?>
        </div>
    </section
</body>
</html>
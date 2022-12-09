<?php include "conexion.php";  // para enlazar con archivo conexion ?>
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
    <h1 class="text-center pt-5 pb-5 bg-primary text-white ">Bienvenidos(as) a Pelicomic</h1>
    <section class="container">
        <div class="row p-4">
            <a href="subir.php" class="btn btn-success">Subir Pelicula</a>
            <a href="directores.php" class="btn btn-info ml-2">Directores</a>
        </div>
        <div class="row">
            <?php
                // CRUD
                // C -> CREATE  crear
                // R -> READ    leer
                // U -> UPDATE  actualizar
                // D -> DELETE  borrar

                $array = ['num', 213, true];
                function sumar(){
                    echo 1 + 1;
                }
                // sumar();
            ?>
            <?php
                $query = "SELECT a.peli_id, a.peli_img, a.peli_nombre, CONCAT(b.dire_nombres, ' ', b.dire_apellidos) AS director, a.peli_restricciones FROM peliculas a INNER JOIN directores b ON a.peli_dire_id = b.dire_id";
                $query_res = mysqli_query($conexion, $query); //$query_res: respuesta
                // print_r($query_res); con esto hacemos consulta q aparece en la pagina lo mas importante q nos devuelve que son 7 filas eso se ve en el cmd
                $array1 = ['joshi', 213, false, [12, 13]];
                // print_r($array1);
                // ⚡⚡ ARRAY ASOCIATIVO ⚡⚡ solo en php y JS no tiene esto
                // KEY - VALUE PAIR: PAR CLAVE - VALOR
                $array2 = ["peli_nombre" => "Spiderman", "peli_img" => "imagen.png"];
                // print_r($array2);
                while($fila = mysqli_fetch_array($query_res)){ //while: para iterar mysqli_fetch_array es funcion q itera  en el array asociativo de las 7 filas de arriba del query
                    // print_r($fila);      
                    //imprime todo el array de 7 con el ultimo con img de spiderman
                    // echo $fila['peli_nombre'];
                    //imprime  solo el nombre     
                    // echo "<h1>{$fila['peli_nombre']}</h1>"; 
                    //lo mismo q el anterior pero en h1
                    // echo "<br>"; uno debajo de otro
                    ?>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <img src="<?php echo $fila['peli_img']; ?>" alt="" width="100%">
                            <h4 class="text-info">"<?php echo $fila['peli_nombre']; ?>"</h4>
                            <div>
                                <strong>Director: </strong>"<?php echo $fila['director']; ?>"
                            </div>
                            <div>
                                <strong>Rating: </strong>"<?php echo $fila['peli_restricciones']; ?>"
                            </div>
                            <div class="mt-1">
                                <a href="editar.php?id=<?php echo $fila['peli_id']; ?>" class="btn btn-success">editar</a>
                                <!-- todo el editar y lo demas es para editar las peliculas -->
                                <a href="borrar.php?delete=<?php echo $fila['peli_id']; ?>" class="btn btn-danger">borrar</a>
                            </div>
                        </div>
                <?php }
            ?>
        </div>
    </section>
</body>
</html>
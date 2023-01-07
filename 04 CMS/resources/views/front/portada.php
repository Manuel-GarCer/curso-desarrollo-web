<section class="portada">
        <div class="portada__contenedor contenedor">
            <h1 class="hidden">Blog de agencia</h1> <!--hidden: escondido del titulo para q lo busque google (seo) -->
            <!-- <?php
                //$query = "SELECT * FROM  header";
                // function query($consulta){
                //     global $conexion;
                //     return mysqli_query ($conexion, $consulta);
                // }
                //$query_res = query("SELCT * FROM  header");
                //$query_res = mysqli_query ($conexion, "SELCT * FROM  header");
                $fila = get_header();
                    //print_r($fila);

            ?> -->
            <p class="portada__contenedor--subtitulo text-center"><?php echo $fila["hea_subtitulo"]; ?> </p>
            <p class="portada__contenedor--titulo mt-2 mb-6 text-center"><?php echo $fila["hea_titulo"]; ?></p>
            <a href="#" class="portada__contenedor--btn btn btn-amarillo">dime más</a>

        </div>
</section>
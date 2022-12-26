<?php
    // ⚡⚡ FRONT
    function get_portafolio_front(){
        $query = query("SELECT por_id, por_titulo, por_subtitulo, por_imgSmall FROM portafolio WHERE por_status = 'publicado' AND por_delete = 1 ORDER BY por_id DESC");
        confirm($query);
        while($fila = fetch_array($query)){
            $item = <<<DELIMITADOR
                <a href="portafolio.php?id={$fila['por_id']}" class="portafolio__contenedor__box__item">
                    <div class="portafolio__contenedor__box__item__imgBox">
                        <img src="img/portafolio/{$fila['por_imgSmall']}" alt="{$fila['por_titulo']}">
                        <div>
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                    <div class="portafolio__contenedor__box__item__data pt-3 pb-3">
                        <h3 class="titulo-n3 text-center">{$fila['por_titulo']}</h3>
                        <p class="resumen-n3 text-center text-italic">{$fila['por_subtitulo']}</p>
                    </div>
                </a>
DELIMITADOR;
            echo $item;
        }
    }

    function get_portafolioItem_front() {
        if(isset($_GET["id"])){
            $id = limpiar_string(trim($_GET["id"]));
            $query = query("UPDATE portafolio SET por_vistas = por_vistas + 1 WHERE por_id = {$id}");
            confirm($query);
            $query = query("SELECT * FROM portafolio a INNER JOIN usuarios b ON a.por_user_id = b.user_id WHERE por_id = {$id}");
            confirm($query);
            return fetch_array($query);
        }
    }


    //AMBOS
    function get_portafolio_item($urlParam){
        if(isset($_GET["{$urlParam}"])){
            $id = limpiar_string(trim($_GET["{$urlParam}"]));  
            //echo $id;
            $query = query("SELECT * FROM portafolio WHERE por_id = {$id} AND por_user_id = {$_SESSION['user_id']}");
            confirm($query);
            return fetch_array($query);
        }
    } 




    // ⚡⚡ BACK

    function get_statusItem($status){
        if($status == "publicado"){
            ?>
            <option value="pendiente">pendiente</option>
            <?php }
        else {
            ?>
            <option value="publicado">publicado</option>
            <?php }
        }
    
    function get_portafolio_back($status){
        $query = query("SELECT * FROM portafolio WHERE por_status = '{$status}' AND por_delete = 1 ORDER BY por_id DESC");
        confirm($query);
        while($fila = fetch_array($query)){
            $item = <<<DELIMITADOR
                <tr>
                    <td>{$fila['por_titulo']}</td>
                    <td>
                        <img src="../img/portafolio/{$fila['por_imgSmall']}" alt="" width="100">
                    </td>
                    <td style="width: 40%">
                        {$fila['por_contenido']}
                    </td>
                    <td>{$fila['por_fecha']}</td>
                    <td>{$fila['por_status']}</td>
                    <td>{$fila['por_vistas']}</td>
                    <td>
                        <a href="index.php?portafolio_edit={$fila['por_id']}" class="btn btn-small btn-info">editar</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-small btn-danger delete_link" rel="{$fila['por_id']}">borrar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $item;
        }
    }

    function post_portafolio_add(){
        if(isset($_POST['guardar'])){
            $por_titulo = limpiar_string(trim($_POST['por_titulo']));
            $por_subtitulo = limpiar_string(trim($_POST['por_subtitulo']));
            $por_contenido = limpiar_string(trim($_POST['por_contenido']));
            $por_status = limpiar_string(trim($_POST['por_status']));

            $arrayImgsNombres = []; //para q al subir se generen nombres unicos para eso el array
            for($i = 0; $i < 2; $i++){
                // $arrayImgsNombres[$i] = $_FILES['img']['name'][$i]; //para obtener un array con las dos imagenes subidas
                $arrayImgsNombres[$i] = md5(uniqid()) . "." . explode(".", $_FILES['img']['name'][$i])[1];
                //almacenamos en una variable y generamos un id unico (uniqid) encriptado(md5) q será su nombre y lo concatenamos explode(caracter para dividir).(punto) y lo demas es la extencion [1]
                
                move_uploaded_file($_FILES['img']['tmp_name'][$i], "../img/portafolio/{$arrayImgsNombres[$i]}");
                //para subir imagenes usamos dos parametros, el archivo alojamiento temporal y a donde lo subimos la ruta y para eso pasamos el nombre de la imagen
            }
            //print_r($arrayImgsNombres);

            //a continuación hacemos el query para subir info a la pagina del portafolio:
            $query = query("INSERT INTO portafolio (por_user_id, por_titulo, por_subtitulo, por_imgSmall, por_imgLarge, por_contenido, por_fecha, por_status) VALUES ({$_SESSION['user_id']}, '{$por_titulo}', '{$por_subtitulo}', '{$arrayImgsNombres[0]}', '{$arrayImgsNombres[1]}', '{$por_contenido}', NOW(), '{$por_status}')");
            confirm($query);
            set_mensaje(display_msj("Item agregado correctamente", "success"));
            redirect("index.php?portafolio");
        }
    }
    function post_portafolio_edit($id, $imgSmall, $imgLarge){
        if(isset($_POST['editar'])){
                //echo "funciona";
            $por_titulo = limpiar_string(trim($_POST['por_titulo']));
            $por_subtitulo = limpiar_string(trim($_POST['por_subtitulo']));
            $por_contenido = limpiar_string(trim($_POST['por_contenido']));
            $por_status = limpiar_string(trim($_POST['por_status']));

            $arrayImgNombres =[];
            $imgGuardadas = [$imgSmall,$imgLarge];
            //print_r($imgGuardadas);
            for($i = 0; $i < 2; $i++){
                //echo $_FILES["img"]["name"][$i];
                if($_FILES["img"]["name"][$i] != ""){
                    //para almacenar nuevaimagen lo siguiente (parecido a subir imagenes)
                    $arrayImgsNombres[$i] = md5(uniqid()) . "." . explode(".", $_FILES['img']['name'][$i])[1];
                    move_uploaded_file($_FILES['img']['tmp_name'][$i], "../img/portafolio/{$arrayImgsNombres[$i]}");
                    $imgLocation = "../img/portafolio/{$imgGuardadas[$i]}";
                    unlink($imgLocation); //para borrar la anterior imagen por eso unlink
                } else { //y si no mantenemos la misma imagen sino seleccionamos una nueva asi:
                    $arrayImgsNombres[$i] = $imgGuardadas[$i];
                }
            }
            //print_r($arrayImgsNombres);
            $query = query("UPDATE portafolio SET por_titulo = '{$por_titulo}', por_subtitulo = '{$por_subtitulo}', por_imgSmall = '{$arrayImgsNombres[0]}', por_imgLarge = '{$arrayImgsNombres[1]}', por_contenido = '{$por_contenido}', por_status = '{$por_status}' WHERE por_id = {$id}");
            confirm($query);
            set_mensaje(display_msj("Item editado correctamente", "success"));
            redirect("index.php?portafolio_edit={$id}");
        }
    }

    function post_deleteItem(){
        if(isset($_GET["delete"])){
            //echo "si esta el parametro de url";
            $id = limpiar_string(trim($_GET["delete"]));
            $query = query("UPDATE portafolio SET por_delete = 0 WHERE por_id = {$id}");
            confirm($query);
            set_mensaje(display_msj("Elemanto Eliminado correctamente", "warning"));
            redirect("index.php?portafolio");
            
        }
    }
?>
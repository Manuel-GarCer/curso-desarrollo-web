<?php
    //    ⚡⚡ FRONT

       function post_contacto(){
        if(isset($_POST['enviar'])){
            //echo "funcionaaaaaaaaa";
            $cont_nombre = limpiar_string(trim($_POST["cont_nombre"]));
            $cont_correo = limpiar_string(trim($_POST["cont_correo"]));
            $cont_telefono = limpiar_string(trim($_POST["cont_telefono"]));
            $cont_mensaje = limpiar_string(trim($_POST["cont_mensaje"]));
            
            $query = query("INSERT INTO contacto(cont_nombre, cont_correo, cont_telefono, cont_mensaje, cont_fecha) VALUES ('{$cont_nombre}', '{$cont_correo}', '{$cont_telefono}', '{$cont_mensaje}', NOW())");
            confirm($query);
            redirect("./");

            
        }
    }
    // BACK

    function get_contacto(){
        $query = query("SELECT * FROM contacto");
        confirm($query);
        while($fila = fetch_array($query)){ 
        $item = <<<DELIMITADOR
        <tr>
                        <td>{$fila["cont_nombre"]}</td>
                        <td>{$fila["cont_correo"]}</td>
                        <td>{$fila["cont_telefono"]}</td>
                        <td style="widht: 40%">
                            {$fila["cont_mensaje"]}
                        </td>
                        <td> {$fila["cont_fecha"]}</td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-small btn-success delete_link" titulo="Borrar comentario" action="delete" table="comentarios" rel="{$fila['cont_delete']} param="delete">Borrar</a>
                        </td>
                    </tr>
DELIMITADOR;
        echo $item;
    }



    }

    


?>
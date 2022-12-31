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
            set_mensaje(display_msj("tu mensaje fue enviado correctamente", "success"));
            redirect("./");

            
        }
    }
    // BACK
?>
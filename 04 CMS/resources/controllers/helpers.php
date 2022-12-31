<?php
    function query($consulta){
        global $conexion;
        return mysqli_query ($conexion, $consulta);
    }

    function fetch_array($query){
        return mysqli_fetch_array($query);
    }
    function confirm($query){
        global $conexion;
        if(!$query){
            die("Fallo la conexion " . mysqli_error ($conexion));

        }
    }
    function limpiar_string($str){
        global $conexion;
        return mysqli_real_escape_string($conexion, $str);
        //esta funcion valida el string
    }
    function redirect($location){  //para q cuando llenemos el formulario nos dirija a pagina en blanco
        header("Location: {$location}");
    }
    function set_mensaje($msj){
        if(!empty($msj)){ //si no esta vacio si hay contenido
            $_SESSION["mensaje"] = $msj; //variable session entre [] q son variables flotantes que se puede usar en toda la pp
        } else {
            $msj = ""; //si no hay mensaje sigue vacio
        }
        
    }
    function mostrar_msj(){
        if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"]; //si esta establecida muestrala
            unset($_SESSION["mensaje"]); //luego borrala
        }
        
    }
    function display_msj($msj, $tipo){
        $msj = <<<DELIMITADOR
        <div class="alert alert-$tipo alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> $msj.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
DELIMITADOR;
        return $msj;
    }
    function contar_filas($query){ //nos devuelve la cantidad de datos de la consulta
        return mysqli_num_rows($query);
    }

    function validar_contenido_tabla($tabla){ //para saber cuantos elementos filas tengo en la tabla
        $query = query("SELECT * FROM {$tabla}");
        confirm($query);
        // echo contar_filas($query);
        if(contar_filas($query) >= 1){ //aqui si validamos si hay contenido
            return true; //entonces verdadero
        }
        return false;
    }
    function email_existe($email){ //si el correo ya se registro antes osea ya existe
        $query = query("SELECT * FROM usuarios WHERE user_email = '{$email}'");
        confirm($query);
        if(contar_filas($query) == 1){
            return true;
        }
        return false;
    }
    // FUNCION PARA APROBAR, DESAPROBAR O DESACTIVAR UN ELEMENTO
    function post_validacionElemento($status, $table, $campo, $camp_id, $id){
        $query = query("UPDATE {$table} SET {$campo} = {$status} WHERE {$camp_id} = {$id}");
        confirm($query);
        set_mensaje(display_msj("El cambio se ejecuto correctamente", "success"));
        redirect("index.php?{$table}");
    }
?>

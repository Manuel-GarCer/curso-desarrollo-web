
<?php // lo de acontinuacion es para conectar con base de datos
    $conexion = mysqli_connect("localhost", "root", "", "dw2022_5");
    //(servidor local, nombre de usuario: root, contaseña; en blanco, nombre del servidor)
    //print_r($conexion);
    if(!$conexion){
        die("Fallo la conexion " . mysqli_error($conexion));
        //die:cirerra proceso de conexion
        //"Fallo la conexion " . paracon catenar
        //mysqli_error funcion q captura el error y nos diga 
    }
?>
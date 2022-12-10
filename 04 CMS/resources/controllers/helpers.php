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
?>

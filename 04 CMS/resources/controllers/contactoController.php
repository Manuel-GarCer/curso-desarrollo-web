<?php
    //FRONT
    function get_contacto_front(){
        $query = query("SELECT * FROM contacto");
        confirm($query);
        return fetch_array($query);
    }

    //BACK
?>
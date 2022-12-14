<?php
    //FRONT
    function get_header(){
        $query = query("SELECT * FROM header");
        confirm($query);
        return fetch_array($query);
    }
    //BACK
    function post_header_add(){ //para guardar lo q escribimos en el formulario
        if(isset($_POST["guardar"])){
            $hea_logo = limpiar_string(trim($_POST["hea_logo"]));
            $hea_subtitulo = limpiar_string(trim($_POST["hea_subtitulo"]));
            $hea_titulo = limpiar_string(trim($_POST["hea_titulo"]));
            
            $query = query("INSERT INTO header (hea_logo, hea_subtitulo, hea_titulo) VALUES ('{$hea_logo}', '{$hea_subtitulo}', '{$hea_titulo}')");
            confirm($query);
            set_mensaje(display_msj("elemento creado correctamente", "success"));
            //display_msj que viene desde el archivo helpers.php
            redirect("index.php?header");

        }
    }
    function post_header_edit(){ // para editar el formulario
        if(isset($_POST['editar'])){
            $hea_logo = limpiar_string(trim($_POST['hea_logo']));
            $hea_subtitulo = limpiar_string(trim($_POST['hea_subtitulo']));
            $hea_titulo = limpiar_string(trim($_POST['hea_titulo']));

            $query = query("UPDATE header SET hea_logo = '{$hea_logo}', hea_subtitulo = '{$hea_subtitulo}', hea_titulo = '{$hea_titulo}'");
            confirm($query);
            set_mensaje(display_msj('Contenido editado correctamente', 'success'));
            redirect("index.php?header");
        }
    }
            
?>
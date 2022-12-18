<?php
    function validar_user_reg(){ //vamos validando la data
        $min = 3;
        $max = 10;
        $errores = [];

        if(isset($_POST['registrar'])){
            $user_nombres = limpiar_string(trim($_POST['user_nombres']));
            $user_apellidos = limpiar_string(trim($_POST['user_apellidos']));
            $user_email = limpiar_string(trim($_POST['user_email']));
            $user_pass = limpiar_string(trim($_POST['user_pass']));
            $user_passConfirmar = limpiar_string(trim($_POST['user_passConfirmar']));

            if(strlen($user_nombres) < $min){ //strlen:cuenta las letras
                $errores[] = "Tus nombres no deben ser menos de {$min} caracteres";
            }
            if(strlen($user_nombres) > $max){
                $errores[] = "Tus nombres no deben tener mas de {$max} caracteres";
            }
            if(strlen($user_apellidos) < $min){
                $errores[] = "Tus apellidos no deben ser menos de {$min} caracteres";
            }
            if(strlen($user_apellidos) > $max){
                $errores[] = "Tus apellidos no deben tener mas de {$max} caracteres";
            }
            if(email_existe($user_email)){
                $errores[] = "El correo ingresado ya existe, intente con otra cuenta";
            }
            if($user_pass != $user_passConfirmar){
                $errores[] = "Las contraseñas deben ser iguales";
            }
            if(!empty($errores)){ // !empty: si no esta vacio el array errores
                // print_r($errores);
                foreach($errores as $error){ //entonces itera el array errores y convierte a error
                    echo display_msj($error, "danger"); 
                    //display_msj: nos retorna un mensaje de guacamole
                }
            } else {
                if(registro_usuario($user_nombres, $user_apellidos, $user_email, $user_pass)){
                    set_mensaje(display_msj("Registro satisfactorio. Por favor revisa tu correo o spam para la activación de tu cuenta. Esto puede tardar unos minutos", "success"));
                    redirect("register.php"); //redirige a register.php
                }
                else{
                    set_mensaje(display_msj("Lo sentimos, no pudimos registrar tu cuenta. Intentalo mas tarde", "danger"));
                    redirect("register.php");
                }
            }
        }
    }

    function registro_usuario($nombres, $apellidos, $email, $pass){
        $user_nombres = limpiar_string(trim($nombres));
        $user_apellidos = limpiar_string(trim($apellidos));
        $user_email = limpiar_string(trim($email));
        $user_pass = limpiar_string(trim($pass));
        $user_token = md5($user_email); //funcion md5: para crear toquen
        //echo $user_token;
        $user_pass = password_hash($user_pass, PASSWORD_BCRYPT, array("cost" => 12)); //para encriptar contraseña 
        //echo $user_pass;
        $query = query("INSERT INTO usuarios (user_nombres, user_apellidos,  user_email, user_pass, user_token) VALUES ('{$user_nombres}','{$user_apellidos}', '{$user_email}', '{$user_pass}', '{$user_token}' )");//para agregar usuarios
        confirm($query);
        // AQUI ESTABA EL ERROR EN LA RUTA
        $mensaje = "Por favor activa tu cuenta mediante este <a href='http://localhost/desarrollo_web/04%20CMS/public/activate.php?email={$user_email}&token={$user_token}' target='_blank'>LINK</a>"; //creamos el  mensaje del correo
        send_email($user_email, 'Activar Cuenta', $mensaje);
        return true;
    }

    function activar_usuario(){
        if(isset($_GET['email']) && isset($_GET['token'])) {
            $user_email = limpiar_string(trim($_GET['email']));
            $user_token = limpiar_string(trim($_GET['token']));
            echo $user_email;
            echo '<br>';
            echo $user_token;
            $query = query("SELECT user_id FROM usuarios WHERE user_email = '{$user_email}' AND user_token = '{$user_token}'");
            confirm($query);
            $fila = fetch_array($query);
            $user_id = $fila['user_id'];
            if(contar_filas($query) == 1){
                $query = query("UPDATE usuarios SET user_status = 1, user_token = '' WHERE user_id = {$user_id}");
                confirm($query);
                set_mensaje(display_msj("Su cuenta ha sido activada satisfactoriamente. Por favor inicie sesión", 'success' ));
                redirect("register.php");
            } else {
                set_mensaje(display_msj("Los datos no son validos. Por favor intente otra vez", 'danger'));
                redirect("register.php");
            }
        }
    }

?>
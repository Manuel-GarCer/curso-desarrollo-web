<?php
    function validar_user_login(){ //si entras bien o no por login
        if(isset($_POST['login'])){
            // echo 'funcionaaaaaaaaa';
            $user_email = limpiar_string(trim($_POST['user_email']));
            $user_pass = limpiar_string(trim($_POST['user_pass']));
            $user_recuerdame = limpiar_string(trim($_POST['user_recuerdame']));
            if(login_user($user_email, $user_pass, $user_recuerdame)){
                redirect('./');
            } else{
                set_mensaje(display_msj("Tu correo o contraseña son incorrectos, intentalo otra vez 😢", "danger"));
                redirect("login.php");
            }
        }
    }

    function login_user($email, $pass, $recuerdame){ //validando 
        $query = query("SELECT * FROM usuarios WHERE user_email = '{$email}' AND user_status = 1");
        confirm($query);
        if(contar_filas($query) == 1){
            $fila = fetch_array($query);
            $user_id = $fila['user_id']; //pues el usuario tiene id = 1
            $user_pass = $fila['user_pass'];
            $user_rol = $fila['user_rol'];
            $user_nombres = $fila['user_nombres'];
            $user_apellidos = $fila['user_apellidos'];

            if(password_verify($pass, $user_pass)){//para cerificar la contraseña puesta y la encriptada
                if($recuerdame == 'on'){ //si esta en check recuerdame
                    setcookie('email', $email, time() + 86400); //para q recuerde el inicio de sesion
                } else {
                    setcookie('email', $email, time() + 600);
                }
                $_SESSION['user_id'] = $user_id; //variables de session (flotantes)
                $_SESSION['user_nombres'] = $user_nombres;
                $_SESSION['user_apellidos'] = $user_apellidos;
                $_SESSION['user_rol'] = $user_rol;
                return true;
            } else {
                return false;
            }
        }
        else {
            return false;
        }
    }
?>
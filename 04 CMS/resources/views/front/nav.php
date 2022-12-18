<?php $fila = get_header(); ?>
<nav class="nav">
        <div class="nav__contenedor contenedor">  <!-- cada hijo llama a su padre en sass y __  -->
            <a href="#" class="nav__contenedor--logo"><?php echo $fila["hea_logo"]; ?></a>  <!-- cada hijo llama a su padre en sass y si ya tiene contenido entonces -- y ya  -->
            <ul class="nav__contenedor__menu">
                <!-- li.nav__contenedor__menu__item*5>a.nav__contenedor__menu__item--link -->
                <li class="nav__contenedor__menu__item"><a href="" class="nav__contenedor__menu__item--link">servicios</a></li>
                <li class="nav__contenedor__menu__item"><a href="" class="nav__contenedor__menu__item--link">portafolio</a></li>
                <li class="nav__contenedor__menu__item"><a href="" class="nav__contenedor__menu__item--link">about</a></li>
                <li class="nav__contenedor__menu__item"><a href="" class="nav__contenedor__menu__item--link">equipo</a></li>
                <li class="nav__contenedor__menu__item"><a href="" class="nav__contenedor__menu__item--link">contacto</a></li> 
                <?php
                    if(isset($_SESSION["user_rol"]) && $_SESSION["user_rol"] == "admin" && isset ($_COOKIE["email"])){
                        ?>
                            <li class="nav__contenedor__menu__item"><a href="admin" class="nav__contenedor__menu__item--link">admin</a></li>
                        <?php }
                ?>                 
            </ul>
            <div class="nav__contenedor--btn">
               menu <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </nav>
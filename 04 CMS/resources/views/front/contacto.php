<section class="contacto pt-10 pb-10">
        <div class="contacto__contenedor contenedor">
            <h2 class="titulo-n2 text-center text-white">contacto</h2>
            <p class="resumen-n2 text-center mt-2 mb-7">Lorem ipsum dolor sit amet consectetur.</p>
            <form class="contacto__contenedor__form" method="post">
                <div class="contacto__contenedor__form__col">
                    <div class="contacto__contenedor__form__col--formGroup">
                        <input type="text" name="cont_nombre" placeholder="Tu Nombre*" required>
                    </div>
                    <div class="contacto__contenedor__form__col--formGroup">
                        <input type="email" name="cont_correo" placeholder="Tu Correo*" required>
                    </div>
                    <div class="contacto__contenedor__form__col--formGroup">
                        <input type="text" name="cont_telefono" placeholder="Tu Telefono*" required>
                    </div>
                </div>
                <div class="contacto__contenedor__form__col">
                    <div class="contacto__contenedor__form__col--formGroup height-100">
                        <textarea cols="30" rows="5" name="cont_mensaje" placeholder="Tu Mensaje*"  class="height-100" required ></textarea>
                        <!-- cols:columnas, rows:filas, placeholder: un mensaje -->
                    </div>
                </div>
                <div class="contacto__contenedor__form--btnBox text-center mt-5">
                    <input type="submit" name="enviar" value="enviar mensaje" class="btn btn-amarillo">
                    <!-- type: submit para que aparezca boton  -->
                    <?php post_contacto(); ?>
                </div>
            </form>
        </div>
    </section>
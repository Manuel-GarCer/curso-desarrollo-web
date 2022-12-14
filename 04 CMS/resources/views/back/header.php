<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">PORTADA</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <?php mostrar_msj(); //q t devuelve cuando llenaste el formulario ?>
    </div>
    <?php
        //validar_contenido_tabla("header")
        if(validar_contenido_tabla("header")){ //si hay contenido entonces mostrar contenido editar
            ?>
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-info mb-0">
                                    Editar Elementos de la portada
                                </h6>
                            </div>
                            <div class="card-body">
                                <?php $fila = get_header(); ?>
                                <form method="post">
                                    <div class="form-group">
                                        <label for="hea_logo">Título del logo</label>
                                        <input type="text" class="form-control" id="hea_logo" name="hea_logo" required value="<?php echo $fila['hea_logo']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="hea_subtitulo">Subtítulo</label>
                                        <input type="text" class="form-control" id="hea_subtitulo" name="hea_subtitulo" required value="<?php echo $fila['hea_subtitulo']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="hea_titulo">Título</label>
                                        <input type="text" class="form-control" id="hea_titulo" name="hea_titulo" required value="<?php echo $fila['hea_titulo']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Editar" class="btn btn-info" name="editar">
                                    </div>
                                </form>
                                <?php post_header_edit(); //para editar la data del formulario?>
                            </div>
                        </div>
                    </div>

            <?php }
        else{ //si esta vacio no hay nada entonces mostrar formulario: de agregar
            ?>
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary mb-0">
                                    Agregar Elementos de la portada
                                </h6>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="hea_logo">Título del logo</label>
                                        <input type="text" class="form-control" id="hea_logo" name="hea_logo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hea_subtitulo">Subtítulo</label>
                                        <input type="text" class="form-control" id="hea_subtitulo" name="hea_subtitulo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hea_titulo">Título</label>
                                        <input type="text" class="form-control" id="hea_titulo" name="hea_titulo" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Guardar" class="btn btn-primary" name="guardar">
                                    </div>
                                </form>
                                <?php post_header_add(); //para agregar la data al formulario ?>
                            </div>
                        </div>
                    </div>
                    
            <?php } 
    ?>

</div>
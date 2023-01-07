<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">CONTACTO</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-3">
            <div class="card-body">
                <a href="index.php?portafolio_pendiente" class="btn btn-success">
                Contactos Borrados</a>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header">
            <h6 class="text-primary mb-0">
                Lista de Contacto
            </h6>
        </div>        
        <div class="card-body">
            <table class="table table-hover table-responsive">
                <thead>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </thead>
                <tbody>
                <?php $fila = get_contacto(); ?>
                    <!-- <tr>
                        <td>Nombre</td>
                        <td>Correo</td>
                        <td>telefono</td>
                        <td style="widht: 40%">
                            Mensaje
                        </td>
                        <td>Fecha</td>
                        <td>
                            <a href="#" class="btn-small btn.danger">delete</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
            <!-- <?php post_deleteItem(); ?> -->
        </div>
    </div>
</div>

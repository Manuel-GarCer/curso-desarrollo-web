<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">CONTACTO</h1>
</div>
<div class="row">
    <div class="card shadow">
        <div class="card-header">
            <h6 class="text-primary mb-0">
                Lista de Contacto
            </h6>
        </div>
        <?php  mostrar_msj(); ?>
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
                <!-- <?php get_portafolio_back("publicado") ?> -->
                    <tr>
                        <td>Hector Juan Perez Martinez</td>
                        <td>Hector@gmail.com</td>
                        <td>970088986</td>
                        <td style="widht: 40%">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus adipisci facere vitae nemo iste assumenda quasi, nulla vero, soluta nobis autem officia, 
                        </td>
                        <td>2022-12-30</td>
                        <td>
                            <a href="#" class="btn-small btn.danger">borrar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- <?php post_deleteItem(); ?> -->
        </div>
    </div>
</div>

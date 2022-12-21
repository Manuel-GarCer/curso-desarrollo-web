<?php require_once("../../resources/config.php"); ?>

<?php include(VIEW_BACK . DS . "head.php"); ?>



        <!-- Sidebar -->
        <?php include(VIEW_BACK . DS . "sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include(VIEW_BACK . DS . "topnav.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                        if(isset($_GET['header'])){
                            //echo "aqui cargare el modulo header";
                            include(VIEW_BACK . DS . "header.php");
                        }
                        if(isset($_GET['portafolio'])){
                            //echo "aqui cargare el modulo portafolio";
                            include(VIEW_BACK . DS . "portafolio.php");
                        }
                        if(isset($_GET['portafolio_add'])){
                            //echo "aqui cargare el modulo portafolio";
                            include(VIEW_BACK . DS . "portafolio_add.php");
                        }
                        if(isset($_GET['contacto'])){
                            //echo "aqui cargare el modulo contacto";
                            include(VIEW_BACK . DS . "contacto.php");
                        }
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include(VIEW_BACK . DS . "footer.php"); ?>
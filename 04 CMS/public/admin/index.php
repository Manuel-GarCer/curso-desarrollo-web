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
                            echo 'aqui cargare la vista del modulo header';
                        }
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include(VIEW_BACK . DS . "footer.php"); ?>
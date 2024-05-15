<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();

$doc_id = $_SESSION['doc_id'];
//$doc_number = $_SERVER['doc_number'];
?>

<!DOCTYPE html>
<html lang="en">

<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include("assets/inc/nav.php"); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <!--Get Details Of A Single User And Display Them Here-->
        <?php
        $pat_id = $_GET['pat_id'];
        $ret = "SELECT  * FROM his_patients WHERE pat_id=?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('i', $pat_id);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        //$cnt=1;
        while ($row = $res->fetch_object()) {
            $mysqlDateTime = $row->pat_date_joined;
        ?>
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                            <li class="breadcrumb-item active">View Patients</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Patient's <?php echo $row->pat_id; ?>'s
                                        Profile</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <img src="assets/images/users/patient.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">


                                    <div class="text-left mt-3">

                                        <p class="text-muted mb-2 font-13"><strong>Patient ID :</strong> <span class="ml-2"><?php echo $row->pat_id; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Gender :</strong><span class="ml-2"><?php echo $row->pat_gender; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Age :</strong> <span class="ml-2"><?php echo $row->pat_age; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Diagnosis :</strong> <span class="ml-2"><?php echo $row->pat_diagnosis; ?></span></p>
                                        <hr>
                                        <p class="text-muted mb-2 font-13"><strong>Date Recorded :</strong> <span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?></span>
                                        </p>
                                        <hr>




                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col-->

                        <?php } ?>


                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include('assets/inc/footer.php'); ?>
            <!-- end Footer -->

    </div>


    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>


</html>
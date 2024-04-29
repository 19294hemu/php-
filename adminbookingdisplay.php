<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Self Employment Service Booking</title>
    <!-- Data Table CSS -->
    <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    
   
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">
<!-- Top Navbar -->
<?php include_once('includes/navbar.php');
include_once('includes/sidebar.php');
?>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
<li class="breadcrumb-item"><a href="#">Self Employment Service Booking</a></li>
<li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">

                <!-- Title -->
<div class="hk-pg-header">
 <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Self Employment Service booking...</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                        <th>Booking On</th>
                        <th>Required Person Name</th>
                        <th>Start   Date </th>
                        <th>End Date</th>
                        <th>Applicant Name</th>
                        <th>Requirment</th>
            
                        <th>Status</th>
                         <th>Work Status</th>
                        
                                                </tr>
                                            </thead>
                                            <tbody>
 <?php
                     //$name=$_SESSION['fullname']; 

$query = "SELECT * FROM booking ORDER BY bookingon DESC";
$run_query = mysqli_query($con, $query) or die(mysqli_error($con));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $id = $row['id'];
    $bokingon=$row['bookingon'];
    $requiredpersonname = $row['requiredpersonname'];
    $startdate = $row['startdate'];
    $enddate = $row['enddate'];
    $applicantname = $row['applicantname'];

    $requirment = $row['requirment'];
    $status = $row['status'];
    $workstatus = $row['workstatus'];

    if($applicantname==$_SESSION['fullname']){
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td> $bokingon</td>";
    echo "<td>$requiredpersonname</td>";
    echo "<td>$startdate</td>";
    echo "<td>$enddate</td>";
    echo "<td>$applicantname</td>";
  
    echo "<td>$requirment</td>";
      if($status=='Reject'){
    echo "<td>Not yet approved</td>";
   }
   
   if($status==''){
    echo "<td>Not yet approved</td>";
   }
   else{
     echo "<td>$status</td>";
   }
    if($status==''){
         echo "<td>Pending for approve</td>";
    }else{
        echo "<td>$workstatus</td>";
    }
    


    echo "</tr>";
}
}
}
?>

                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <!-- /Row -->

            </div>
            <!-- /Container -->
<?php
 
    if (isset($_GET['del'])) {
        $booking_del = mysqli_real_escape_string($con, $_GET['del']);
        
        $del_query = "DELETE FROM booking WHERE id='$booking_del'";
        $run_del_query = mysqli_query($con, $del_query) or die (mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Record deleted successfully');
            window.location.href='adminbookingdisplay.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }

         if (isset($_GET['approve'])) {
        $booking_approve = mysqli_real_escape_string($con,$_GET['approve']);
        $approve_query = "UPDATE booking SET status='approved' WHERE id='$booking_approve'";
        $run_approve_query = mysqli_query($con, $approve_query) or die (mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Record approved successfully');
            window.location.href='adminbookingdisplay.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
       
?>


            <!-- Footer -->
<?php include_once('includes/footer.php');?>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /HK Wrapper -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="dist/js/dataTables-data.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
</body>
</html>
<?php } ?>
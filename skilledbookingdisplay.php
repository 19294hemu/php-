<?php include 'includes/connection.php';?>

<!doctype html>
<html lang="zxx">
<head>

<title>Self Employment Service Booking</title>



<link rel="stylesheet" href="./css/bootstrap.min.css">

<link href="./font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="./css/matrialize.css" rel="stylesheet">

<link href="./owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<link rel="stylesheet" href="./css/style.css">
</head>

<?php session_start(); ?>

<div class="top_bar background-color-orange">
<div class="top_bar_container">
<div class="container">
<div class="row">
<div class="col">
<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
<ul class="top_bar_contact_list">
<li>
<i class="fa fa-phone coll" aria-hidden="true"></i>
<div class="contact-no">0123 4567 8912</div>
</li>
<li style="color: white">
<i class="fa fa-envelope coll" aria-hidden="true"></i>
employment@gmail.com</li>
</ul>
<div class=" ml-auto ">
   
<div class="search_button search"><i class="large material-icons search-icone">search</i></div>
<div class="hamburger menu_mm  search_button transparent search display"><i class="large material-icons font-color-white  search-icone  menu_mm ">menu</i></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="header_container background-color-orange-light">
<div class="container">
<div class="row">
<div class="col">
<div class="header_content d-flex flex-row align-items-center justify-content-start">
<div class="logo_container">
<a href="index.php">
<img src="./imags/logo.png" class="logo-text" alt="" height="50px">
</a>
</div>
<nav class="main_nav_contaner ml-auto">
<ul class="main_nav">

<li><a href="#">Welcome <b><?php echo $_SESSION['fullname'] ?></b></a></li>
<li><a href="skilledbookingdisplay.php">Booking View</a></li>
<li><a href="skilleddisplay.php">All Users View</a></li>
<li><a href="logout.php">Log Out</a></li>
</ul>

<div class="hamburger menu_mm menu-vertical">
<i class="large material-icons font-color-white menu_mm menu-vertical">menu</i>
</div>
</nav>
</div>
</div>
</div>
</div>
</div>

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
<div class="menu_close_container">
<div class="menu_close">
<div></div>
<div></div>
</div>
</div>
<div class="search">
<form action="#" class="header_search_form menu_mm">
<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
<i class="fa fa-search menu_mm" aria-hidden="true"></i>
</button>
</form>
</div>
<nav class="menu_nav">
<ul class="menu_mm">

<li style="color: white">Welcome <b><?php echo $_SESSION['fullname'] ?></b></li>
<li><a href="skilledbookingdisplay.php">Booking View</a></li>
<li><a href="skilleddisplay.php">All Users View</a></li>
<li><a href="logout.php">Log OUT</a></li>
</ul>
</nav>
</div>


<script data-cfasync="false" src="js/email-decode.min.js"></script><script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./owlcarousel/owl.carousel.min.js"></script>
<script src="/.js/jquery-ui.min.js"></script>

<script src="./js/custom.js"></script>
<script>
        $(".search-icone").click(function(){
     // $(".menu").animate({height: "100vh"});
});

    </script>
<body>


<h3 class="page-header">
                            <center> <marquee width = 70% ><font color="green" > Self Employment Service booking...</font></marquee></center>
                        </h3>
<div class="row">
<div class="col-lg-12">
        <div class="table-responsive">

<form action="" method="post">
            <table class="table table-bordered table-striped table-hover">


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
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
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
     if($requiredpersonname==$_SESSION['fullname']){
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td> $bokingon</td>";
    echo "<td>$requiredpersonname</td>";
    echo "<td>$startdate</td>";
    echo "<td>$enddate</td>";
    echo "<td>$applicantname</td>";
  
    echo "<td>$requirment</td>";
   
   
   if($status!=='approved' && $status!=='Rejected'){
    
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to approve this note?')\"href='?approve=$id'><input type='button' class='btn btn-success' value='Approve'></a>

<a onClick=\"javascript: return confirm('Are you sure you want to reject this note?')\"href='?reject=$id'><input type='button' class='btn btn-danger' value='Reject'></a>
    </td>";
                          }
                          else{
                          	echo "<td>$status</td>";
                          }
if( $workstatus!=='Work_Completed' && $status!=='Rejected'){
    
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='?del=$id'></i><input type='button' class='btn btn-warning' value='Work Complete'></td>";
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
           
</form>
</div>
</div>
</div>
 <?php
 
    if (isset($_GET['del'])) {
        $booking_del = mysqli_real_escape_string($conn, $_GET['del']);
        
        $del_query = "UPDATE booking SET workstatus='Work_Completed' WHERE id='$booking_del'";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Work completed successfully');
            window.location.href='skilledbookingdisplay.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }

         if (isset($_GET['approve'])) {
        $booking_approve = mysqli_real_escape_string($conn,$_GET['approve']);
        $approve_query = "UPDATE booking SET status='approved' , workstatus='Work_in_progress' WHERE id='$booking_approve'";
        $run_approve_query = mysqli_query($conn, $approve_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Record approved successfully');
            window.location.href='skilledbookingdisplay.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
        if (isset($_GET['reject'])) {
        $reject_approve = mysqli_real_escape_string($conn,$_GET['reject']);
        $approve_query = "UPDATE booking SET status='Rejected', workstatus='Rejected' WHERE id='$reject_approve'";
        $run_approve_query = mysqli_query($conn, $approve_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Record rejected successfully');
            window.location.href='skilledbookingdisplay.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
       
?>




</body>
</html>

<?php include 'includes/footer.php';?>


































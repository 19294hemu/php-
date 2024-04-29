
<?php include '../includes/connection.php';?>
<!doctype html>
<html lang="zxx">
<head>

<title>Self Employment Service Booking</title>



<link rel="stylesheet" href="../css/bootstrap.min.css">

<link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="../css/matrialize.css" rel="stylesheet">

<link href="../owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<link rel="../stylesheet" href="./css/style.css">
</head>
<?php
session_start(); ?>
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
  <a href="feedback.php" style="color: white"><i class="fa fa-comment" ></i>Feedback</a>
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
<a href="../index.php">
<img src="../imags/logo.png" class="logo-text" alt="" height="50px">
</a>
</div>
<nav class="main_nav_contaner ml-auto">
<ul class="main_nav">
<li><a href="#">Welcome <?php echo $_SESSION['fullname'] ?></a></li>
<li><a href="../logout.php">Log out</a></li>
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
<li><a href="#">Welcome <?php echo $_SESSION['fullname'] ?></a></li>
<li><a href="../logout.php">Log out</a></li>
</ul>
</nav>
</div>


<script data-cfasync="false" src="js/email-decode.min.js"></script><script src="./js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../owlcarousel/owl.carousel.min.js"></script>
<script src="../.js/jquery-ui.min.js"></script>

<script src="../js/custom.js"></script>
<script>
        $(".search-icone").click(function(){
     // $(".menu").animate({height: "100vh"});
});

    </script>


<?php
if (isset($_POST['booking'])) {

      //$bookingon = date('Y/m/d');
      $requiredpersonname = mysqli_real_escape_string($conn, $_POST['requiredpersonname']);
      $startdate=mysqli_real_escape_string($conn,$_POST['startdate']);
      $enddate=mysqli_real_escape_string($conn,$_POST['enddate']);
  
      $applicantname = mysqli_real_escape_string($conn, $_POST['applicantname']);

      $requirment = mysqli_real_escape_string($conn, $_POST['requirment']);
    
      

   
    
      /*$checkusername = "SELECT * FROM booking WHERE username = '$username'";
      $run_check = mysqli_query($conn , $checkusername) or die(mysqli_error($conn));
      $countusername = mysqli_num_rows($run_check); 
      if ($countusername > 0 ) {
                         echo  "<center><font color='red'>Username is already taken! try a different one</font></center>";
                               }

      //$email = $_POST['email'];
      $checkemail = "SELECT * FROM users WHERE email = '$email'";
      $run_check = mysqli_query($conn , $checkemail) or die(mysqli_error($conn));
      $countemail = mysqli_num_rows($run_check); 

      if ($countemail > 0 ) {
                        echo  "<center><font color='red'>Email is already taken! try a different one</font></center>";
                            }

         else{
       */      
      $query = "INSERT INTO booking(requiredpersonname,startdate,enddate,applicantname,requirment,status,token) VALUES ('$requiredpersonname' , '$startdate' , '$enddate' ,'$applicantname', '$requirment' , '','')";
      $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
      if (mysqli_affected_rows($conn) > 0) { 
        echo "<script>alert('SUCCESSFULLY Applied for booking please waiting for approval');
        window.location.href='userbookingdisplay.php';</script>";
                                           }
             }

?>




<body style="background-color: #2053df">
		<h1 style="font-size: 30px; font-weight: bold;text-shadow: 2px 2px orange; text-align: center;">Booking</h1><br>
	   <div style="width: 500px; background-color: white; border: double; border-radius: 10px; margin: auto;">
	   	<br><br>
        <table style="height: 400px; margin: auto; width: 400px">
        	<form method="post"> 
        <tr><td><input type="text"  name="requiredpersonname" class="form-control" placeholder="Enter Required Person Name" required=""></td></tr>
         <tr><td>Start Date:<input type="date" name="startdate" class="form-control"  required=""></td></tr>
         <tr><td>End Date: <input type="date" name="enddate" class="form-control"  required=""></td></tr>
         <tr><td>Applicant name <input type="text" name="applicantname" class="form-control"  value='<?php echo $_SESSION['fullname'] ?>'  required=""></td></tr>
         
      
          <tr><td><input type="text" name="requirment" placeholder="Enter your requirment" class="form-control" required=""></td></tr>
          <tr><td>I agree..<input type="checkbox" required="" ></td></tr>
          <tr><td><input type="submit" name="booking" id="submit"  class="form-control btn-primary" value="Booking"></td></tr></form>
         </table>
	   </div>

	</div>
	<br><br>

 <?php include '../includes/footer.php';?>







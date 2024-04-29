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
<a href="index.php">
<img src="./imags/logo.png" class="logo-text" alt="" height="50px">
</a>
</div>
<nav class="main_nav_contaner ml-auto">
<ul class="main_nav">

<li><a href="#">Welcome <b><?php echo $_SESSION['fullname'] ?></b></a></li>

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


<!--insert-->



<?php
if (isset($_POST['postcomment'])) {
session_start();

      $id = mysqli_real_escape_string($conn, $_POST['id']);
      $rate=mysqli_real_escape_string($conn,$_POST['rate']);
      
      $comments = mysqli_real_escape_string($conn, $_POST['comments']);
      $commentto = mysqli_real_escape_string($conn, $_POST['commentto']);
      
      $fullname=mysqli_real_escape_string($conn, $_POST['fullname']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
     $poston=date("Y-m-d");
             
      $query = "INSERT INTO feedback(id,fullname,comments,commentto,rate,email,poston) VALUES ('$id' , '$fullname' , '$comments' ,'$commentto' ,'$rate', '$email' , '$poston')";
      $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
      if (mysqli_affected_rows($conn) > 0) { 
        echo "<script>alert('Your comment Successfully posted');
        window.location.href='feedback.php';</script>";
                                           }
             
   }


?>




<!--- display-->



<form action="" method="post">
            <table class="table table-bordered table-striped table-hover" style="width: 40%;color:white; text-align: center; margin: auto;">


            <thead>
                    <tr>
                       
                        <th style="width: 35px"><i class='fa fa-user'></i>User Name</th>
                        <th style="width: 35px">Comment To</th>
                        <th style="width: 105px">Rate </th>
                        <th>Comments</th>
                    
                        <th style="width: 105px">Posted On</th>
                        ]
                       
                        
                    </tr>
                </thead>
                <tbody>





                 <?php

                $username=$_SESSION['fullname'];

                    //echo $_SESSION['fullname'];
$query2="SELECT requiredpersonname from  `booking` WHERE applicantname= '$username'";
$run_query2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));




$query = "SELECT * FROM feedback ORDER BY poston ASC";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $id = $row['id'];
    $fullname = $row['fullname'];
     $commentto=$row['commentto'];
    $comments = $row['comments'];

    $rate = $row['rate'];
   
    $email = $row['email'];
    $poston = $row['poston'];

      
    echo "<tr style='height: 90px'>";
   
    echo "<td> $fullname</td>";
   
    echo "<td> $commentto</td>";
   
    echo "<td>";
      for($i=0;$i<$rate;$i++)
    {
    	echo "<i class='fa fa-star checked'></i>";
    }
  
   echo "</td>";
    	
                              


  
    echo "<td>$comments</td>";
    echo "<td>$poston</td>";
   
   
    echo "</tr>";

}
}
?>


                </tbody>
            </table>
           
</form>








<body style="background-color: #2053df"><br><br>
	<div >
		<h1 style="font-size: 30px; font-weight: bold;text-shadow: 1px 1px orange; text-align: center;color: white">Feedback<p>Please provide your feedback below:</p></h1><br>
	   <div style="width: 500px; background-color: white; border: double; border-radius: 10px; margin: auto;">
	   	<br><br>
        <table style="height: 400px; margin: auto; width: 400px">
        	<form method="post"> 
        <tr><td>How do you rate your overall experience? 0-5:
        	<INPUT TYPE="NUMBER" name='rate' MIN="0" MAX="5" STEP="1" VALUE="5" SIZE="6" required=""></td></tr>
         <tr><td>Comments:<textarea name="comments" class="form-control" rows="5" cols="50" required=""></textarea></td></tr>


          <tr><td>Comment to:<select name="commentto" >
         <?php 
        if (mysqli_num_rows($run_query2) > 0) {
         while ($row = mysqli_fetch_array($run_query2)) {
          $requiredpersonname = $row['requiredpersonname'];
          echo "<option>$requiredpersonname</option>";

                     }
             }

          ?>

          </select> 







          </td></tr>




          <tr><td>Your ID<input type="text" name="id" value=<?php echo $_SESSION['id'] ?> class="form-control"  required=""></td></tr>
         <tr><td>Your Name<input type="text" name="fullname" value=<?php echo $_SESSION['fullname'] ?> class="form-control"  required=""></td></tr>
         <tr><td>Mail ID<input type="email" name="email" value=<?php echo $_SESSION['email'] ?> class="form-control"  required="" ></td></tr>
      
          <tr><td><input type="submit" name="postcomment" id="submit"  class="form-control btn-warning" value="Post"></td></tr></form>
         </table>
	   </div>

	</div>

<br><br><br>
          



</body>
</html>
<?php include 'includes/footer.php';?>

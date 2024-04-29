
<?php include 'includes/connection.php';?>
<?php include 'includes/navbar.php';?>


<?php
if (isset($_POST['signup'])) {
session_start();

      $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
      $fathername=mysqli_real_escape_string($conn,$_POST['fathername']);
      $dateofbirth=mysqli_real_escape_string($conn,$_POST['dateofbirth']);
      $registredon = date("Y-m-d");
      $role='user';
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $phoneno=$_POST['phoneno'];
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
      $gender=$_POST['gender'];
      
      $address=mysqli_real_escape_string($conn, $_POST['address']);
      $requirment=mysqli_real_escape_string($conn, $_POST['requirment']);
      
if ($_POST['password'] !== $_POST['repassword2']) 
{
  echo  "<center><font color='red'>Passwords do not match </font></center>";
}
   
      $username = $_POST['username'];
      $checkusername = "SELECT * FROM users WHERE username = '$username'";
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
             
      $query = "INSERT INTO users(fullname,fathername,dateofbirth,registredon,role,email,phoneno,username,password,gender,education,skills,experience,projects,address,requirment,token) VALUES ('$fullname' , '$fathername' , '$dateofbirth' ,'$registredon', '$role' , '$email' , '$phoneno' , '$username' , '$password' , '$gender' , '', '', '' , '' , '$address', '$requirment' , '')";
      $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
      if (mysqli_affected_rows($conn) > 0) { 
        echo "<script>alert('SUCCESSFULLY REGISTERED');
        window.location.href='login.php';</script>";
                                           }
             }
   }


?>




<body style="background-color: #2053df"><br><br><br><br><br><br><br><br><br><br><br>
	<div >
		<h1 style="font-size: 30px; font-weight: bold;text-shadow: 2px 2px orange; text-align: center;">Registration for User</h1><br>
	   <div style="width: 500px; background-color: white; border: double; border-radius: 10px; margin: auto;">
	   	<br><br>
        <table style="height: 700px; margin: auto; width: 400px">
        	<form method="post"> 
        <tr><td><input type="text" name="fullname" class="form-control" placeholder="Enter Full Name" required=""></td></tr>
         <tr><td><input type="text" name="fathername" class="form-control" placeholder="Enter Father Name" required=""></td></tr>
         <tr><td>Date of birth: <input type="date" name="dateofbirth" class="form-control"  required=""></td></tr>
         <tr><td> <input type="email" name="email" class="form-control" placeholder="Enter email id" required=""></td></tr>
         <tr><td> <input type="text" name="phoneno" class="form-control" placeholder="Enter phone number" required=""></td></tr>
         <tr><td> <input type="text" name="username" class="form-control" placeholder="Enter User name" required=""></td></tr>
         <tr><td> <input type="password" name="password" class="form-control" placeholder="Enter Password" required=""></td></tr>
       <tr><td> <input type="password" name="password2" class="form-control" placeholder="Enter Confirm Password" required=""></td></tr>
       <tr><td> <select class="form-control" name="gender" required="">
       	<option value="">--Select Gender--</option>
       	<option>Male</option>
       	<option>Female</option>
       	<option>Transgender</option>
       </select></td></tr>
        
      
         <tr><td><textarea name="address" placeholder="Enter Address" class="form-control" rows="5" cols="50" required=""></textarea></td></tr>
          <tr><td><input type="text" name="requirment" placeholder="Enter your requirment" class="form-control" required=""></td></tr>
          <tr><td>I agree..<input type="checkbox" required="" ></td></tr>
          <tr><td><input type="submit" name="signup" id="submit"  class="form-control btn-primary" value="Submit"></td></tr></form>
         </table>
	   </div>

	</div>
	<br><br>

 <?php include 'includes/footer.php';?>








<?php include 'includes/connection.php';?>
<?php include 'includes/navbar.php';?>

<?php
//session_start();
if (isset($_POST['adminLogin'])) {
  $username  = $_POST['username'];
  $password = $_POST['password'];
  mysqli_real_escape_string($conn, $username);
  mysqli_real_escape_string($conn, $password);
  
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn , $query) or die (mysqli_error($conn));
 if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $username = $row['username'];
    $pass = $row['password'];
    $fullname = $row['fullname'];
    $email = $row['email'];
    $role= $row['role'];
    $education = $row['education'];
    //echo "$education";
    if ($password == $pass) {                                        //password_verify($password, $password )
      $_SESSION['id'] = $id;
      $_SESSION['username'] = $username;
      $_SESSION['fullname'] = $fullname;
      $_SESSION['email']  = $email;
      $_SESSION['role'] = $role;
      $_SESSION['education'] = $education;
      if($_SESSION['role']=='Admin'){
      header('location: admin/dashboard.php');}
      else{
        echo "<script>alert('Admin only login here you need to click on login option only');
      
      window.location.href= 'adminlogin.php';</script>";
        }
      //echo "<script>alert('Welcome to Admin login');
      //window.location.href= 'admindisplay.php';</script>";
                    
    }
    else {
      echo "<script>alert('invalid username/password');
      window.location.href= 'adminlogin.php';</script>";

    }
  }
}
else {
      echo "<script>alert('invalid username/password');
      window.location.href= 'adminlogin.php';</script>";

    }
}
?>


<body style="background-color: #2053df"><br><br><br><br><br><br><br><br><br><br><br>
	<div >
		<h1 style="font-size: 30px; font-weight: bold;text-shadow: 2px 2px orange; text-align: center;">Admin Log-in</h1><br>
	   <div style="width: 400px; background-color: white; border: double; border-radius: 10px; margin: auto;">
	   	<br><br>
        <table style="height: 200px; margin: auto; width: 300px">
        	<form method="POST"> 
        
         <tr><td> <input type="text" name="username" class="form-control" placeholder="Enter User name" required=""></td></tr>
         <tr><td> <input type="password" name="password" class="form-control" placeholder="Enter Password" required=""></td></tr>
       
          <tr><td><input type="submit" name="adminLogin" class="form-control btn-primary" value="Login"></td></tr></form>
         </table>
         
	   </div>

	</div>
	<br><br>

 <?php include 'includes/footer.php';?>







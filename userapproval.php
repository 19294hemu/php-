<?php include ('includes/connection.php'); ?>
<?php include('includes/adminheader.php');  ?>


 <div id="wrapper">
       
       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                            <small><?php echo $_SESSION['name']; ?></small>
                        </h1>
<?php if($_SESSION['role'] == 'admin') {
?>
<h3 class="page-header">
                            <center> <marquee width = 70% ><font color="green" > Notes uploaded by College</font></marquee></center>
                        </h3>
<div class="row">
<div class="col-lg-12">
        <div class="table-responsive">

<form action="" method="post">
            <table class="table table-bordered table-striped table-hover">


            <thead>
                    <tr>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Role </th>
                        <th>Email</th>
                        <th>Gender </th>
                        <th>Status</th>
                        <th>Delete </th>
                       
                        
                    </tr>
                </thead>
                <tbody>

                 <?php

$query = "SELECT * FROM users WHERE token='no'";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $name = $row['name'];
    $username= $row['username'];
    $role = $row['role'];
    $email = $row['email'];
    $gender = $row['gender'];
    

    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$username</td>";
    echo "<td> $role</td>";
    echo "<td>$email</td>";
    echo"<td>$gender</td>";
    
   
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to approve this user?')\"href='?approve=$username'><i class='fa fa-times' style='color: red;'></i>Approve</a></td>";

    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='?del=$username'><i class='fa fa-times' style='color: red;'></i>delete</a></td>";

    echo "</tr>";

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
        $note_del = mysqli_real_escape_string($conn, $_GET['del']);
        $file_uploader = $_SESSION['username'];
        $del_query = "DELETE FROM users WHERE username='$username'";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('user deleted successfully');
            window.location.href='index.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }

         if (isset($_GET['approve'])) {
        $note_approve = mysqli_real_escape_string($conn,$_GET['approve']);
        $approve_query = "UPDATE users SET token='yes' WHERE username='$username'";
        $run_approve_query = mysqli_query($conn, $approve_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('user approved successfully');
            window.location.href='index.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
       

?>
<?php 
}
else {
    ?>


 <h3 class="page-header">
                            <center> <marquee width = 70% ><font color="green" ><?php echo $_SESSION['course']; ?> Engineering </font><font color="brown">User Approvals</font></marquee></center>
                        </h3>

                    </div>
                </div>
<div class="row">
<div class="col-lg-12">
        <div class="table-responsive">

<form action="" method="post">
            <table class="table table-bordered table-striped table-hover">


            <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type </th>
                        <th>Uploaded by</th>
                        <th>Uploaded on</th>
                        <th>Download</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>

                 <?php
                 $currentusercourse = $_SESSION['course'];

$query = "SELECT * FROM uploads WHERE file_uploaded_to = '$currentusercourse' AND status = 'approved' ORDER BY file_uploaded_on DESC";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $file_id = $row['file_id'];
    $file_name = $row['file_name'];
    $file_description = $row['file_description'];
    $file_type = $row['file_type'];
    $file_date = $row['file_uploaded_on'];
    $file = $row['file'];
    $file_uploader = $row['file_uploader'];

    echo "<tr>";
    echo "<td>$file_name</td>";
    echo "<td>$file_description</td>";
    echo "<td>$file_type</td>";
    echo "<td><a href='viewprofile.php?name=$file_uploader' target='_blank'> $file_uploader </a></td>";
    echo "<td>$file_date</td>";
    echo "<td><a href='allfiles/$file' target='_blank' style='color:green'>Download </a></td>";
     echo "<td>approved by Admin </td>";
 echo "</tr>";


}
}
?>
  </tbody>
            </table>
</form>
</div>
</div>
</div>
<?php }
 
 ?>




<script src="js/jquery.js"></script>

  
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php include 'includes/connection.php';?>
<?php include 'includes/navbar.php';?>

<h3 class="page-header">
                            <center> <marquee width = 70% ><font color="green" > Self Employment Service booking...</font></marquee></center>
                        </h3>
<div class="row">
<div class="col-lg-12">
        <div class="table-responsive">


<?php
$req=$_GET['varname'];

$sql = "SELECT * from users where requirment='$req' and role='skilledperson'";
$rs_2 = mysqli_query($conn, $sql);
if (!$rs_2) { die("Query failed - " . mysqli_error($conn)); }

mysqli_close($conn);
?>


<body style="background-color: #2053df"><br><br><br><br>
    <div >
        <h1 style="font-size: 30px; font-weight: bold;text-shadow: 2px 2px orange; text-align: center;">Technician Details</h1><br>
       <div style="width: 800px; background-color: white; border: double; border-radius: 10px; margin: auto;">
        <br><br>
        <table style="height: 200px; margin: auto; width: 800px">
            <form method="post"> 
                                    
                        <?php
                            if(mysqli_num_rows($rs_2) > 0)
                               
                                while($row = mysqli_fetch_array($rs_2, MYSQLI_ASSOC))
                                {
                                    // echo '<div class="col-w-6">';
                                    // echo '<div class="row top-org" style="margin-bottom: 6px; border-bottom: 1px solid #eaeaea;">';
                                    // echo '<div class="img-thumbnail-sm" style="background-image: url(\''. htmlspecialchars($row["Photo"]) .'\')"></div>';
                                    echo '<div class="top-org-desc">';
                                    echo '<h4>'. htmlspecialchars($row["fullname"]) .'</h4>';
                                    
                                    echo '<p class="small-p">Role : '. htmlspecialchars($row["role"]) .'</p>';
                                    echo '<p class="small-p">Email : '. htmlspecialchars($row["email"]) .'</p>';
                                    echo '<p class="small-p">Specialization : '. htmlspecialchars($row["requirment"]) .'</p>';
                                    echo '<p class="small-p">Location : '. htmlspecialchars($row["address"]) .'</p>';
                                  
                                   echo '</div></div></div>';
                                    echo '<br><br><br>';

                                }
                               
                        ?>

</form>
</table></div></div></body>
<?php include 'includes/footer.php';?>
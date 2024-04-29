<?php include 'includes/connection.php';?>
<?php include 'includes/navbar.php';?>

<h3 class="page-header">
                            <center> <marquee width = 70% ><font color="green" > Self Employment Service booking...</font></marquee></center>
</h3>

<?php


$sql = "SELECT DISTINCT address FROM users where role='skilledperson'";
$rs = mysqli_query($conn, $sql);
if (!$rs) { die("Query failed - " . mysqli_error($conn)); }

if (mysqli_num_rows($rs) > 0) {
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $places[] = $row["address"];
    }
}
?>

<?php

mysqli_free_result($rs);

if((isset($_POST["search"]) && $_POST["search"] == "Search") || (isset($_GET["address"])))
{
    $isSearch = true;

    // if its get request
    if(isset($_GET["address"]) && $_GET["address"] != "all")
    {
        $address = validate_form_data($conn, $_GET["address"]);
        $q = "";
    }
    else if(isset($_GET["address"]) && $_GET["address"] == "all")
    {
        $address = "";
        $q = "";
    }

    // if its post request
    if(isset($_POST["q"]))
    {
        $q = mysqli_real_escape_string($conn, $_POST["q"]);
        if(isset($_POST["address"]))
            $address = mysqli_real_escape_string($conn, $_POST["address"]);
        else
            $address = "";

    }

    $sql = sprintf("SELECT * from users WHERE address LIKE '%%%s%%'", $city, $q);
    $rs = mysqli_query($conn, $sql);
    if(!$rs) { die("Query failed - " . mysqli_error($conn)); }
    $rowfound = mysqli_num_rows($rs);

}
// Closing Connection
mysqli_close($conn);
?>

<body style="background-color: #2053df"><br><br><br><br><br><br><br><br><br><br><br>
    <div >
        <h1 style="font-size: 30px; font-weight: bold;text-shadow: 2px 2px orange; text-align: center;">Log-in</h1><br>
       <div style="width: 400px; background-color: white; border: double; border-radius: 10px; margin: auto;">
        <br><br>
        <table style="height: 200px; margin: auto; width: 300px">
            <form method="post"> 
                                    <select name="city" id="city" class="searchcity">
                                        <option disabled="disabled" selected>Select city</option>
                                        <?php
                                            for ($i = 0; $i < count($places); $i++) {
                                                echo '<option value="'. htmlspecialchars(ucwords(strtolower($places[$i]))) .'">'. htmlspecialchars(ucwords(strtolower($places[$i]))) .'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-w-5">
                                    <input type="text" name="q" class="searchcity" placeholder="Search organisation name.." value="<?php if(isset($_POST["q"])) echo $_POST["q"];?>">
                                </div>
                                <div class="col-w-2">
                                    <input type="submit" name="search" value="Search" class="btn searchcity" style="padding-top: 10px; padding-bottom: 10px;">
                                </div>
                            </div>

</form></table></div></div></body>
<?php include 'includes/footer.php';?>
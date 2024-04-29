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

<?php


$sql = "SELECT DISTINCT address FROM users where role='skilledperson'";
$rs = mysqli_query($conn, $sql);
if (!$rs) { die("Query failed - " . mysqli_error($conn)); }

if (mysqli_num_rows($rs) > 0) {
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $places[] = $row["address"];
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

<form class="form-controls" action="search.php" method="post">
                            <div class="row form-controls-row clearfix">
                                <div class="col-w-5">
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


                        <?php
                            if(isset($isSearch))
                            {
                                if(mysqli_num_rows($rs) > 0)
                                while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
                                {
                                    
                                    echo '<h4>'. htmlspecialchars($row["fullname"]) .'</h4>';
                                    
                                        echo '<p class="small-p"><i class="fa fa-map-marker" aria-hidden="true"></i> '. htmlspecialchars($row["ddress"] . ' ' . $row["registeredon"] . ', ' . $row["gender"] . ', ' . $row["education"]) .'<br /><i class="fa fa-phone" aria-hidden="true"></i> '. htmlspecialchars($row["address"]) .'<br /></p>';
                                    echo '</div></div>';
                                }
                            // Freeing up result source
                            if(isset($isSearch))
                                mysqli_free_result($rs);
                        ?>
</form>
</body>
</html>
<?php include 'includes/footer.php';?>

































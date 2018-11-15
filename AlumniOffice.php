<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<HTML>
<HEAD>
<TITLE>SCU Businesses Directory</TITLE>
</HEAD>

<div class="w3-flat-pomegranate">
<div Align =left> <a href="index.php" class="w3-button w3-black">Back to directory</a></div>
<div Align =left> <a href="users.php" class="w3-button w3-black">View Users</a></div>
<H1 ALIGN=CENTER>Alumni Office Admin Page</H1>
</div>

<?php
	include 'functions.php';
    $i = 0;
    foreach ($_POST as $var){
        if ($var != ""){
            $i++;
	}
    }
    if($i==1){
        removeListingAdmin($_POST["DeleteName"]);
    }
?>


<?php
    include 'functions.php';
    $i = 0;
    foreach ($_POST as $var){
        if ($var != ""){
            $i++;
        }
    }
    if($i==1){
        approveListing($_POST["ApproveName"]);
    }
?>
<div class="w3-row-padding w3-content" style="max-width:1400px">
    <?php
	
        getListingsAdmin();
    ?>
</div>

<div class="w3-third">
    <div class="w3-container w3-light-grey w3-justify">
    <h3>Remove Listing </h3>
    <form action="AlumniOffice.php" method = "post">
        Name: <input type="text" name="DeleteName" value=""><br>

        <input type="submit" value="Filter">
    </form>
    </div>
    <div class="w3-container w3-light-grey w3-justify">
        <h3>Remove Listing </h3>
        <form action="AlumniOffice.php" method = "post">
        Name: <input type="text" name="ApproveName" value=""><br>

        <input type="submit" value="Filter">
        </form>
    </div>
</div>
</div>

<br>

</HTML>

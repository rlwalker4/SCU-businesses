<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<HTML>
<HEAD>
<TITLE>SCU Businesses Directory</TITLE>
<style>
h1{
    font-family: 'Prata', serif;
color: #FFFFFF;
    background-color: #72001B;
}
h3{
    color: #72001B;
}
h5{
    color: #72001B;
}
</style>
</HEAD>

<div Align =left> <a href="index.php" class="w3-button w3-black">Back to directory</a></div>
<div Align =left> <a href="users.php" class="w3-button w3-black">View Users</a></div>
<div class="w3-container">
<h1 ALIGN=CENTER>Alumni Office Admin Page
</h1>
</div>
</div>

<?php
	include 'functions.php';
	if(!empty($_POST["DeleteName"])){
	    removeListingAdmin($_POST["DeleteName"]);
	}
	if(!empty($_POST["ApproveName"])){
	    approveListing($_POST["ApproveName"]);
	}
	if(!empty($_POST["EditHash"])){
		editListing($_POST["EditHash"]);
	}
?>

<div class="w3-container">
	<div class="w3-quarter">
        <div class="w3-twothird">
            <div class="w3-container w3-light-grey w3-justify">
                <h3>Remove Listing </h3>
                <form action="AlumniOffice.php" method = "post">
                HASH <input type="text" name="DeleteName" value=""><br><br>
                <input type="submit" value="Remove">
                </form>
            </div>
			<br>
			<div class="w3-container w3-light-grey w3-justify">
				<h3>Approve Listing </h3>
				<form action="AlumniOffice.php" method = "post">
				HASH <input type="text" name="ApproveName" value=""><br><br>
				<input type="submit" value="Approve">
				</form>
			</div>
			<br>
			<div class="w3-container w3-light-grey w3-justify">
				<h3>Approve Edit Request</h3>
				<form action="AlumniOffice.php" method = "post">
				HASH <input type="text" name="????????" value=""><br><br>
				<input type="submit" value="Approve">
				</form>
			</div>
        </div>
    </div>
    <?php
    getListingsAdmin();
    ?>
    
	<br>
</div>

<br>
<p>
<br>
Disclaimer: The content of these web pages is not generated by and does not represent the views of Santa Clara University or any of its departments or organizations.
</p>

</HTML>

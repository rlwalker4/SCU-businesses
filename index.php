<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<HTML>
<HEAD>
<TITLE>SCU Businesses Directory</TITLE>
</HEAD>

<?php
	include 'functions.php';
	$i = 0;
	foreach ($_POST as $var){
		if($var != "")
			$i++;
	}
	if($i == 7){
		addListing($_POST["Name"], $_POST["LocationA"], $_POST["TypeA"], $_POST["Info"], $_POST["GradYear"], $_POST["Username"], $_POST["Degree"]);
	}
?>

<div class="w3-flat-pomegranate">
<div Align =left> <a href="AlumniOffice.php" class="w3-button w3-black">Alumni Office Login</a></div>
<H1 ALIGN=CENTER>SCU Alumni Businesses</H1>
</div>

<div class="w3-row-padding w3-content" style="max-width:1400px">
	

	<?php
		$i = 0;
		foreach ($_POST as $key => $var){
			if($var != "")
				$i++;
		}
		if($i == 2)
			getListings(1, $_POST["LocationF"], $_POST["TypeF"]);
		else if($i == 1 && $key == "TypeF" && $_POST["TypeF"] != "")
			getListings(1, "", $_POST["TypeF"]);
		else if($i == 1)
			getListings(1, $_POST["LocationF"], "");
		else
			getListings(1, "", "");
		
		//getListings(1);
	?>

    <div class="w3-third">
        <div class="w3-container w3-light-grey w3-justify">
            <h3>Filter By: </h3>
                <form action="index.php" method = "post">
                Location: <input type="text" name="LocationF" value=""><br>
                Business Type: <input type="text" name="TypeF" value=""><br>
                <input type="submit" value="Filter">
                </form>
        </div>
        <br>
        <div class="w3-container w3-light-grey w3-justify">
            <h3>Add New Business: </h3>
                <form action="index.php" method = "post">
                Name: <input type="text" name="Name" value=""><br>
                Location: <input type="text" name="LocationA" value=""><br>
                Type: <input type="text" name="TypeA" value=""><br>
                Info: <input type="text" name="Info" value=""><br>
                Grad Year: <input type="text" name="GradYear" value=""><br>
                Username: <input type="text" name="Username" value=""><br>
                Degree: <input type="text" name ="Degree" value = ""><br>
                <input type="submit" value="Submit">
                </form>
        </div>
    </div>
</div>

<br>

</HTML>

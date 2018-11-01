<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<HTML>
<HEAD>
    <TITLE>SCU Businesses Directory</TITLE>
</HEAD>

<div class="w3-flat-pomegranate">
    <div Align =left> <a href="AlumniOffice.php" class="w3-button w3-black">Alumni Office Login</a></div>
    <H1 ALIGN=CENTER>SCU Alumni Businesses</H1>
</div>


<div class="w3-row-padding w3-content" style="max-width:1400px">
    <div class="w3-twothird">
        <ul class="w3-ul w3-border">
            <li><h2>Names</h2></li>
            <li>Jill</li>
            <li>Eve</li>
            <li>Adam</li>
        </ul>
    </div>
    <div class="w3-third">
        <div class="w3-container w3-light-grey w3-justify">
            <p>
            <label class="w3-text-blue"><b>Within how many miles</b></label>
            <input class="w3-input w3-border" name="distance" type="text"></p>

        </div>
    </div>
</div>

<br>

<?php
	include 'functions.php';
	echo "This is a test of PHP.";
	getListings(1);
	//addListing('fakename', 'fakeloc', 'faketype', 'fakeinfo', 'fakeusername', 'fakeyear', 'fakedegree');
	getListings(1);
?>

</HTML>

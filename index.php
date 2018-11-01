<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<HTML>
<HEAD>
<TITLE>SCU Businesses</TITLE>
</HEAD>

<div class="w3-flat-pomegranate">
<div Align =left> <a href="AlumniOffice.php" class="w3-button w3-black">Alumni Office Login</a></div>
<H1 ALIGN=CENTER>SCU Alumni Businesses</H1>


</div>

</BODY>

<ul class="w3-ul w3-border">
    <li><h2>Names</h2></li>
    <li>Jill</li>
    <li>Eve</li>
    <li>Adam</li>
</ul>

<br>

<?php
	include 'functions.php';
	echo "This is a test of PHP.";
	getListings(1);
	addListing('fakename', 'fakeloc', 'faketype', 'fakeinfo', 'fakeusername', 'fakeyear', 'fakedegree');
?>

</HTML>

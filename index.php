<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<HTML>
<HEAD>
<TITLE>SCU Businesses</TITLE>
</HEAD>


<H1 ALIGN=CENTER>SCU Alumni Businesses</H1>

Find SCU alumni-owned businesses. If you are an SCU Alum, please add your business listing here.

</BODY>

<HR COLOR="#990033">

<UL>
  <LI><A HREF="AlumniOffice.php">Alumni Office Use Only</A>
</UL>

<HR COLOR="#990033">

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

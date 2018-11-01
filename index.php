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

<br>
<?php
	include 'functions.php';
	echo "This is a test of PHP.";
	getListings(1);
	addListing('fakename', 'fakeloc', 'faketype', 'fakeinfo', 'fakeusername', 'fakeyear', 'fakedegree');
?>

</HTML>

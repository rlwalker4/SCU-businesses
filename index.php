<HTML>
<HEAD>
<TITLE>SCU Businesses</TITLE>
</HEAD>

<BODY BGCOLOR="#ffffcc" TEXT="#000000" LINK="#ff0000" VLINK="#990033">

<H1 ALIGN=CENTER>SCU Alumni Businesses</H1>

Find SCU alumni-owned businesses. If you are an SCU Alum, please add your business listing here.

</BODY>

<HR COLOR="#990033">

<UL>
  <LI><A HREF="http://www.scu.edu">Santa Clara University</A>
  <LI><A HREF="http://www.engr.scu.edu">SCU School of Engineering</A>
  <LI><A HREF="http://www.dc.engr.scu.edu">SCU Engineering Design Center</A>
  <LI><A HREF="http://students.engr.scu.edu">Engineering Student Webpages</A>
  <LI><A HREF="AlumniOffice.php">Test page</A>
<LI><A HREF="test.php">Alumni Office Use Only</A>
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

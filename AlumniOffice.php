<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<HTML>
<HEAD>
<TITLE>SCU Businesses Directory</TITLE>
</HEAD>

<div class="w3-flat-pomegranate">
<div Align =left> <a href="index.php" class="w3-button w3-black">Back to directory</a></div>
<H1 ALIGN=CENTER>Alumni Office Admin Page</H1>
</div>


<div class="w3-row-padding w3-content" style="max-width:1400px">
<table class="w3-twothird w3-table-all w3-card-2">
<tr>
<th>Name</th>
<th>Business Type</th>
<th>Location</th>
</tr>
<tr>
<td>Bob's Burgers</td>
<td>
<?php
    echo "PHP";
    ?>
</td>
<td>SCU</td>
</tr>
</table>

<div class="w3-third">
<div class="w3-container w3-light-grey w3-justify">
<h3>Filter By: </h3>
</div>
</div>
</div>


<br>

<?php
    include 'functions.php';
    echo "This is a test of PHP.";
    getListings(1);
    addListing('fakename', 'fakeloc', 'faketype', 'fakeinfo', 'fakeusername', 'fakeyear', 'fakedegree');
    ?>

</HTML>

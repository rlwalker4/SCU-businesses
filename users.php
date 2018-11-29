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
<div class="w3-container">
<h1 ALIGN=CENTER>Registered Users</h1>
</div>

<?php
	include 'functions.php';
	
?>
<div class="w3-row-padding w3-content" style="max-width:1400px">
    <?php
	getUsers();
    ?>
</div>

<br>

</HTML>

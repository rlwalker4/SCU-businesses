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
                <form action="index.php" method = "addListing">
                Location: <input type="text" name="Location" value=""><br>
                Business Type: <input type="text" name="Type" value=""><br>
                <input type="submit" value="Filter">
                </form>
        </div>
        <br>
        <div class="w3-container w3-light-grey w3-justify">
            <h3>Add New Business: </h3>
                <form action="index.php" method = "addListing">
                Name: <input type="text" name="Name:" value=""><br>
                Location: <input type="text" name="Location" value=""><br>
                Type: <input type="text" name="Type" value=""><br>
                Info: <input type="text" name="Info" value=""><br>
                Grad Year: <input type="text" name="Grad Year" value=""><br>
                Username: <input type="text" name="Username" value=""><br>
                Degree: <input type="text" name ="Degree" value = ""><br>
                <input type="submit" value="Submit">
                </form>
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

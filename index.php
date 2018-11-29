<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,700|Prata" rel="stylesheet">
<HTML>
<HEAD>
<TITLE>SCU Businesses</TITLE>
<style>
h1{
	font-family: "Times New Roman", Times, serif;
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

<?php
	include 'functions.php';
	$i = 0;
	foreach ($_POST as $var){
		if($var != "")
			$i++;
	}
	if(!empty($_POST["NameViewer"]) and !empty($_POST["ContactInfo"])){
		addUser($_POST["NameViewer"], $_POST["ContactInfo"]);
	}
	if(!empty($_POST["LocationA"]) and !empty($_POST["TypeA"]) and !empty($_POST["Info"]) and !empty($_POST["Username"]) and !empty($_POST["GradYear"]) and !empty($_POST["Degree"])){
		if(!empty($_POST["NameAdd"])){
			addListing($_POST["NameAdd"], $_POST["LocationA"], $_POST["TypeA"], $_POST["Info"], $_POST["Username"], $_POST["GradYear"], $_POST["Degree"], 0);
		}
		else if(!empty($_POST["NameEdit"])){
			addListing($_POST["NameEdit"], $_POST["LocationA"], $_POST["TypeA"], $_POST["Info"], $_POST["Username"], $_POST["GradYear"], $_POST["Degree"], 1);
		}
	}
?>
<body onload= "PopCheck()" >

    <div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
    <header class="w3-container w3-flat-pomegranate">
    <span onclick="document.getElementById('id02').style.display='none'"
    class="w3-button w3-display-topright">&times;</span>
    <h2>Enter Alumni Info</h2>
    </header>
    <div class="w3-container">
        <form action="index.php" method = "post">
        Name<br> <input type="text" name="NameViewer" value=""><br>
        Contact Info<br><input type="text" name="ContactInfo" value=""><br>

        <input type="submit" value="Submit">
        </form>

    </div>
    </div>
</div>
            <script>
                 function PopCheck(){
                     if(localStorage.getItem("firstPopUp") == null){
                         document.getElementById('id02').style.display='block'
                         localStorage.setItem("firstPopUp", true);
                     }
                 }
            </script>
                 
<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Alumni Office Login</button>
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-flat-pomegranate">
                <span onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright">&times;</span>
                <h2>Alumni Office Login</h2>
            </header>
            <div class="w3-container">
                <form method="POST" class="form1" onsubmit="return checkPassword();">
                    <br>
                    Password: <input type="password" id="password">
                    <input  class"buttons" type="submit" value="Submit" >
                </form>
            </div>
        </div>
    </div>






<!--
https://stackoverflow.com/questions/35710019/javascript-simple-redirect-after-password-is-entered
used this to set up the javascript function to send the password value to go to a new page
-->
        <script>
            function checkPassword(){
               
                if(document.getElementById('password').value == 'hello'){
                    alert('Correct Password!');
                    location.href="AlumniOffice.php";
                    return false;
                } else {
                    alert('Wrong Password!');
                    return false;
                }
        
            }
    </script>
    </div>
</div>

<div class="w3-container">
	<h1 ALIGN=CENTER>SCU Alumni Businesses
	</h1>
</div>


<div class="w3-container">
    <div class="w3-quarter">
        <div class="w3-twothird">
            <div class="w3-container w3-light-grey w3-justify">
                <h3>Filter By</h3>
                    <form action="index.php" method = "post">
					Name<br> <input type="text" name="Name" value=""><br>
                    Location<br><input type="text" name="LocationF" value=""><br>
                    Business Type<br><input type="text" name="TypeF" value=""><br>
					Description<br>
					<textarea rows="4" cols = "20" name="Info"></textarea><br><br>
                    <input type="submit" value="Filter">
                    </form>
            </div>
            <br>
            <div class="w3-container w3-light-grey w3-justify">
                <h3>Add New Business</h3>
                    <form action="index.php" method = "post">
                    Name<br> <input type="text" name="NameAdd" value=""><br>
                    Location<br><input type="text" name="LocationA" value=""><br>
                    Business Type<br><input type="text" name="TypeA" value=""><br>
                    Description<br>
					<textarea rows="4" cols = "20" name="Info"></textarea><br><br>
                    <h5>Verify Alumni Status</h5>
                    Grad Year<br><input type="text" name="GradYear" value=""><br>
                    Username<br><input type="text" name="Username" value=""><br>
                    Degree<br><input type="text" name ="Degree" value = ""><br><br>
                    <input type="submit" value="Submit">
                    </form>
            </div>
			<br>
			<div class="w3-container w3-light-grey w3-justify">
                <h3>Edit Business Listing</h3>
                    <form action="index.php" method = "post">
                    Name<br> <input type="text" name="NameEdit" value=""><br>
                    Location<br><input type="text" name="LocationA" value=""><br>
                    Business Type<br><input type="text" name="TypeA" value=""><br>
                    Description<br>
					<textarea rows="4" cols = "20" name="Info"></textarea><br><br>
                    <h5>Verify Alumni Status</h5>
                    Grad Year<br><input type="text" name="GradYear" value=""><br>
                    Username<br><input type="text" name="Username" value=""><br>
                    Degree<br><input type="text" name ="Degree" value = ""><br><br>
                    <input type="submit" value="Submit">
                    </form>
            </div>
        </div>
    </div>
	<?php
		$i = 0;
		foreach ($_POST as $key => $var){
			if($var != "")
				$i++;
		}
		if($i == 2 and empty($_POST["NameViewer"]))
			getListings($_POST["LocationF"], $_POST["TypeF"]);
		else if($i == 1 && $key == "TypeF" && $_POST["TypeF"] != "")
			getListings("", $_POST["TypeF"]);
		else if($i == 1)
			getListings($_POST["LocationF"], "");
		else
			getListings("", "");
		
		//getListings(1);
	?>


</div>



<p>
<br>
Disclaimer: The content of these web pages is not generated by and does not represent the views of Santa Clara University or any of its departments or organizations.
</p>

<br>
</HTML>



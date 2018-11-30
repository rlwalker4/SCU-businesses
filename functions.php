<!--
This file provides functions to access a Oracle database storing
information about business listings and the site's visitors.
It provides functions to update, modify, view, and filter results
from SQL commands to the server. Additionally, it returns formatted
tables in cases where the data returned is dynamic.
-->

<link rel="stylesheet" href="https://index.phpwww.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<?php

//connect()
//Establishes a connection between the page and the database.
//Returns a $conn variable used to access connection.
function connect(){
$conn = oci_connect('PPAULSON', 'coen174oracle', '//dbserver.engr.scu.edu/db11g');
if($conn) {
	return $conn;
} else {
	$e = oci_error;
	print "<br> connnection failed:";
	print htmlentities($e['message']);
	exit;
	}
}

//Executes an SQL command
//@params	$command	the SQL command to be executed, in string form
//			$conn		the connection to the database to be accessed
//@Returns	$stid		the data returned from the database
function executeCommand($command, $conn)
{
	$stid = oci_parse($conn, $command);
	if(!$stid){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	$response = oci_execute($stid);
	if(!$response){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	return $stid; 
}

//Gets a filtered set of business listings from the database. Prints a formatted table with the results.
//@Params		$filterLocation 	The desired location to filter by
//				$filterType			The desired business type to filter by
function getListings($filterLocation, $filterType)
{
	$conn = connect();
	$stid = 'SELECT * FROM listings WHERE IsApproved=1';
	if($filterLocation != ""){
		$stid = $stid . "AND BusinessLocation= '${filterLocation}'";
	}
	if($filterType != ""){
		$stid = $stid . "AND BusinessType= '${filterType}'";
	}

	$stid = executeCommand($stid, $conn);
	print "<table class='w3-twothird w3-table-all w3-card-2'>\n";
	print "<tr>\n<th>Name</th><th>Location</th><th>Business Type</th><th>Information</th>";
	while($row=oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		print "<tr>\n";
		$i = 0;
		foreach ($row as $item) {
			$i++;
			if($i < 5)
				print " <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
			}
		print "</tr>\n";
	}
	print "</table>\n";
	print "<br>";

	oci_free_statement($stid);
	oci_close($conn);
}

//Gets the full contents of the listings table. Prints a formatted table with the results.
function getListingsAdmin()
{
	$conn = connect();
	$stid = 'SELECT * FROM listings';
	$stid = executeCommand($stid, $conn);	
    	if(!$stid){
        	$e = oci_error($conn);
        	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    	}
	$response = oci_execute($stid);
	if(!$response){
        	$e = oci_error($conn);
        	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    	}
    	print "<table class='w3-twothird w3-table-all w3-card-2'>\n";
    	print "<tr>\n<th>Name</th><th>Location</th><th>Business Type</th><th>Information</th><th>Approved?</th><th>Edited?</th><th>Owner</th><th>Graduation Year</th><th>Degree</th>";
    	$i =0;

    	while($row=oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        	print "<tr>\n";
        	foreach ($row as $item) {
            		
            		print " <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
            	}
        	
        	print "</tr>\n";
        	$i++;
    	}
    	print "</table>\n";
    	print "<br>";
        
    	oci_free_statement($stid);
   	oci_close($conn);
}

//Adds a listing to the database. 
//@Params	$name		Business Name
//			$location	Business Location
//			$type		Business Type
//			$info		Business Info
//			$grad_year	Owner Graduation Year
//			$user_name	Owner Name
//			$degree		Owner Degree
//			$isEdit		Is this an edited listing?
function addListing($name, $location, $type, $info, $grad_year, $user_name, $degree, $isEdit){
	$conn = connect();
	$str = "INSERT INTO listings VALUES ('${name}', '${location}', '${type}', '${info}', 0, '${isEdit}', '${user_name}', '${grad_year}', '${degree}')";
	$stid = executeCommand($str, $conn);
	
	$str = "COMMIT";
	$stid = executeCommand($str, $conn);

	oci_free_statement($stid);
	oci_close($conn);
}

//Confirms an edited listing.
//@Params	$name		Business Name
function editListing($name){
	
	$conn = connect();
	$str = "DELETE FROM listings WHERE BusinessName='${name}' AND IsEdited=0";
	$stid = executeCommand($str, $conn);

	$str = "UPDATE listings SET IsApproved=1 WHERE BusinessName='${name}'";	
	$stid = executeCommand($str, $conn);

	$str = "UPDATE listings SET IsEdited = 0 WHERE BusinessName='${name}'";	
	$stid = executeCommand($str, $conn);

	$str = "COMMIT";
	$stid = executeCommand($str, $conn);
	oci_free_statement($stid);
	oci_close($conn);
}

//Removes a listing.
//@Params	$name		Business Name
function removeListing($name){
	
	$conn = connect();
	$str = "DELETE FROM listing WHERE BusinessName='${name}'";
	$stid = executeCommand($stid, $conn);
	oci_free_statement($stid);
	oci_close($conn);

}

//Confirms an edited listing.
//@Params	$name		Business Name
function removeListingAdmin($name){
	
	$conn = connect();
	$str = "DELETE FROM listings WHERE BusinessName='${name}'";
	$stid = executeCommand($str, $conn);
	oci_free_statement($stid);
	oci_close($conn);
	
}

//Approves a listing.
//@Params	$name		Business Name
function approveListing($name){
	
	$conn = connect();
	$str = "UPDATE listings SET IsApproved=1 WHERE BusinessName='${name}'";
	$stid = executeCommand($str, $conn);
	oci_free_statement($stid);
	oci_close($conn);
}

//Checks to see of a password is correct.
//@Param	$pass	The inputted password.
function checkAlumniLogin($pass){

	return strcmp($pass, "hello");
}

//Adds a user's contact information to the database.
//@Params	$name		User Name
//			$contact	Contact Information
function addUser($name, $contact){
		
	$conn = connect();
	$str = "INSERT INTO visitors VALUES ('${name}', '${contact}')";
	$stid = executeCommand($str, $conn);
	
	$str = "COMMIT";
	$stid = executeCommand($str, $conn);

	oci_free_statement($stid);
	oci_close($conn);
}

//Displays a list of all users who have given their contact information.
function getUsers(){

    $conn = connect();
    $stid = 'SELECT * FROM visitors';
 	$stid = executeCommand($stid, $conn);
    print "<table class='w3-twothird w3-table-all w3-card-2'>\n";
    print "<tr>\n<th>Name</th><th>Email</th>";
    while($row=oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        print "<tr>\n";
        foreach ($row as $item) {
            print " <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
            }
        print "</tr>\n";
    }
    print "</table>\n";
    print "<br>";
        
    oci_free_statement($stid);
    oci_close($conn);
}

?>

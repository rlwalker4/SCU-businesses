<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<?php
function connect()
{
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

function getListings($admin, $filterLocation, $filterType)
{
	$conn = connect();
	if($admin)
	{
		$stid = 'SELECT * FROM listings';
	} else {
		$stid = 'SELECT * FROM listings WHERE IsApproved=1';
	}

	if($filterLocation != ""){
		$stid = $stid . ", BusinessLocation='${filterLocation}'";
	}
	if($filterType != ""){
		$stid = $stid . ", BusinessType= '${filterLocation}'";
	}
	$stid = oci_parse($conn, $stid)
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

function getListingsAdmin($admin)
{
    $conn = connect();
    if($admin)
    {
        $stid = oci_parse($conn, 'SELECT * FROM listings');
    } else {
        $stid = oci_parse($conn, 'SELECT * FROM listings WHERE IsApproved=1');
    }
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
    print "<tr>\n<th>Name</th><th>Location</th><th>Business Type</th><th>Information</th><th>HASH</th><th>IsApproved</th><th>Delete</th>";
    $i =0;
    while($row=oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        print "<tr>\n";
        
        $deleteNameValue;
        foreach ($row as $item) {
            if($deleteNameValue == null){
               $deleteNameValue =  $item;
            }
            print " <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
            }
        print "<td> <button name='buttonName".i."' value=". $deletNameValue." onClick ='deleteListing(buttonName".i.")' > <i class='fas fa-trash'></i></button></td>\n";
        print "</tr>\n";
        i++;
    }
    print "</table>\n";
    print "<br>";
        
    oci_free_statement($stid);
    oci_close($conn);
}

function addListing($name, $location, $type, $info, $grad_year, $user_name, $degree){
	$conn = connect();
	$hashstr = $grad_year . $user_name . $degree;
	$hashstr = hash('sha256', $hashstr);
	$str = "INSERT INTO listings VALUES ('${name}', '${location}', '${type}', '${info}', '${hashstr}', 0)";
	echo $str;
	$stid = oci_parse($conn, $str);
	if(!$stid){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	echo $stid;
	$response = oci_execute($stid);
	if(!$response){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	
	$str = "COMMIT";
	echo $str;
	$stid = oci_parse($conn, $str);
	if(!$stid){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	$response = oci_execute($stid);
	if(!$response){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	oci_free_statement($stid);
	oci_close($conn);
}

function removeListing(){

}

function removeListingAdmin($name){
	
	$conn = connect();
	$str = "DELETE FROM listings WHERE Businessname='${name}'";
	$stid = oci_parse($conn, $str);
	if(!$stid){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	$response = oci_execute($stid);
	if(!$response){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	oci_free_statement($conn);
	oci_close($conn);
	
}

function approveListing($name){
	
	$conn = connect();
	$str = "UPDATE listings SET IsApproved=1 WHERE BusinessName='${name}'"
	$stid = oci_parse($conn, $str);
	if(!$stid){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	$response = oci_execute($stid);
	if(!$response){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	oci_free_statement($conn);
	oci_close($conn);
}
?>


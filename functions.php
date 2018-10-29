<?php
function connect()
{
$conn = oci_connect('PPAULSON', 'coen174oracle', '//dbserver.engr.scu.edu/db11g');
if($conn) {
	print "<br> connection successful <br>";
	return $conn;
} else {
	$e = oci_error;
	print "<br> connnection failed:";
	print htmlentities($e['message']);
	exit;
	}
}

function getListings($admin)
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
	//TODO check $response
	if(!$response){
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	$loop = 'loop';
	echo $loop;
	print "<table border='1'>\n";
	while($row=oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		echo $loop;
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

function addListing($name, $location, $type, $info, $grad_year, $user_name, $degree){
	$conn = connect();
	$hashstr = $grad_year . $user_name . $degree;
	echo $hashstr;
	$str = "INSERT INTO listings VALUES ('${name}', '${location}', '${type}', '${info}', '${hashstr}', 0);"
	echo $str;
	//$stid = oci_parse($conn, 'INSERT INTO listings VALUES ('${name}'
	
	
	//oci_free_statement($stid);
	oci_close($conn);
}
?>


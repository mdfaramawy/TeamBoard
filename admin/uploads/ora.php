<?php
//phpinfo();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$conn = oci_connect("hr", "hr", " PROD ", 'AL32UTF8'); 

if(!$conn){
	$e = Oci_error(); 
	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
else { 	


	$sql = 'SELECT last_name FROM employees WHERE Employee_Id=:id';
	$stid = oci_parse($conn, $sql);	
	
	//bind parameter
	 $entityBody = json_decode(file_get_contents("php://input"));
	 $eid = $entityBody->id;
	
	oci_bind_by_name($stid , ":id" , $eid);//$this->last_name);
	oci_execute($stid);
	//oci_fetch_all($stid , $out);
	$rowcount = oci_num_rows($stid);
	
    //echo $rowcount;//count($out['LAST_NAME']);	
	$users_arr=array(); 
	$users_arr["EMPS_DATA"]=array();
	while (($row = OCI_FETCH_ARRAY($stid , OCI_ASSOC))!= false) {
	$users_item=array(
	"last_name" => $row['LAST_NAME']
	);
	array_push($users_arr["EMPS_DATA"], $users_item);
		}
    // show products data in json format
echo json_encode($users_arr);
}

//echo $entityBody->id;


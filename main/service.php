<?php

include_once "dbConnection.php";

use dbConnection;
// Check for empty fields
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
if(!empty($request) || $request != ''){
        $dbObject = new dbConnection();
        $query = "insert into manufacturer (name,isactive) values(?,?)";
        $params = array($request->name,$request->isActive);
        $result = $dbObject->execute_query($dbObject,$query,$params);
        if($result['rows_affected'] != 0){
                $response = array('message' => "Data saved successfully",
                                  'rows' => $result['rows_affected'],
                                  'success' => true);
                    print_r(json_encode($response));
        }

}

?>


<?php
  class dbConnection {
     private  $conn;
     private $serverName = "Bhavani\\sqlexpress"; //serverName\instanceName

     // Since UID and PWD are not specified in the $connectionInfo array,
     // The connection will be attempted using Windows Authentication.
     private $connectionInfo = array( "Database"=>"car_inventory");

     function __construct () {
          $conn1 = sqlsrv_connect( $this->serverName, $this->connectionInfo);
          if( $conn1 ) {
               $this->conn = $conn1;
     }else{
       echo "Connection could not be established.<br />";
       die( print_r( sqlsrv_errors(), true));
     }
}
     function execute_query($conn, $query, $params = array()){
          $doing_query = sqlsrv_query( $this->conn, $query, $params );
          $this->data_array['rows_affected'] = sqlsrv_rows_affected( $doing_query);
          if (!$doing_query == false){
               while ($row = sqlsrv_fetch_array($doing_query)) {
                    $this->data_array[] = $row;                                                    
               }
          } else {
               die( print_r( sqlsrv_errors(), true));
          }
           return $this->data_array;  

     }  
}
?>
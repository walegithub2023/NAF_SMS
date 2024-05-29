<?php
/* function to log or insert event into the audit trail table starts here */
function log_event($conn, $svcNo, $action, $description, $unitCode) {


    //set your default time zone
    date_default_timezone_set('W. Central Africa Standard Time');

    //get the current DateTime
    $dateTime = date('Y-m-d H:i:s');


    //create audit_id or event for the event

    $audit_id = uniqid() ;

    // Prepare the SQL statement
    $auditTrailSql = "INSERT INTO audittrail (AUDIT_ID, SVC_NO, ACTION, DESCRIPTION, UNIT_CODE, DATE_TIME) 
    VALUES ('$audit_id', '$svcNo', '$action', '$description', '$unitCode', '$dateTime')";

     //Check whether record has been inserted successfully
    try{
            if ($conn->query($auditTrailSql) !== TRUE) {
                throw new Exception();
            }else{
                $successMessage = 'SUCCESSFUL!...';
            }
        }
    catch(Exception $ex)
            {   
               $failureMessage = 'OOPS...! FAILED.';
     
    }
}
/* function to log or insert event into the audit trail table ends */

?>
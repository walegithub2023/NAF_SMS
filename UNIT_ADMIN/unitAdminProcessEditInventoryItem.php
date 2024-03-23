<?php
session_start();
include('../Connection.php');
include('../functions.php');

if(isset($_POST['update'])){

$id = $_POST['id'];
$item = $_POST['item'];
$type = $_POST['type'];
$qty = $_POST['qty'];
$svc = $_POST['svc'];
$us = $_POST['us'];
$unit = $_POST['unit'];
$office = $_POST['office'];
$model = $_POST['model'];
$deployment = $_POST['deployment'];
$location = $_POST['location'];
$description = $_POST['description'];
$remark = $_POST['remark'];
    
         //create a function to validate user input
          function validate($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }

          
          //validate user input
          $id = validate($id);
          $item = validate($item);
          $type = validate($type);
          $qty = validate($qty);
          $svc = validate($svc);
          $us = validate($us);
          $unit = validate($unit);
          $office = validate($office);
          $model = validate($model);
          $deployment = validate($deployment);
          $location = validate($location);
          $description = validate($description);
          $remark = validate($remark);
    
    
   
try{

    $updateSQL = "UPDATE inventory SET ITEM = '$item', ITEM_TYPE = '$type', QTY = '$qty', 
    SVC = '$svc', US = '$us', UNIT_CODE = '$unit', OFFICE = '$office', MODEL = '$model', DEPLOYMENT = '$deployment', 
    LOCATION = '$location', DESCRIPTION = '$description', REMARK = '$remark' WHERE ID = '$id'";
     
    
    //Check whether record has been inserted successfully

    if ($conn->query($updateSQL) !== TRUE) {
        throw new Exception();

    } else {

        $_SESSION["successMessageForEditInventoryItem"] = '<div class="alert alert-dismissible" style="background-color: #198754; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="unitAdminEqptInventory" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                INVENTORY ITEM RECORD UPDATED SUCCESSFULLY......
                </div>';
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "update";
                $description = "$userSvcNo"." "."updated an Item named ->$item in the inventory";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminEqptInventory");
                exit();

    }
    }catch(Exception $ex){
        echo "Error: " . $updateSQL . "<br>" . $conn->error;
    }

}
?>
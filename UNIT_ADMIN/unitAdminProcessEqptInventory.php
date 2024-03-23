<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {


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


$uniqId = uniqid();
    
          //create a function to validate user input
          function validate($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }

          
          //validate user input
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

          $uniqId = validate($uniqId);
      

     //Insert Data Into the Database. 
     $itemSQL = "INSERT INTO inventory (ID, ITEM, ITEM_TYPE, DESCRIPTION, QTY, SVC,	US, UNIT_CODE, OFFICE, MODEL, DEPLOYMENT, LOCATION, REMARK)
     VALUES ('$uniqId', '$item', '$type', '$description', '$qty', '$svc', '$us', '$unit', '$office', '$model', '$deployment', '$location', '$remark')";
    


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($itemSQL) == TRUE) {

                $_SESSION["successMessageForItem"] = "<div class='alert alert-dismissible' style='background-color: #198754; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminEqptInventory' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                ITEM ADDED TO INVENTORY SUCCESSFULLY...
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "add";
                $description = "$userSvcNo"." "."added a new item named ->$item to the iventory";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminEqptInventory");
                exit();
            }else{

                $_SESSION["failureMessageForItem"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminEqptInventory' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                OOPS...! ITEM NOT ADDED TO THE INVENTORY. TRY AGAIN.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a new item named ->$item to the iventory";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminEqptInventory");
                exit();
            }
        }
    catch(Exception $e)
            {   
                $_SESSION["failureMessageForItem"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminEqptInventory' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                OOPS...! ITEM NOT ADDED TO THE INVENTORY. TRY AGAIN.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a new item named ->$item to the iventory";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminEqptInventory");
                exit();
     
            }
}
?>
<?php 
}else{
    header("Location: ../login");
    exit();
}
  ?>

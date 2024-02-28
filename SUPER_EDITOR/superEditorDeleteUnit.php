<?php
include("../Connection.php");

    if(isset($_GET['unitCode'])){
        $unitCode = $_GET['unitCode'];
        $deleteSQL = "DELETE FROM units WHERE UNIT_CODE = '$unitCode'";

        
       $deleteResult = mysqli_query($conn, $deleteSQL);
       header("Location: superEditorUnits");
       exit();
}


?>

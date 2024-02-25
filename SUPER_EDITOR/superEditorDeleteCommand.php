<?php
include("../Connection.php");

    if(isset($_GET['commandCode'])){
        $commandCode = $_GET['commandCode'];
        $deleteSQL = "DELETE FROM commands WHERE COMMAND_CODE = '$commandCode'";

        
       $deleteResult = mysqli_query($conn, $deleteSQL);
       header("Location: superEditorCommands");
       exit();
}


?>

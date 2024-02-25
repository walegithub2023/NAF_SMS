
<?php include('../Connection.php'); ?>
<?php include 'superEditorHeader.php'; ?>
<?php include 'superEditorSideNavBar.php'; ?>

<?php
    $commandSQL = "SELECT * FROM commands WHERE COMMAND != 'NIL'";
    $commandResult = mysqli_query($conn, $commandSQL);
    $totalRecords = mysqli_num_rows($commandResult);  
    $remark = "NIL";
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>COMDS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="superEditorHome">Home</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Comds</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-left:50px; padding-right:50px;">
            <div class="card-body">
              <h5 class="card-title">Commands</h5>
            
              <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%;">
                <thead>
                  <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Comd Code</th>
                    <th scope="col">Command</th>
                    <th scope="col">Remark</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($commandFetch=mysqli_fetch_assoc($commandResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $commandFetch['COMMAND_CODE']?></td>
                <td><?php echo $commandFetch['COMMAND']?></td>
                <td><?php echo $commandFetch['REMARK']?></td>
                <td><a style="color:black" href='superEditorViewCommand?commandCode=<?php echo $commandFetch['COMMAND_CODE'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='superEditorEditCommand?commandCode=<?php echo $commandFetch['COMMAND_CODE'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td><a style="color:black" href='superEditorDeleteCommand?commandCode=<?php echo $commandFetch['COMMAND_CODE'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS COMMAND??? DELETING THIS COMMAND REMOVES THE COMMAND FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td></tr>
            <?php
            $serial++;
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'superEditorFooter.php'; ?>

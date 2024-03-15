
<?php include('../Connection.php'); ?>
<?php include 'superEditorHeader.php'; ?>
<?php include 'superEditorSideNavBar.php'; ?>

<?php
    $unitSQL = "SELECT * FROM units";
    $unitResult = mysqli_query($conn, $unitSQL);
    $totalRecords = mysqli_num_rows($unitResult);  
    $remark = "NIL";

?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>UNITS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="superEditorHome">Home</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Units</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-left:50px; padding-right:50px;">
            <div class="card-body">
              <h5 class="card-title">Units</h5>
            
              <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%;">
                <thead>
                  <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">UNIT_CODE</th>
                    <th scope="col">UNIT</th>
                    <th scope="col">COMMAND</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($unitFetch=mysqli_fetch_assoc($unitResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $unitFetch['UNIT_CODE']?></td>
                <td><?php echo $unitFetch['UNIT']?></td>
                <td><?php echo $unitFetch['COMMAND_CODE']?></td>
                <td><a style="color:black" href='superEditorViewUnit?unitCode=<?php echo $unitFetch['UNIT_CODE'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='superEditorEditUnit?unitCode=<?php echo $unitFetch['UNIT_CODE'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td><a style="color:black" href='superEditorDeleteUnit?unitCode=<?php echo $unitFetch['UNIT_CODE'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS UNIT??? DELETING THIS UNIT REMOVES THE UNIT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td></tr>
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

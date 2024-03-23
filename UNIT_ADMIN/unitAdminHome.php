<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php include 'unitAdminHeader.php'; ?>
<?php include 'unitAdminSideNavBar.php'; ?>

<main id="main" class="main"
style="
    background-image: url('../IMAGES/img1.jpg'); 
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    zIndex:-1;
    "
>
       <div class="pagetitle">
      <h1>NAFSOMS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">System</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:50px; border-radius:0px;">
            <div class="card-body">
              <p id="" class="text-primary;" style="font-size:185%; color:rgb(1, 41, 112); text-align:center">NIGERIAN AIR FORCE SAFETY & OPERATIONS MANAGEMENT SYSTEM</p>
              <p style="text-align:justify;">
                    Lorem ipsum dolor sit amet consectetur adipiscing elit, quam torquent cubilia vulputate mattis tempor, velit 
                    tristique proin taciti a et.Vestibulum curae fermentum ligula per neque scelerisque ad, integer congue lacinia 
                    aliquam fames volutpat mus, turpis facilisi eros bibendum nisl tortor.Varius convallis taciti aenean et finibus 
                    egestas sapien ipsum, conubia ac proin commodo venenatis interdum arcu mollis, nec vel gravida fermentum per velit 
                    primis.Lorem ipsum dolor sit amet consectetur adipiscing elit, quam torquent cubilia vulputate mattis tempor, velit 
                    tristique proin taciti a et.Vestibulum curae fermentum ligula per neque scelerisque ad, integer congue lacinia 
                    aliquam fames volutpat mus, turpis facilisi eros bibendum nisl tortor.Varius convallis taciti aenean et finibus 
                    egestas sapien ipsum, conubia ac proin commodo venenatis interdum arcu mollis, nec vel gravida fermentum per velit 
                    primis. Lorem ipsum dolor sit amet consectetur adipiscing elit, quam torquent cubilia vulputate mattis tempor, velit 
                    Lorem ipsum dolor sit amet consectetur adipiscing elit, quam torquent cubilia vulputate mattis tempor, velit 
                    tristique proin taciti a et.Vestibulum curae fermentum ligula per neque scelerisque ad, integer congue lacinia 
                    aliquam fames volutpat mus, turpis facilisi eros bibendum nisl tortor.Varius convallis taciti aenean et finibus 
                    egestas sapien ipsum, conubia ac proin commodo venenatis interdum arcu mollis, nec vel gravida fermentum per velit 
                    primis. Lorem ipsum dolor sit amet consectetur adipiscing elit, quam torquent cubilia vulputate mattis tempor, velit
          
              </p>


             <!-- Full Screen Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px; width:30%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal1">
                CLICK TO SEE HOW TO USE THE SYSTEM
              </button>

              <div class="modal fade" id="fullscreenModal1" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">NAFSOMS' USER MANUAL</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                       style="
                background-image: url('../IMAGES/img1.jpg'); 
                background-size: cover;
                background-position: center;
                min-height: 100vh;
                zIndex:-1;
                "   
                >
                   <!--  modal body goes here -->
                   <!-- Table with stripped rows -->
            <div class="table-responsive" style="">
              <table class="table datatable table-striped second table-hover" style="text-transform:; font-size:90%; background-color:white;">
                <thead>
                  <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Screenshot</th>
                    <th scope="col">Page</th>
                    <th scope="col">Navigation</th>
                    <th scope="col">Description</th>
                    <th scope="col">Remark</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                    <td scope="col">1</td>
                    <td scope="col"><img src="../IMAGES/login.png" style="width:350px; height:200px;"></td>
                    <td scope="col">Login</td>
                    <td scope="col">On your browser, input the url for the system to access the login page.</td>
                    <td scope="col">This is the page through which users login to the system. The page requires the user to input his/her svc number and password for him/her to login.</td>
                    <td scope="col">NIL</td>
                    </tr>
                    <tr>
                    <td scope="col">2</td>
                    <td scope="col"><img src="../IMAGES/home.png" style="width:350px; height:200px;"></td>
                    <td scope="col">Home</td>
                    <td scope="col">Input Svc No, Password and Click the "Login" button on the login page to navigate to the home page.</td>
                    <td scope="col">This is the landing page after the user has logged into the system. In other words, this is the first page the user sees when he/she logs into the system.</td>
                    <td scope="col">NIL</td>
                    </tr>
                    <tr>
                    <td scope="col">3</td>
                    <td scope="col"><img src="../IMAGES/opms.png" style="width:350px; height:200px;"><br /><br /><img src="../IMAGES/sms.png" style="width:350px; height:200px;"></td>
                    <td scope="col">Dashboard</td>
                    <td scope="col">Click the Dashboard link on the sidebar to navigate to one of the Dashboards (SMS or OPMS). Click "SMS" or "OPMS"
                      to view the SMS and OPMS dashboards respectively.
                    </td>
                    <td scope="col">The Dashboard pages show or give analytics of the unit's accident and incident reports, snag chart, fg hours, 
                      vehicle status, pers, eqpt, pde state, leave and passes, etc.</td>
                    <td scope="col">NIL</td>
                    </tr>
                    <tr>
                    <td scope="col">4</td>
                    <td scope="col"><img src="../IMAGES/newPersLink.png" style="width:350px; height:200px;"><br /><br /><img src="../IMAGES/newPersForm.png" style="width:350px; height:200px;"></td>
                    <td scope="col">Personnel</td>
                    <td scope="col">Click the "Personnel" link on the sidebar to navigate to  "All pers" and "New Pers" links. Click "All pers" or "New Pers"
                      to view the all pers and new pers pages respectively.
                    </td>
                    <td scope="col">The "All pers" link shows the list of all pers in a unit, while the "New Pers" link is used to add a new pers to the unit's database.</td>
                    <td scope="col">NIL</td>
                    </tr>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" style="border-radius:1px;" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Full Screen Modal-->


            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->
 <?php include 'unitAdminFooter.php'; ?>
 <?php 
}else{
    header("Location: ../login");
    exit();
}
?>

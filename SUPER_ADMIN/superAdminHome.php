<?php include 'superAdminHeader.php'; ?>
<?php include 'superAdminSideNavBar.php'; ?>

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

          <div class="card" style="padding:20px; padding-bottom:40px; border-radius:0px;">
            <div class="card-body">
              <p id="" class="text-primary;" style="font-size:220%; color:rgb(1, 41, 112); text-align:center">NIGERIAN AIR FORCE SAFETY & OPERATIONS MANAGEMENT SYSTEM</p>
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
                      <h5 class="modal-title">USER MANUAL</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                       style="
                background-image: url('../IMAGES/img11.png'); 
                background-size: cover;
                background-position: center;
                min-height: 100vh;
                zIndex:-1;
                "   
                >
                   <!--  modal body goes here -->
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
 <?php include 'superAdminFooter.php'; ?>
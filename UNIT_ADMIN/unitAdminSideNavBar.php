<?php 
// Start the session only if it's not already started
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="unitAdminHome">
          <i class="bi bi-house"></i>
          <span>Home</span>
        </a>
      </li><!-- End Login Page Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#dashboard-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid"></i><span>Dashboard</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="dashboard-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="unitAdminSms">
              <i class="bi bi-circle"></i><span>SMS</span>
            </a>
          </li>
          <li>
            <a href="unitAdminOpms">
              <i class="bi bi-circle"></i><span>OPMS</span>
            </a>
          </li>
        </ul>
      </li><!-- End Dashboard Nav -->


        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#personnel-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Personnel</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="personnel-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="unitAdminPers">
              <i class="bi bi-people"></i><span>All Pers</span>
            </a>
          </li>
          <li>
            <a href="unitAdminNewPers">
              <i class="bi bi-circle"></i><span>New Pers</span>
            </a>
          </li>
        </ul>
      </li><!-- End Personnel Nav -->


        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#leaveandpass-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calendar-event"></i><span>Leave/Pass</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="leaveandpass-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="unitAdminLeaveAndPass">
              <i class="bi bi-circle"></i><span>Leave & Pass</span>
            </a>
          </li>
          <li>
            <a href="unitAdminNewLeaveAndPass">
              <i class="bi bi-circle"></i><span>New Leave/Pass</span>
            </a>
          </li>
        </ul>
      </li><!-- End Leave & Pass Nav -->


           <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="unitAdminChart1">
              <i class="bi bi-circle"></i><span>chart1</span>
            </a>
          </li>
          <li>
            <a href="unitAdminChart2">
              <i class="bi bi-circle"></i><span>chart2</span>
            </a>
          </li>
          <li>
            <a href="unitAdminChart3">
              <i class="bi bi-circle"></i><span>chart3</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      
     
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Comd/Unit</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="unitAdminCommands">
              <i class="bi bi-circle"></i><span>Comds</span>
            </a>
          </li>
          <li>
            <a href="unitAdminUnits">
              <i class="bi bi-circle"></i><span>Units</span>
            </a>
          </li>
        </ul>
      </li><!-- End Comds & Units Nav -->



            
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid-3x3-gap-fill"></i><span>NAF Apps</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="https://airforce.mil.ng">
              <i class="bi bi-circle"></i><span>NAF Website</span>
            </a>
          </li>
          <li>
            <a href="https://nafrecruitment.airforce.mil.ng">
              <i class="bi bi-circle"></i><span>NAF Portal</span>
            </a>
          </li>
           <li>
            <a href="https://mail.airforce.mil.ng">
              <i class="bi bi-circle"></i><span>NAF Mail</span>
            </a>
          </li>
        </ul>
      </li><!-- End NAF Apps Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="unitAdminUsers">
              <i class="bi bi-circle"></i><span>Users</span>
            </a>
          </li>
          <li>
            <a href="unitAdminNewUser">
              <i class="bi bi-circle"></i><span>New user</span>
            </a>
          </li>
        </ul>
      </li><!-- End Users Nav -->


       <li class="nav-item">
        <a class="nav-link collapsed" href="unitAdminAuditTrail">
          <i class="bi bi-journal-bookmark"></i>
          <span>Audit</span>
        </a>
      </li><!-- End AuditTrail Page Nav -->



      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="unitAdminUserProfile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="help">
          <i class="bi bi-question-circle"></i>
          <span>Help</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="unitAdminContact">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->
  
<?php 
}else{
    header("Location: ../login");
    exit();
}
?>
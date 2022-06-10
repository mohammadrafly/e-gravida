<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KKIH | <?= $pages ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/feather/feather.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/ti-icons/css/themify-icons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css') ?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/ti-icons/css/themify-icons.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/select.dataTables.min.css') ?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets/css/vertical-layout-light/style.css') ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets/images/favicon-bh.png') ?>" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        System KKIH
        <a class="navbar-brand brand-logo mr-5" href="<?= base_url('dashboard') ?>"><img src="<?= base_url('assets/images/favicon-bh.png') ?>" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="<?= base_url('dashboard') ?>"><img src="<?= base_url('assets/images/favicon-bh.png') ?>" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                          <?php if(session()->get('profile') === NULL): ?>
                            <img src="<?= base_url('assets/images/default.png') ;?>" width="50px">
                          <?php elseif(session()->get('profile') ): ?>
                            <img src="<?= base_url('profile/'.session()->get('profile')) ?>" width="50px">
                          <?php endif ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="<?= base_url('dashboard/profile/'.session()->get('id')) ?>">
                <i class="ti-user text-success"></i>
                Profile
              </a>
              <a class="dropdown-item" href="<?= base_url('logout') ?>">
                <i class="ti-power-off text-success"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('dashboard') ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php if(session()->get('role') === 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/post') ?>">
              <i class="mdi mdi-file-document menu-icon"></i>
              <span class="menu-title">Master Post</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/kategori') ?>">
              <i class="mdi mdi-file-multiple menu-icon"></i>
              <span class="menu-title">Master Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/jadwal') ?>">
              <i class="mdi mdi-calendar-clock menu-icon"></i>
              <span class="menu-title">Master Jadwal</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/user') ?>">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Master User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/kandungan/admin') ?>">
              <i class="mdi mdi-hospital menu-icon"></i>
              <span class="menu-title">Master Kandungan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/phone') ?>">
              <i class="mdi mdi-link-variant menu-icon"></i>
              <span class="menu-title">Master Phone/Link</span>
            </a>
          </li>

          <?php elseif(session()->get('role') === 'customer'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/profile/'.session()->get('id')) ?>">
              <i class="mdi mdi-account-card-details menu-icon"></i>
              <span class="menu-title">My Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/kondisikehamilan/'.session()->get('id')) ?>">
              <i class="mdi mdi-hospital menu-icon"></i>
              <span class="menu-title">Detail Kandungan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/jadwal/'.session()->get('id')) ?>">
              <i class="mdi mdi-calendar-clock menu-icon"></i>
              <span class="menu-title">Jadwal Pemeriksaan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $phone_private['phone'] ?>">
              <i class="mdi mdi-whatsapp menu-icon"></i>
              <span class="menu-title">Private Konsultasi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $phone_group['phone'] ?>">
              <i class="mdi mdi-whatsapp menu-icon"></i>
              <span class="menu-title">Join Group Konsultasi</span>
            </a>
          </li>
          <?php endif ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <?= $this->renderSection('content') ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Konsultasi Kesehatan Ibu Hamil. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js') ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url('assets/vendors/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/datatables.net/jquery.dataTables.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') ?>"></script>
  <script src="<?= base_url('assets/js/dataTables.select.min.js') ?>"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('assets/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('assets/js/template.js') ?>"></script>
  <script src="<?= base_url('assets/js/settings.js') ?>"></script>
  <script src="<?= base_url('assets/js/todolist.js') ?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
  <script src="<?= base_url('assets/js/Chart.roundedBarCharts.js') ?>"></script>
  <!-- End custom js for this page-->
  <script>
    $('.datepicker').datepicker();
  </script>
  <script>
    setInterval(function() {

    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();

    // Add leading zeros
    hours = (hours < 10 ? "0" : "") + hours;
    minutes = (minutes < 10 ? "0" : "") + minutes;
    seconds = (seconds < 10 ? "0" : "") + seconds;

    // Compose the string for display
    var currentTimeString = hours + ":" + minutes + ":" + seconds;
    $(".clock").html(currentTimeString);

    }, 1000);
  </script>
  <script>
        $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
        var src = $(this).attr('src');
        var modal;

        function removeModal() {
            modal.remove();
            $('body').off('keyup.modal-close');
        }
        modal = $('<div>').css({
            background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
            backgroundSize: 'contain',
            width: '100%',
            height: '100%',
            position: 'fixed',
            zIndex: '10000',
            top: '0',
            left: '0',
            cursor: 'zoom-out'
        }).click(function() {
            removeModal();
        }).appendTo('body');
        //handling ESC
        $('body').on('keyup.modal-close', function(e) {
            if (e.key === 'Escape') {
            removeModal();
            }
        });
        });
    </script>
    <script>
      ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

    </script>
    <script>
      $(document).ready( function () {
    $('#table').DataTable();
} );
    </script>
</body>

</html>


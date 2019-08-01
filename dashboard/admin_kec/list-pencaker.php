<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../../landingpage/db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bursa Kerja Malang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../css/style1.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../css/style4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Bursa Kerja</b> Malang</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                   
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
              <h3 class="box-title">Selamat Datang  <b> Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                <li ><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <!-- <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Lowongan Aktif</a></li> -->
                  <li class="active"><a href="list-pencaker.php.php"><i class="fa fa-address-card-o"></i> Data Kartu Kuning</a></li>
                  <!-- <li><a href="companies.php"><i class="fa fa-building"></i> UMKM</a></li> -->
                  <li><a href="../../landingpage/logout.php"><i class="fa fa-arrow-circle-o-right"></i> Keluar</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <h3>Data Pencaker</h3>
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-info"></i> Klik pada <b>Nama Pencaker</b> untuk melihat data diri Pencaker.
            </div>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Nama Pencaker</th>
                      <!-- <th>Pendidikan Terakhir</th> -->
                      <!-- <th>Kemampuan</th> -->
                      <th>Kecamatan</th>
                      <th>Desa</th>
                      <!-- <th>Unduh CV/Resume</th> -->
                      <!-- <th>Tampilkan</th> -->
                      <th>Status</th>
                      <th>Cetak Kartu Kuning</th>
                      <th>Hapus</th>
                      
                    </thead>
                    <tbody>
                      <?php
                       $sql = "SELECT pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user FROM users JOIN pencaker ON users.id_user=pencaker.id_user ";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) 
                              {     
                      ?>
                      <tr data-href="view-datapencaker.php?id=<?php echo $row['id_user']; ?>" style="cursor: pointer;">
                        <td><a href="view-datapencaker.php"><?php echo $row['nama']; ?></a></td>
                        <!-- <td><?php echo $row['qualification']; ?></td> -->
                        <!-- <td> -->
                          <?php
                          // foreach ($skills as $value) {
                          //   echo ' <span class="label label-default">'.$value.'</span>';
                          // }
                          ?>
                        <!-- </td> -->
                        <td><?php echo $row['kecamatan']; ?></td>
                        <td><?php echo $row['desa']; ?></td>

                        <!-- <td><a href="view-datapencaker.php"><span class="label label-info">Tampilkan Data Pencaker</span></a></td> -->

                        <td>
                        <?php
                          if($row['active'] == '1') {
                            echo '<strong>Terverifikasi</strong>';
                            // echo "Activated";
                          } else if($row['active'] == '2') {
                            ?>
                           <a href="approve-user.php?id=<?php echo $row['id_user']; ?>"><span class="label label-primary">VERIFIKASI</span></a>&nbsp<a href="reject-user.php?id=<?php echo $row['id_user']; ?>"><span class="label label-danger">TOLAK</span></a> 
                            <?php
                          } else if ($row['active'] == '3') {
                            ?>
                              <a href="approve-user.php?id=<?php echo $row['id_user']; ?>">Reactivate</a>
                            <?php
                          } else if($row['active'] == '0') {
                            echo 'Ditolak';
                          }
                        ?>                          
                        </td>
                        <td>
                          <a href="savepdf.php?id=<?php echo $row['id_user']; ?>"><span class="label label-primary">Cetak Kartu Kuning</span></a></td>
                          <!-- kalo bisa if terverifikasi baru keluar tombol itu -->
                        </td>
                        <td><a href="delete-user.php?id=<?php echo $row['id_user']; ?>"><span class="label label-warning">Hapus</span></a></td>
                      </tr>

                      <?php

                        }
                      }
                      ?>
                      

                      <script>
                        
                      </script>

                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal modal-success fade" id="modal-success">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Candidate Profile</h4>
          </div>
          <div class="modal-body">
              <h3><b>Applied On</b></h3>
              <p>24/04/2017</p>
              <br>
              <h3><b>Email</b></h3>
              <p>test@test.com</p>
              <br>
              <h3><b>Phone</b></h3>
              <p>44907512447</p>
              <br>
              <h3><b>Website</b></h3>
              <p>learningfromscratch.online</p>
              <br>
              <h3><b>Application Message</b></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
    <strong>Bismillah &copy; KP <a href="http://kominfo.malangkab.go.id/">Kominfo Kabupaten Malang</a>.</strong> 2019

    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../js/ajaxlibsjquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../js/ajaxlibs-twitterbootsrap.js"></script>
<!-- DataTables -->
<script src="../../datatables.js"></script>
<!-- AdminLTE App -->
<script src="../../js/adminlte.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>

  <!-- Script for clickable tr -->
  <script>
    $('*[data-href]').on("click",function(){
      window.location = $(this).data('href');
      return false;
    });
    $("td > a").on("click",function(e){
      e.stopPropagation();
    });
  </script>
  <!--  -->

</body>
</html>

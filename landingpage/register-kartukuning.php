<?php
session_start();

require_once("db.php");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- custom css for multiple form -->
  <link href="../css/style.css" rel="stylesheet" type="text/css">

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="../index.php" class="logo logo-bg">
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
          <li>
            <a href="jobs.php">Lowongan</a>
          </li>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="login.php">Masuk</a>
          </li>
          <li>
            <a href="sign-up.php">Daftar</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="dashboard/pencaker/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="dashboard/umkm/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php">Logout</a>
          </li>
          <?php } ?>          
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">
    <section class="content-header">
      <div class="container">
          <h1 class="text-center">Form Pendaftaran Kartu Kuning</h1>
          <div class="row latest-job margin-top-50 margin-bottom-20 bg-white" style="padding-left: 35px; padding-right: 35px; padding-top: 35px; padding-bottom: 35px">
            <form method="post" id="registerKartuKuning" action="addkartukuning.php" enctype="multipart/form-data">
               
               
                  <div class="col-md-12 latest-job ">
                    <h3 class="margin-bottom-20">Nomor dan Tanggal Pendaftaran</h3>
                    <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <label>Nomor Pendaftaran</label>
                        <input class="form-control input-lg" type="text" id="no_daftar" name="no_daftar" placeholder="Nomor Pendaftaran" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pendaftaran</label>
                        <input class="form-control input-lg" type="date" id="tgl_daftar" name="tgl_daftar" placeholder="Tanggal Pendaftaran">
                    </div>
                    </div>

                    </div>
                    
                  </div>
               
                    <h3 class="text-center margin-bottom-20">Keterangan</h3>
                    <!-- Kiri -->
                    <div class="col-md-6 latest-job ">
                    <div class="form-group">
                      <label>NIK</label>
                        <input class="form-control input-lg" type="text" id="nik" name="nik" placeholder="NIK" required>
                      </div>
                     
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control input-lg" type="date" id="dob" name="dob" placeholder="Tanggal Lahir" required>
                      </div>
                      <div class="form-group">
                        <label>Umur</label>
                        <input class="form-control input-lg" type="text" id="umur" name="umur" placeholder="Umur" required>                        
                      </div>

                              
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control input-lg" id="gender" name="gender" required>
                          <option selected="" value="">Pilih Jenis Kelamin</option>
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control input-lg" id="agama" name="agama" required>
                          <option selected="" value="">Pilih Agama</option>
                          <option value="Islam">Islam</option>
                          <option value="Buddha">Buddha</option>
                          <option value="Protestan">Protestant</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Lainnya">Lainnya</option>
                          <!-- Kalo bisa disuruh isi kalau pilihannya Lainnya -->
                        </select>
                      </div>
                    </div>
                    <!-- End Kiri -->

                    <!-- Kanan -->
                    <div class="col-md-6 latest-job ">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control input-lg" type="text" id="fname" name="fname" placeholder="Nama Lengkap" required>
                      </div>
                      <div class="form-group">
                        <label>Asal Kecamatan</label>
                        <select class="form-control  input-lg" id="kecamatan" name="kecamatan" required>
                          <option selected="" value="">Pilih Kecamatan</option>
                            <?php
                              $sql="SELECT * FROM kecamatan";
                              $result=$conn->query($sql);

                              if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  echo "<option value='".$row['name']."' data-id='".$row['id']."'>".$row['name']."</option>";
                                }
                              }
                            ?>
                        </select>
                      </div>       

                      <div id="kelurahanDesaDiv" class="form-group">
                          <label>Asal Desa / Kelurahan</label>
                          <input class="form-control input-lg" type="text" id="kelurahan_desa" name="kelurahan_desa" placeholder="Desa / Kelurahan" required> 
                        </div>

                      <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <br>
                        <textarea class="form-control input-lg" rows="4" name="alamat" placeholder="Alamat Lengkap Pendaftar"></textarea>
                      </div>      
                    </div>
                    <!-- End Kanan -->
               
                  <div class="col-md-12 latest-job ">
                    <!-- <h3 class="text-center margin-bottom-20">Keterangan [2]</h3>                -->
                  </div>
                  <div class="col-md-6 latest-job ">
                    <div class="form-group">
                        <label>Kewarganegaraan</label>
                        <select class="form-control input-lg" id="kwg" name="kwg" required>
                          <option selected="" value="">Pilih Kewarganegaran</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Asing">Asing</option>
                        </select>
                    </div>
                    <div class="form-group"> 
                        <label>Tinggi Badan</label>
                        <input class="form-control input-lg" type="number" id="tinggi" name="tinggi" placeholder="Tinggi Badan" required>                                 
                      </div>
                      <div class="form-group"> 
                        <label>Berat Badan</label>
                        <input class="form-control input-lg" type="number" id="berat" name="berat" placeholder="Berat Badan" required>                                 
                      </div>
                      <div class="form-group">
                        <label>Status Perkawinan</label>
                        <select class="form-control input-lg" id="status" name="status" required>
                          <option value="">Pilih Status Perkawinan</option>
                          <option value="Belum Kawin">Belum Kawin</option>
                          <option value="Kawin">Kawin</option>
                          <option value="Janda">Janda</option>
                          <option value="Duda">Duda</option>
                        </select>
                      </div>
                  </div>

                  <div class="col-md-6 latest-job ">
                    <div class="form-group">
                        <label>Cacat Badan</label>
                          <select class="form-control input-lg" id="yn_cacat" name="yn_cacat" required>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="Ada">Ada</option>
                          </select>                             
                      </div>
                      <!-- keluar kalo cacat Ada -->
                      <div class="form-group">
                        <input class="form-control input-lg" type="text" id="desc_cacat" name="desc_cacat" placeholder="Deskripsi Cacat Badan" required>
                      </div>

                      <div class="form-group">
                        <label>Cacat Lainnya</label>
                          <select class="form-control input-lg" id="yn_cacatlain" name="yn_cacatlain" required>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="Ada">Ada</option>
                          </select>                             
                      </div>
                      <!-- keluar kalo cacat Ada -->
                      <div class="form-group">
                        <input class="form-control input-lg" type="text" id="desc_cacatlain" name="desc_cacatlain" placeholder="Deskripsi Cacat Lainnya" required>
                      </div>
                      <div class="form-group">
                        <label>Penghasil?</label>
                        <select class="form-control input-lg" id="penghasil" name="penghasil" required>
                          <option value="Ya">Ya</option>
                          <option value="Tidak">Tidak</option>
                        </select>
                      </div>
                  </div>                
                      
               
                  <div class="col-md-12 latest-job ">
                    <h3 class="text-center margin-bottom-20">Pendidikan Formal</h3>               
                  </div>

                  <div class="col-md-6 latest-job ">
                    <div class="form-group">
                        <label>Pendidikan Formal Terakhir</label>
                          <select class="form-control input-lg" id="pendidikan" name="pendidikan" required>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Instansi Pendidikan Formal</label>
                        <input class="form-control input-lg" type="text" id="desc_pendidikan" name="desc_pendidikan" placeholder="Instansi Pendidikan" required>
                        <p style="text-size: 11pt">* Harap Masukkan Program Pendidikan dan Instansi Pendidikan (Contoh: Desain Interior Institut Seni Indonesia</p>
                      </div>

                      <div class="form-group">
                        <label>Bahasa yang Dikuasai</label><br>
                        <input type="radio" id="b_indo" name="bahasa" value="Indonesia">Indonesia &emsp;
                        <input type="radio" id="b_inggris" name="bahasa" value="Inggris">Inggris &emsp;
                        <input type="radio" id="b_arab" name="bahasa" value="Arab">Arab &emsp;
                        <input type="radio" id="b_arab" name="bahasa" value="Jerman">Jerman &emsp;
                        <input type="radio" id="b_belanda" name="bahasa" value="Belanda">Belanda &emsp; <br>
                        <input type="radio" id="b_perancis" name="bahasa" value="Perancis">Perancis &emsp;
                        <input type="radio" id="b_cina" name="bahasa" value="Cina">Cina &emsp;
                        <input type="radio" id="b_jepang" name="bahasa" value="Jepang">Jepang &emsp;
                        <input type="radio" id="b_lainnya" name="bahasa" value="Lainnya">Lainnya &emsp;
                      </div>
                  </div>

                  <!-- Kanan -->
                  <div class="col-md-6 latest-job ">
                      <div class="form-group">
                        <label>Penyelenggara Pendidikan Non Formal Formal (Jika Ada)</label>
                          <select class="form-control input-lg" id="kursus" name="kursus" required>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="1">Departemen Tenaga Kerja</option>
                            <option value="2">Instansi Pemerintahan Lainnya</option>
                            <option value="3">Perusahaan</option>
                            <option value="4">Lembaga Pendidikan Swasta</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Lama Mengikuti Kursus</label>
                        <input class="form-control input-lg" type="number" id="lama_kursus" name="lama_kursus" placeholder="Lama Kursus" required>
                      </div>
                  </div>
                  <!-- Akhir Kanan -->
                
                  <div class="col-md-12 latest-job ">
                    <h3 class="text-center margin-bottom-20">Pekerjaan Sekarang</h3>
                    <div class="form-group">
                        <label>Pekerjaan Sekarang</label>
                          <select class="form-control input-lg" id="pkj_sekarang" name="pkj_sekarang" required>
                            <option value="">Pilih Pekerjaan Sekarang</option>
                            <option value="Bekerja">Bekerja</option>
                            <option value="Sekolah">Sekolah</option>
                            <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                            <option value="Mencari Pekerjaan">Mencari Pekerjaan</option>
                            <option value="Menerima Pendapatan">Menerima Pendapatan</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                      </div>
                      <!-- <div class="form-group">
                        <label>Deskripsi Pekerjaan</label>
                        <input class="form-control input-lg" type="text" id="#" name="#" placeholder="Deskripsi Pekerjaan" required>
                      </div>    -->
                  </div>                  
                
                  <div class="col-md-12 latest-job ">
                    <h3 class="text-center margin-bottom-20">Terdaftar dalam Jabatan</h3>
                    <div class="form-group">
                      <label>Pekerjaan Pokok</label>
                      <input class="form-control input-lg" type="text" id="pkj_pokok" name="pkj_pokok" placeholder="Pekerjaan Pokok" required>
                    </div> 
                    <div class="form-group">
                      <label>Pekerjaan Sampingan</label>
                      <input class="form-control input-lg" type="text" id="pkj_sampingan" name="pkj_sampingan" placeholder="Pekerjaan Sampingan" required>
                    </div> 
                  </div>                  
                
                  <div class="col-md-12 latest-job ">
                    <h3 class="text-center margin-bottom-20">Riwayat Pekerjaan</h3>
                    <p class="text-center"><i>Tuliskan Riwayat Pekerjaan yang paling penting yang pernah Anda kerjakan.</i></p>
                    <div class="col-md-6 latest-job ">
                      <h4><b>Pekerjaan 1</b></h4>
                      <div class="form-group">
                        <!-- <label>Jenis Lapangan Usaha</label> -->
                        <input class="form-control input-lg" type="text" id="kerja1" name="kerja1" placeholder="Jenis Lapangan Usaha" required>
                      </div> 
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="text" id="jabatan1" name="jabatan1" placeholder="Jabatan" required>
                      </div>
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="number" id="lama1" name="lama1" placeholder="Lamanya Bekerja (Bulan)" required>
                      </div>
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="number" id="upah1" name="upah1" placeholder="Upah yang Diterima" required>
                      </div>
                      <div class="form-group">
                        <label>Alasan Keluar</label>
                        <select class="form-control input-lg" id="alasan1" name="alasan1" required>
                          <option value="">Alasan Keluar</option>
                          <option value="Permintaan Sendiri">Permintaan Sendiri</option>
                          <option value="Gangguan Kesehatan">Gangguan Kesehatan</option>
                          <option value="Upah Rendah">Upah Rendah</option>
                          <option value="Pengurangan Pegawai">Pengurangan Pegawai</option>
                          <option value="Pekerjaan Telah Selesai">Pekerjaan Telah Selesai</option>
                          <option value="Pekerjaan tak Sesuai">Pekerjaan tak Sesuai</option>
                          <option value="Waktu Kerja tak Sesuai">Waktu Kerja tak Sesuai</option>
                          <option value="Tempat Kerja Terlalu Jauh">Tempat Kerja Terlalu Jauh</option>
                          <option value="Perusahaan Tutup">Perusahaan Tutup</option>
                        </select>
                      </div>
                    </div>  
                    <div class="col-md-6 latest-job ">
                      <h4><b>Pekerjaan 2</b></h4>
                      <div class="form-group">
                        <!-- <label>Jenis Lapangan Usaha</label> -->
                        <input class="form-control input-lg" type="text" id="usaha2" name="usaha2" placeholder="Jenis Lapangan Usaha" required>
                      </div> 
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="text" id="#jabatan2" name="jabatan2" placeholder="Jabatan" required>
                      </div>
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="number" id="lama2" name="lama2" placeholder="Lamanya Bekerja (Bulan)" required>
                      </div>
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="number" id="upah2" name="upah2" placeholder="Upah yang Diterima" required>
                      </div>
                      <div class="form-group">
                        <label>Alasan Keluar</label>
                        <select class="form-control input-lg" id="alasan2" name="alasan2" required>
                          <option value="">Alasan Keluar</option>
                          <option value="Permintaan Sendiri">Permintaan Sendiri</option>
                          <option value="Gangguan Kesehatan">Gangguan Kesehatan</option>
                          <option value="Upah Rendah">Upah Rendah</option>
                          <option value="Pengurangan Pegawai">Pengurangan Pegawai</option>
                          <option value="Pekerjaan Telah Selesai">Pekerjaan Telah Selesai</option>
                          <option value="Pekerjaan tak Sesuai">Pekerjaan tak Sesuai</option>
                          <option value="Waktu Kerja tak Sesuai">Waktu Kerja tak Sesuai</option>
                          <option value="Tempat Kerja Terlalu Jauh">Tempat Kerja Terlalu Jauh</option>
                          <option value="Perusahaan Tutup">Perusahaan Tutup</option>
                        </select>
                      </div>
                    </div>                    
                  </div>
                
                  <div class="col-md-12 latest-job ">
                    <h3 class="text-center margin-bottom-20">Pekerjaan yang Diinginkan</h3>
                    <p class="text-center"><i>Tuliskan kriteria pekerjaan yang diharapkan.</i></p>
                    <div class="col-md-6 latest-job ">
                      <div class="form-group">
                        <label>Jabatan</label>
                        <input class="form-control input-lg" type="text" id="ingin_jabatan" name="ingin_jabatan" placeholder="Jabatan yang Diinginkan" required>
                      </div>
                      <div class="form-group">
                        <label>Penempatan Kerja</label>
                        <select class="form-control input-lg" id="penempatan" name="penempatan" required>
                          <option value="">Pilih Penempatan Kerja yang Diinginkan</option>
                          <option value="Wilayah Tempat Pendaftaran">Wilayah Tempat Pendaftaran</option>
                          <option value="Di Luar Daerah">Di Luar Daerah</option>
                          <option value="Di Luar Negeri">Di Luar Negeri</option>
                          <option value="Di Mana Saja">Di Mana Saja</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Bersedia Menerima Upah</label>
                        <select class="form-control input-lg" id="bersedia_upah" name="bersedia_upah" required>
                          <option value="">Waktu Menerima Upah</option>
                          <option value="Borongan">Borongan</option>
                          <option value="Mingguan">Mingguan</option>
                          <option value="Harian">Harian</option>
                          <option value="Bulanan">Bulanan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 latest-job ">
                    <div class="form-group">
                        <label>Upah yang Diinginkan</label>
                        <input class="form-control input-lg" type="number" id="ingin_upah" name="ingin_upah" placeholder="Upah yang Diinginkan" required>
                      </div>
                      <div class="form-group">
                        <label>Bersedia Ditempatkan untuk Waktu</label>
                        <select class="form-control input-lg" id="bersedia_waktu" name="bersedia_waktu" required>
                          <option value="">Waktu Penempatan</option>
                          <option value="Jangka Pendek/Kontrak">Jangka Pendek/Kontrak</option>
                          <option value="Jangka Panjang/Tetap">Jangka Panjang/Tetap</option>
                        </select>
                      </div>
                    </div>
                  </div>
               
                  <div class="col-md-12 latest-job">
                    <h3 class="text-center margin-bottom-20">Keadaan Pencari Kerja</h3>
                    <div class="form-group">
                      <!-- <label></label> -->
                      <select class="form-control input-lg" id="keadaan" name="keadaan" required>
                        <option value="">Keadaan Pencari kerja</option>
                        <option value="Telah Ditempatkan">Telah Ditempatkan</option>
                        <option value="Telah Dihapuskan">Telah Dihapuskan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 latest-job">
                  <div style="overflow: auto;">
                    <div style="float: right;">    
                      <button class="btn btn-flat btn-success" type="submit">Daftar </button>
                    </div>
                    </div>
                </div>
                <!-- End of 9th Tab -->

            
              <!-- Circles which indicates the steps of the form: -->
              
            </div> 

          </form>        
        </div>
      </div>
    </section>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

<script>
  $("#kelurahan-desa").on("change", function() {
    var id = $(this).find(':selected').attr("data-id");
    $("#kelurahan-desa").find('option:not(:first)').remove();
      $.post("kelurahan-desa.php", {id: id}).done(function(data) {
        $("#kelurahan-desa").append(data);
      });
  });
</script>

</body>
</html>

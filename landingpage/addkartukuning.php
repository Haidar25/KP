<?php

//To Handle Session Variables on This Page
session_start();
if(isset($_SESSION['id_user']))

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user Actually clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$no_daftar = mysqli_real_escape_string($conn, $_POST['no_daftar']);
	$tgl_daftar = mysqli_real_escape_string($conn, $_POST['tgl_daftar']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$umur = mysqli_real_escape_string($conn, $_POST['umur']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$agama = mysqli_real_escape_string($conn, $_POST['agama']);
	$kecamatan = mysqli_real_escape_string($conn, $_POST['kecamatan']);
	$kelurahandesa = mysqli_real_escape_string($conn, $_POST['kelurahan-desa']);
	$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
	$kwg = mysqli_real_escape_string($conn, $_POST['kwg']);
	$tinggi = mysqli_real_escape_string($conn, $_POST['tinggi']);
	$berat = mysqli_real_escape_string($conn, $_POST['berat']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$yn_cacat = mysqli_real_escape_string($conn, $_POST['yn_cacat']);
    $desc_cacat = mysqli_real_escape_string($conn, $_POST['yn_cacatlain']);
    $desc_cacatlain = mysqli_real_escape_string($conn, $_POST['desc_cacatlain']);
    $penghasil = mysqli_real_escape_string($conn, $_POST['penghasil']);
    $pendidikan = mysqli_real_escape_string($conn, $_POST['pendidikan']);
    $desc_pendidikan = mysqli_real_escape_string($conn, $_POST['desc_pendidikan']);
    $bahasa = mysqli_real_escape_string($conn, $_POST['bahasa']);
    $desc_pd_nonformal = mysqli_real_escape_string($conn, $_POST['desc_pd_nonformal']);
    $kursus = mysqli_real_escape_string($conn, $_POST['kursus']);
    $lama_kursus = mysqli_real_escape_string($conn, $_POST['lama_kursus']);
    $pkj_sekarang = mysqli_real_escape_string($conn, $_POST['pkj_sekarang']);
    $pkj_pokok = mysqli_real_escape_string($conn, $_POST['pkj_pokok']);
    $pkj_sampingan = mysqli_real_escape_string($conn, $_POST['pkj_sampingan']);
	$kerja1 = mysqli_real_escape_string($conn, $_POST['kerja1']);
	$jabatan1 = mysqli_real_escape_string($conn, $_POST['jabatan1']);
    $lama1 = mysqli_real_escape_string($conn, $_POST['lama1']);
    $upah1 = mysqli_real_escape_string($conn, $_POST['upah1']);
    $alasan1 = mysqli_real_escape_string($conn, $_POST['alasan1']);
	$usaha2 = mysqli_real_escape_string($conn, $_POST['usaha2']);
	$jabatan2 = mysqli_real_escape_string($conn, $_POST['jabatan2']);
    $lama2 = mysqli_real_escape_string($conn, $_POST['lama2']);
    $upah2 = mysqli_real_escape_string($conn, $_POST['upah2']);
    $alasan2 = mysqli_real_escape_string($conn, $_POST['alasan2']);
    $ingin_jabatan = mysqli_real_escape_string($conn, $_POST['ingin_jabatan']);
    $penempatan = mysqli_real_escape_string($conn, $_POST['penempatan']);
    $bersedia_upah = mysqli_real_escape_string($conn, $_POST['bersedia_upah']);
    $ingin_upah = mysqli_real_escape_string($conn, $_POST['ingin_upah']);
    $bersedia_waktu = mysqli_real_escape_string($conn, $_POST['bersedia_waktu']);
	$keadaan = mysqli_real_escape_string($conn, $_POST['keadaan']);
	$nik = mysqli_real_escape_string($conn, $_POST['nik']);
	$id_user = mysqli_real_escape_string($conn, $_GET['id']);

	$pendidikann = $pendidikan . " " . $desc_pendidikan;

		//sql new registration insert query
		$sql = "INSERT INTO pencaker
				(nik, no_pendaftaran, tgl_pendaftaran, nama, tanggal_lahir, jenis_kelamin, kecamatan, alamat, desa, agama, kewarganegaraan, tinggi_badan, berat_badan, cacat_badan, cacat_lainnya, status, penghasil, pd_formal,  penyelenggara, lama, bahasa, kerja_sekarang, j_kerja_pokok, j_kerja_sampingan, kerja1, jabatan1, lama1, upah1, alasan1, usaha2, jabatan2, lama2, upah2, alasan2, ingin_jabatan, penempatan, bersedia_upah, ingin_upah, bersedia_waktu, keadaan, id_user)
		 VALUES ('$nik', '$no_daftar', '$tgl_daftar', '$fname', '$dob', '$gender', '$kecamatan', '$alamat', '$kelurahandesa', '$agama', '$kwg', '$tinggi', '$berat', '$desc_cacat', '$desc_cacatlain', '$status', '$penghasil', '$pendidikann', '$kursus', '$lama_kursus', '$bahasa', '$pkj_sekarang', '$pkj_pokok', '$pkj_sampingan','$kerja1','$jabatan1','$lama1','$upah1','$alasan1','$usaha2','$jabatan2','$lama2','$upah2','$alasan2','$ingin_jabatan','$penempatan','$bersedia_upah','$ingin_upah','$bersedia_waktu','$keadaan','$id_user')";

	
		if($conn->query($sql)===TRUE) {
			unset($_SESSION['id_user']);
			header("Location: login.php");
			exit();
		} 
		else {
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
	
	header("Location: register-kartukuning.php");

	exit();
}
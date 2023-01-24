<?php
session_start();
require_once '../config/database.php';
require_once '../config/crud.php';

$obj = new crud;

if (!isset($_SESSION['xid'])) {
  header("Location: ../index.php");
}
// ambil id dari url
$id = $_GET['id'];

// ambil data dari database
$data = $obj->readOneData("SELECT * FROM job WHERE id_job = :id_job", ":id_job", $id);
$data = $data->fetchAll();

// cek apakah tombol edit di klik
if (isset($_POST['edit_job'])) {
  // ambil data
  $job = $_POST['nama_job'];
  $gender = $_POST['gender'];
  $umur = $_POST['umur'];
  $pendidikan = $_POST['pendidikan'];
  $tempat = $_POST['tempat'];
  $tanggungJawab = $_POST['tanggung_jawab'];
  $keahlian = $_POST['skill'];

  // cek apakah data kosong apa nggak
  if ($job === "" && $gender === "" && $umur === "" && $pendidikan === "" && $tanggungJawab === "" && $keahlian === "") {
    echo "<script>alert('data harus diisi dulu');</script>";
  } else {
    // tambahkan data ke database
    $obj->updateJob($id, $job, $gender, $umur, $pendidikan, $tempat, $tanggungJawab, $keahlian);
    echo "<script>
            alert('data berhasil diubah');
            document.location.href='index.php';
          </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Job - UAS Pemrograman Web 1</title>
    <link
      href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css"
      rel="stylesheet"
    />
    <link href="css/styles.css" rel="stylesheet" />
    <script
      src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="index.html">Dashboard Admin</a>
      <!-- Sidebar Toggle-->
      <button
        class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
        id="sidebarToggle"
        href="#!"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Navbar Search-->
      <form
        class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"
      >
        <div class="input-group">
          <input
            class="form-control"
            type="text"
            placeholder="Search for..."
            aria-label="Search for..."
            aria-describedby="btnNavbarSearch"
          />
          <button class="btn btn-primary" id="btnNavbarSearch" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            id="navbarDropdown"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            ><i class="fas fa-user fa-fw"></i
          ></a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdown"
          >
            <li><a class="dropdown-item" href="account.php">Account Settings</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="#!">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">Core</div>
              <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Dashboard
              </a>
              <div class="sb-sidenav-menu-heading">Interface</div>
              <a
                class="nav-link collapsed"
                href="#"
                data-bs-toggle="collapse"
                data-bs-target="#collapseLayouts"
                aria-expanded="false"
                aria-controls="collapseLayouts"
              >
                <div class="sb-nav-link-icon">
                  <i class="fas fa-columns"></i>
                </div>
                Manipulasi data
              <div class="sb-sidenav-collapse-arrow">
                  <i class="fas fa-angle-down"></i>
                </div>
              </a>
              <div
                class="collapse"
                id="collapseLayouts"
                aria-labelledby="headingOne"
                data-bs-parent="#sidenavAccordion"
              >
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="tambah_job.php">Tambah job</a>
                </nav>
              </div>
            </div>
          </div>
          <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin
          </div>
        </nav>
      </div>
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Job</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Edit Job</li>
            </ol>
            <div class="row">
              <div class="col-md-8">
              <form action="" method="POST">
                <div class="mb-3">
                  <label for="nama_job" class="form-label">Nama Job</label>
                  <input type="text" class="form-control" id="nama_job" name="nama_job" aria-describedby="job" placeholder="masukan nama job..." value="<?= $data[0]['nama_job'];?>">
                </div>
                <div class="mb-3">
                  <label for="gender" class="form-label">Gender</label>
                  <input type="text" class="form-control" id="gender" name="gender" placeholder="masukan gender..." value="<?= $data[0]['gender'];?>">
                </div>
                <div class="mb-3">
                  <label for="umur" class="form-label">Umur</label>
                  <input type="text" class="form-control" id="umur" name="umur" placeholder="masukan umur..." value="<?= $data[0]['umur'];?>">
                </div>
                <div class="mb-3">
                  <label for="pendidikan" class="form-label">Pendidikan</label>
                  <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="masukan pendidikan..." value="<?= $data[0]['pendidikan'];?>">
                </div>
                <div class="mb-3">
                  <label for="tempat" class="form-label">Tempat</label>
                  <input type="text" class="form-control" id="tempat" name="tempat" placeholder="masukan tempat..." value="<?= $data[0]['tempat'];?>">
                </div>
                <div class="mb-3">
                  <label for="tanggung_jawab" class="form-label">Tanggung Jawab</label>
                  <input type="text" class="form-control" id="tanggung_jawab" name="tanggung_jawab" placeholder="masukan tanggung jawab..." value="<?= $data[0]['tanggung_jawab'];?>">
                </div>
                <div class="mb-3">
                  <label for="skill" class="form-label">Keahlian</label>
                  <input type="text" class="form-control" id="skill" name="skill" placeholder="masukan keahlian..." value="<?= $data[0]['keahlian'];?>">
                </div>
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <button type="submit" name="edit_job" class="btn btn-primary">Submit</button>
              </form>
              </div>
              <div class="col-md-4"></div>
            </div>
          </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
              <div class="text-muted">@Copyright by 21552011423_Gerry Pratama Putra_TIFRM21_UASWEB1</div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"
      crossorigin="anonymous"
    ></script>
    <script src="js/datatables-simple-demo.js"></script>
  </body>
</html>

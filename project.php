<?php
  session_start();
  require_once 'config/database.php';
  require_once 'config/crud.php';

  $obj = new crud;

  $login = false;
  // cek apakah sesi ada
  if (isset($_SESSION['xid'])) {
    $data = $obj->readOneData("SELECT * FROM users WHERE id = :id", ":id", $_SESSION['xid']);
    $data = $data->fetchAll();
    $login = true;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf -8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Project - UAS Pemrograman Web 1</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body id="project">
    <header>
      <img src="./assets/img/logo.png" alt="logo" />
      <nav>
        <ul>
          <li>
            <a href="index.php"><i class="material-icons">home</i>Home</a>
          </li>
          <li>
            <a href="about.php"><i class="material-icons">person</i>About Us</a>
          </li>
          <li>
            <a href="service.php"
              ><i class="material-icons">settings</i>Services</a
            >
          </li>
          <li>
            <a href="project.php"
              ><i class="material-icons">bookmarks</i>Project</a
            >
          </li>
          <li>
            <a href="job.php"
              ><i class="material-icons">mail_outline</i>Job Vacancy</a
            >
          </li>
          <li>
            <a href="contact.php"><i class="material-icons">phone</i>Contact</a>
          </li>
          <?php if ($login) : ?>
            <li>
              <a href="admin/index.php"><i class="material-icons">person</i><?= $data[0]['username'];?></a>
            </li>
          <?php else : ?>
            <li>
              <a href="register.php"
                ><i class="material-icons">person_add_alt</i>Register</a
              >
            </li>
            <li>
              <a href="login.php"><i class="material-icons">login</i>Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>

    <main>
    <section class="service">
      <div class="container">
        <h3>Project</h3>
        <div class="box">
          <div class="col-4 x-box">
            <div class="image">
              <img src="assets/img/1.jpg" alt="1">
            </div>
            <h5>Gading Mediterania Residences (GMR)</h5>
            <p>Hunian bergaya mediterania namun praktis, Gading Mediterania Residences yang memiliki 3 tower terdiri dari 1.584 unit apartemen berlokasi di Jl. Boulevard Bukit Gading Raya, Kelapa Gading, Jakarta Utara. Berbagai fasilitas yang dimiliki oleh Gading Mediterania Residences, seperti kolam renang, fitness center dan sauna, menambah keunggulan tersendiri untuk hunian yang satu ini.</p>
          </div>
          <div class="col-4 x-box">
          <div class="image">
              <img src="assets/img/2.jpg" alt="2">
            </div>
            <h5>Mediterania Garden Residences 1 (MGR 1)</h5>
            <p>Hunian bergaya mediterania namun praktis, Gading Mediterania Residences yang memiliki 3 tower terdiri dari 1.584 unit apartemen berlokasi di Jl. Boulevard Bukit Gading Raya, Kelapa Gading, Jakarta Utara. Berbagai fasilitas yang dimiliki oleh Gading Mediterania Residences, seperti kolam renang, fitness center dan sauna, menambah keunggulan tersendiri untuk hunian yang satu ini.</p>
          </div>
          <div class="col-4 x-box">
          <div class="image">
              <img src="assets/img/3.jpg" alt="3">
            </div>
            <h5>Mediterania Lagoon Residences (MLR)</h5>
            <p>Hunian bergaya mediterania namun praktis, Gading Mediterania Residences yang memiliki 3 tower terdiri dari 1.584 unit apartemen berlokasi di Jl. Boulevard Bukit Gading Raya, Kelapa Gading, Jakarta Utara. Berbagai fasilitas yang dimiliki oleh Gading Mediterania Residences, seperti kolam renang, fitness center dan sauna, menambah keunggulan tersendiri untuk hunian yang satu ini.</p>
          </div>
        </div>
      </div>
    </section>
    </main>

    <footer>
      <div class="container">
      <p>@Copyright by 21552011423_Gerry Pratama Putra_TIFRM21_UASWEB1</p>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
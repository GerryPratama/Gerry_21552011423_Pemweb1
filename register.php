<?php
session_start();
require_once 'config/database.php';
require_once 'config/crud.php';

$ob = new crud;

// cek apakah sesi udah ada
if (isset($_SESSION['xid'])) {
  header("Location: admin/index.php");
}

// cek apakah tombol daftar ditekan
if (isset($_POST['register'])) {
  // ambil data
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  // cek apakah data terisi
  if ($username === "" && $email === "" && $password === "" && $password2 === "") {
    echo "<script>alert('data jangan kosong');</script>";
  } else {
    // apakah password sudah sama
    if (strcmp($password, $password2) === 0) {
      // tambahkan user ke database
      $ob->createUser($username, $email, $password);
      echo "<script>
              alert('user berhasil ditambah');
              document.location.href = 'login.php';
            </script>";
    } else {
      echo "<script>alert('ada kesalahan penginputan');</script>";
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf -8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - UAS Pemrograman Web 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body id="register">
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
          <a href="service.php"><i class="material-icons">settings</i>Services</a>
        </li>
        <li>
          <a href="project.php"><i class="material-icons">bookmarks</i>Project</a>
        </li>
        <li>
          <a href="job.php"><i class="material-icons">mail_outline</i>Job Vacancy</a>
        </li>
        <li>
          <a href="contact.php"><i class="material-icons">phone</i>Contact</a>
        </li>
        <li>
          <a href="register.php"><i class="material-icons">person_add_alt</i>Register</a>
        </li>
        <li>
          <a href="login.php"><i class="material-icons">login</i>Login</a>
        </li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="main_hero">
      <h3>Daftar</h3>
      <div class="container">
        <div class="row x-content">
          <div class="col-md-4">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="username" placeholder="masukan username..." required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="masukan email..." required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <div class="password">
                  <input type="password" class="form-control" name="password" id="pass" placeholder="masukan password..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one upper and lower case letter, and at least 8 characters or more" required><span class="icon-input" id="viewPw" onclick="viewPw()"><i class="material-icons">visibility</i></span>
                </div>
              </div>
              <div class="mb-3">
                <label for="password2" class="form-label">Konfirmasi Password</label>
                <div class="password">
                  <input type="password" class="form-control" name="password2" id="pass2" placeholder="masukan konfirmasi password..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one upper and lower case letter, and at least 8 characters or more" required><span class="icon-input" id="viewPw2" onclick="viewPw2()"><i class="material-icons">visibility</i></span>

                </div>
              </div>
              <button type="submit" name="register" class="btn btn-primary">Daftar</button>
            </form>
          </div>
          <div class="col-md-6"></div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>@Copyright by 21552011423_Gerry Pratama Putra_TIFRM21_UASWEB1</p>
    </div>
  </footer>
  <script>
    const select = (el, all = false) => {
      el = el.trim();
      if (all) {
        return [...document.querySelectorAll(el)];
      } else {
        return document.querySelector(el);
      }
    }

    function viewPw() {
      let x = select("#pass").type;

      if (x == "password") {
        select("#pass").type = "text";
        select("#viewPw").innerHTML = `<i class="material-icons">visibility_off</i>`;
      } else {
        select("#pass").type = "password";
        select("#viewPw").innerHTML = `<i class="material-icons">visibility</i>`;
      }
    }

    function viewPw2() {
      let y = select('#pass2').type;

      if (y == "password") {
        select("#pass2").type = "text";
        select("#viewPw2").innerHTML = `<i class="material-icons">visibility_off</i>`;
      } else {
        select("#pass2").type = "password";
        select("#viewPw2").innerHTML = `<i class="material-icons">visibility</i>`;
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

if (!isset($_SESSION['xid'])) {
  header("Location: ../index.php");
}

header("Location: ../login.php");
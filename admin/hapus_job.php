<?php
session_start();
require_once '../config/database.php';
require_once '../config/crud.php';

$obj = new crud;

if (!isset($_SESSION['xid'])) {
  header("Location: ../index.php");
}

// ambil id
$id = (int)$_GET['id'];
$obj->deleteJob($id);
echo "<script>alert('data berhasil dihapus');</script>";
header("Location: index.php");
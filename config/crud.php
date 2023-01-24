<?php

class crud extends database {
  public function read($sql) {
    $stmtn = $this->koneksi->prepare($sql);
    $stmtn->execute();
    return $stmtn;
  }

  public function readOneData($sql, $bind, $data) {
    $stmtn = $this->koneksi->prepare($sql);
    $stmtn->bindParam($bind, $data);
    $stmtn->execute();
    return $stmtn;
  }

  public function createUser($username, $email, $password) {
    $stmtn = $this->koneksi->prepare("INSERT INTO users(username, email, password) VALUES (:username, :email, :password)");
    $stmtn->bindParam(":username", $username);
    $stmtn->bindParam(":email", $email);
    $stmtn->bindParam(":password", $password);
    $stmtn->execute();
    return $stmtn;
  }

  public function updateUser($id, $username, $email, $password) {
    $stmtn = $this->koneksi->prepare("UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id");
    $stmtn->bindParam(":username", $username);
    $stmtn->bindParam(":email", $email);
    $stmtn->bindParam(":password", $password);
    $stmtn->bindParam(':id', $id);
    $stmtn->execute();
    return $stmtn;
  }

  public function createJob($job, $gender, $umur, $pendidikan, $tempat, $tanggungJawab, $keahlian) {
    $stmtn = $this->koneksi->prepare("INSERT INTO job(nama_job, gender, umur, pendidikan, tempat, tanggung_jawab, keahlian) VALUES (:nama_job, :gender, :umur, :pendidikan, :tempat, :tanggung_jawab, :keahlian)");
    $stmtn->bindParam(":nama_job", $job);
    $stmtn->bindParam(":gender", $gender);
    $stmtn->bindParam(":umur", $umur);
    $stmtn->bindParam(":pendidikan", $pendidikan);
    $stmtn->bindParam(":tempat", $tempat);
    $stmtn->bindParam(":tanggung_jawab", $tanggungJawab);
    $stmtn->bindParam(":keahlian", $keahlian);
    $stmtn->execute();
    return $stmtn;
  }

  public function updateJob($id, $job, $gender, $umur, $pendidikan, $tempat, $tanggungJawab, $keahlian) {
    $stmtn = $this->koneksi->prepare("UPDATE job SET nama_job = :nama_job, gender = :gender, umur = :umur, pendidikan = :pendidikan, tempat = :tempat, tanggung_jawab = :tanggung_jawab, keahlian = :keahlian WHERE id_job = :id");
    $stmtn->bindParam(":nama_job", $job);
    $stmtn->bindParam(":gender", $gender);
    $stmtn->bindParam(":umur", $umur);
    $stmtn->bindParam(":pendidikan", $pendidikan);
    $stmtn->bindParam(":tempat", $tempat);
    $stmtn->bindParam(":tanggung_jawab", $tanggungJawab);
    $stmtn->bindParam(":keahlian", $keahlian);
    $stmtn->bindParam(":id", $id);
    $stmtn->execute();
    return $stmtn;
  }

  public function deleteJob($id) {
    $stmtn = $this->koneksi->prepare("DELETE FROM job WHERE id_job = :id");
    $stmtn->bindParam(":id", $id);
    $stmtn->execute();
    return $stmtn;
  }
}
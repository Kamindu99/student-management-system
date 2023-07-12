<?php
include_once './config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_SESSION['empid'])) {
    $empid = $_SESSION['empid'];

    $compname = $_POST['compname'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $updateSql = "UPDATE compregister SET  compname=?, location=?, email=?, description=?, username=?, password=?  WHERE compid=?";
    $stmt = $con->prepare($updateSql);
    $stmt->bind_param("sssssss", $compname, $location, $email, $description, $username, $password, $empid);

    if ($stmt->execute()) {
        echo "<script> 
        alert('Company Details updated successfully');
        window.location.href='profile.php';
    </script>";
    } else {
      echo "Error updating record: " . $stmt->error;
    }
  } else {
    echo "company ID not found.";
  }
}
?>

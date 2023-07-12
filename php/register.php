<?php
include_once './config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $compid	 = $_POST["compid"];
    $compname = $_POST["compname"];
    $location = $_POST["location"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cnfrmpwd = $_POST["cnfrmpwd"];

    // Validate password length
    if (strlen($password) < 8) {
        echo "<script> 
        alert('Password should be at least 8 characters long.');
    </script>";
    } else {
        if ($password !== $cnfrmpwd) {
            echo "<script> 
            alert('Password and confirm password do not match.');
        </script>";
        } else {
            $stmt = $con->prepare("INSERT INTO `compregister`(`compid`, `compname`, `location`, `email`, `description`, `username`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $compid, $compname, $location, $email, $description, $username, $password);

            if ($stmt->execute()) {
                echo "<script> 
            alert('Company Registration successful!');
            window.location.href='../html/login.html';
        </script>";
            } else {
                echo "<script> 
                alert('Registration unsuccessful. Error: " . $stmt->error . "');
            </script>";
            }
            $stmt->close();
        }
    }

    $con->close();
}
?>
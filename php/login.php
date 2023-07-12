<?php
include_once './config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    if (strlen($pass) < 8) {
        echo "<script> 
        alert('Password should be atleast 8 characters long');
    </script>";
   }
   else{
        $sql = "SELECT * FROM compregister WHERE username='" . $username . "' AND password='" . $pass . "'";
        $result = $con->query($sql);
    
        if ($result && $result->num_rows == 1) {
    
            $row = $result->fetch_assoc();
                $empid = $row['compid'];
    
                $_SESSION['empid'] = $empid;
    
            echo "<script> 
                alert('Student Login Successful !');
                window.location.href='profile.php';
            </script>";
        } else {
            echo "<script> 
                alert('Login Unsuccessful');
                window.location.href='../html/login.html';
            </script>";
        }
     }
}
?>
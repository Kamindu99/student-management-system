<?php
include_once './config.php';

session_start();
if (isset($_SESSION['empid'])) {
    $empid = $_SESSION['empid'];

    $deleteSql = "DELETE FROM compregister WHERE compid = ?";
    $stmt = $con->prepare($deleteSql);
    $stmt->bind_param("s", $empid);

    if ($stmt->execute()) {
        echo "Company deleted successfully.";
       
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
} else {
    echo "Company ID not found.";
}
?>

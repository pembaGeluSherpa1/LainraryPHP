<?php
include('../conect/config.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $deleteQuery = "DELETE FROM books WHERE id = $id";
    $result = mysqli_query($conn, $deleteQuery);
    header("Location: ../frontend/file.php"); 
    exit;
}
?>
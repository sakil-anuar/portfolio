<?php

session_start();


// Check admin login

if (!isset($_SESSION["admin_id"])) {

    header("Location: login.php");

    exit;
}


require_once "../php/db.php";

$conn = dbConnection();


// Get message ID

$id = filter_input(
    INPUT_GET,
    "id",
    FILTER_VALIDATE_INT
);


if (!$id) {

    header("Location: messages.php");

    exit;
}


// Delete message

$sql = "DELETE FROM contacts WHERE id = ?";


$stmt = mysqli_prepare($conn, $sql);


mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);


mysqli_stmt_execute($stmt);


mysqli_stmt_close($stmt);

mysqli_close($conn);


// Back to messages

header("Location: messages.php?deleted=1");

exit;

?>
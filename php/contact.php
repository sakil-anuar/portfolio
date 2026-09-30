<?php

require_once "db.php";


if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: ../index.php#contact");

    exit;

}


$name = trim($_POST["name"] ?? "");

$email = trim($_POST["email"] ?? "");

$subject = trim($_POST["subject"] ?? "");

$message = trim($_POST["message"] ?? "");



/* =========================
   Validation
========================= */

if (
    empty($name) ||
    empty($email) ||
    empty($subject) ||
    empty($message)
) {

    die("Please fill in all fields.");

}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    die("Please enter a valid email address.");

}



/* =========================
   Database Connection
========================= */

$conn = dbConnection();



/* =========================
   Insert Data
========================= */

$sql = "INSERT INTO contacts
        (name, email, subject, message)
        VALUES (?, ?, ?, ?)";


$stmt = mysqli_prepare($conn, $sql);


if (!$stmt) {

    die("Something went wrong.");

}


mysqli_stmt_bind_param(
    $stmt,
    "ssss",
    $name,
    $email,
    $subject,
    $message
);



/* =========================
   Execute
========================= */

if (mysqli_stmt_execute($stmt)) {

    mysqli_stmt_close($stmt);

    mysqli_close($conn);

    header("Location: ../index.php?success=1#contact");

    exit;

} else {

    mysqli_stmt_close($stmt);

    mysqli_close($conn);

    die("Message could not be sent.");

}

?>
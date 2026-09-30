<?php

session_start();

if (!isset($_SESSION["admin_id"])) {

    header("Location: login.php");

    exit;
}


require_once "../php/db.php";

$conn = dbConnection();


$id = filter_input(
    INPUT_GET,
    "id",
    FILTER_VALIDATE_INT
);


if (!$id) {

    header("Location: projects.php");

    exit;
}


// Get image first

$sql = "SELECT image
        FROM projects
        WHERE id = ?";


$stmt = mysqli_prepare(
    $conn,
    $sql
);


mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);


mysqli_stmt_execute($stmt);


$result =
    mysqli_stmt_get_result($stmt);


$project =
    mysqli_fetch_assoc($result);


mysqli_stmt_close($stmt);


if (!$project) {

    header("Location: projects.php");

    exit;
}


// Delete database record

$sql = "DELETE FROM projects
        WHERE id = ?";


$stmt = mysqli_prepare(
    $conn,
    $sql
);


mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);


mysqli_stmt_execute($stmt);


mysqli_stmt_close($stmt);


// Delete image

if (!empty($project["image"])) {

    $imagePath =
        "../images/projects/"
        . $project["image"];


    if (file_exists($imagePath)) {

        unlink($imagePath);

    }

}


mysqli_close($conn);


header(
    "Location: projects.php?deleted=1"
);

exit;

?>
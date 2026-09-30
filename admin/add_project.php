<?php

session_start();

if (!isset($_SESSION["admin_id"])) {

    header("Location: login.php");
    exit;

}

require_once "../php/db.php";

$conn = dbConnection();

$error = "";
$success = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = trim($_POST["title"] ?? "");

    $description = trim($_POST["description"] ?? "");

    $technologies = trim($_POST["technologies"] ?? "");

    $github_url = trim($_POST["github_url"] ?? "");

    $live_url = trim($_POST["live_url"] ?? "");


    if (
        empty($title) ||
        empty($description) ||
        empty($technologies) ||
        empty($github_url)
    ) {

        $error = "Please fill in all required fields.";

    } else {


        // Image

        $imageName = "";


        if (
            isset($_FILES["image"]) &&
            $_FILES["image"]["error"] === UPLOAD_ERR_OK
        ) {

            $allowedTypes = [
                "image/jpeg",
                "image/png",
                "image/webp"
            ];


            $fileType = $_FILES["image"]["type"];


            if (!in_array($fileType, $allowedTypes)) {

                $error = "Only JPG, PNG and WEBP images are allowed.";

            } else {


                $extension = pathinfo(
                    $_FILES["image"]["name"],
                    PATHINFO_EXTENSION
                );


                $imageName =
                    uniqid("project_", true)
                    . "."
                    . strtolower($extension);


                $uploadPath =
                    "../images/projects/"
                    . $imageName;


                if (
                    !move_uploaded_file(
                        $_FILES["image"]["tmp_name"],
                        $uploadPath
                    )
                ) {

                    $error = "Image upload failed.";

                }

            }

        }


        if (empty($error)) {


            $sql = "INSERT INTO projects
                    (
                        title,
                        description,
                        technologies,
                        github_url,
                        live_url,
                        image
                    )
                    VALUES (?, ?, ?, ?, ?, ?)";


            $stmt = mysqli_prepare(
                $conn,
                $sql
            );


            mysqli_stmt_bind_param(
                $stmt,
                "ssssss",
                $title,
                $description,
                $technologies,
                $github_url,
                $live_url,
                $imageName
            );


            if (mysqli_stmt_execute($stmt)) {

                header(
                    "Location: projects.php?added=1"
                );

                exit;

            } else {

                $error =
                    "Project could not be added.";

            }


            mysqli_stmt_close($stmt);

        }

    }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Project - Sakil Anuar</title>

    <link
        rel="stylesheet"
        href="../css/style.css"
    >

</head>


<body>


<header class="admin-navbar">

    <div class="admin-navbar-content">

        <a
            href="dashboard.php"
            class="admin-logo"
        >
            Sakil<span>.</span>
        </a>


        <div class="admin-nav-right">

            <span>
                Welcome,
                <?php
                echo htmlspecialchars(
                    $_SESSION["admin_name"]
                );
                ?>
            </span>

            <a href="logout.php">
                Logout
            </a>

        </div>

    </div>

</header>



<main class="admin-dashboard">

    <div class="admin-container">


        <div class="admin-heading">

            <p>
                Administration
            </p>

            <h1>
                Add Project
            </h1>

        </div>



        <div class="admin-form-card">


            <?php if (!empty($error)): ?>

                <div class="admin-error">

                    <?php
                    echo htmlspecialchars($error);
                    ?>

                </div>

            <?php endif; ?>


            <form
                method="POST"
                enctype="multipart/form-data"
            >


                <div class="admin-form-group">

                    <label for="title">
                        Project Title *
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="Enter project title"
                        required
                    >

                </div>



                <div class="admin-form-group">

                    <label for="description">
                        Description *
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Describe your project"
                        required
                    ></textarea>

                </div>



                <div class="admin-form-group">

                    <label for="technologies">
                        Technologies *
                    </label>

                    <input
                        type="text"
                        id="technologies"
                        name="technologies"
                        placeholder="HTML, CSS, JavaScript, PHP, MySQL"
                        required
                    >

                </div>



                <div class="admin-form-group">

                    <label for="github_url">
                        GitHub URL *
                    </label>

                    <input
                        type="url"
                        id="github_url"
                        name="github_url"
                        placeholder="https://github.com/..."
                        required
                    >

                </div>



                <div class="admin-form-group">

                    <label for="live_url">
                        Live URL
                    </label>

                    <input
                        type="url"
                        id="live_url"
                        name="live_url"
                        placeholder="https://..."
                    >

                </div>



                <div class="admin-form-group">

                    <label for="image">
                        Project Image
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                </div>



                <div class="admin-form-buttons">

                    <a
                        href="projects.php"
                        class="back-home"
                    >
                        Cancel
                    </a>


                    <button
                        type="submit"
                        class="btn primary-btn"
                    >
                        Add Project
                    </button>

                </div>


            </form>


        </div>


    </div>

</main>


</body>

</html>

<?php

mysqli_close($conn);

?>
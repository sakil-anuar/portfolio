<?php

session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

require_once "../php/db.php";

$conn = dbConnection();

$error = "";


// Get project ID

$id = filter_input(
    INPUT_GET,
    "id",
    FILTER_VALIDATE_INT
);

if (!$id) {
    header("Location: projects.php");
    exit;
}


// Get existing project

$sql = "SELECT *
        FROM projects
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$project = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);


if (!$project) {
    die("Project not found.");
}


// Update project

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = trim($_POST["title"] ?? "");

    $description = trim(
        $_POST["description"] ?? ""
    );

    $technologies = trim(
        $_POST["technologies"] ?? ""
    );

    $github_url = trim(
        $_POST["github_url"] ?? ""
    );

    $live_url = trim(
        $_POST["live_url"] ?? ""
    );


    if (
        empty($title) ||
        empty($description) ||
        empty($technologies) ||
        empty($github_url)
    ) {

        $error =
            "Please fill in all required fields.";

    } else {

        $imageName = $project["image"];


        // New image uploaded

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


            if (!in_array(
                $fileType,
                $allowedTypes
            )) {

                $error =
                    "Only JPG, PNG and WEBP images are allowed.";

            } else {

                $extension = pathinfo(
                    $_FILES["image"]["name"],
                    PATHINFO_EXTENSION
                );


                $newImageName =
                    uniqid(
                        "project_",
                        true
                    )
                    . "."
                    . strtolower($extension);


                $uploadPath =
                    "../images/projects/"
                    . $newImageName;


                if (
                    move_uploaded_file(
                        $_FILES["image"]["tmp_name"],
                        $uploadPath
                    )
                ) {

                    // Delete old image

                    if (
                        !empty($project["image"])
                    ) {

                        $oldImage =
                            "../images/projects/"
                            . $project["image"];


                        if (
                            file_exists($oldImage)
                        ) {

                            unlink($oldImage);

                        }

                    }


                    $imageName =
                        $newImageName;

                } else {

                    $error =
                        "Image upload failed.";

                }

            }

        }


        if (empty($error)) {

            $sql = "UPDATE projects
                    SET
                        title = ?,
                        description = ?,
                        technologies = ?,
                        github_url = ?,
                        live_url = ?,
                        image = ?
                    WHERE id = ?";


            $stmt = mysqli_prepare(
                $conn,
                $sql
            );


            mysqli_stmt_bind_param(
                $stmt,
                "ssssssi",
                $title,
                $description,
                $technologies,
                $github_url,
                $live_url,
                $imageName,
                $id
            );


            if (
                mysqli_stmt_execute($stmt)
            ) {

                mysqli_stmt_close($stmt);

                mysqli_close($conn);

                header(
                    "Location: projects.php?updated=1"
                );

                exit;

            } else {

                $error =
                    "Project could not be updated.";

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

    <title>Edit Project - Sakil Anuar</title>

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
                Edit Project
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
                        value="<?php
                        echo htmlspecialchars(
                            $project["title"]
                        );
                        ?>"
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
                        required
                    ><?php
                    echo htmlspecialchars(
                        $project["description"]
                    );
                    ?></textarea>

                </div>



                <div class="admin-form-group">

                    <label for="technologies">
                        Technologies *
                    </label>

                    <input
                        type="text"
                        id="technologies"
                        name="technologies"
                        value="<?php
                        echo htmlspecialchars(
                            $project["technologies"]
                        );
                        ?>"
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
                        value="<?php
                        echo htmlspecialchars(
                            $project["github_url"]
                        );
                        ?>"
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
                        value="<?php
                        echo htmlspecialchars(
                            $project["live_url"]
                        );
                        ?>"
                    >

                </div>



                <div class="admin-form-group">

                    <label for="image">
                        Replace Project Image
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
                        Update Project
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
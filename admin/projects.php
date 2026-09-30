<?php

session_start();

if (!isset($_SESSION["admin_id"])) {

    header("Location: login.php");
    exit;

}

require_once "../php/db.php";

$conn = dbConnection();


// Get all projects

$sql = "SELECT id, title, description, technologies,
               github_url, live_url, image, created_at
        FROM projects
        ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Projects - Sakil Anuar</title>

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


        <div class="admin-section-header">

            <div>

                <p class="admin-page-label">
                    Administration
                </p>

                <h1>
                    Projects
                </h1>

            </div>


            <a
                href="add_project.php"
                class="admin-add-btn"
            >
                + Add Project
            </a>

        </div>



        <div class="admin-project-grid">


            <?php if (
                $result &&
                mysqli_num_rows($result) > 0
            ): ?>


                <?php while (
                    $project =
                    mysqli_fetch_assoc($result)
                ): ?>


                    <div class="admin-project-card">


                        <?php if (
                            !empty($project["image"])
                        ): ?>

                            <img
                                src="../images/projects/<?php
                                echo htmlspecialchars(
                                    $project["image"]
                                );
                                ?>"
                                alt="<?php
                                echo htmlspecialchars(
                                    $project["title"]
                                );
                                ?>"
                            >

                        <?php endif; ?>


                        <div class="admin-project-content">

                            <h2>
                                <?php
                                echo htmlspecialchars(
                                    $project["title"]
                                );
                                ?>
                            </h2>


                            <p>
                                <?php
                                echo htmlspecialchars(
                                    $project["description"]
                                );
                                ?>
                            </p>


                            <small>
                                <?php
                                echo htmlspecialchars(
                                    $project["technologies"]
                                );
                                ?>
                            </small>


                         <div class="project-admin-actions">

    <a
        href="<?php
        echo htmlspecialchars(
            $project["github_url"]
        );
        ?>"
        target="_blank"
    >
        GitHub
    </a>


    <?php if (
        !empty($project["live_url"])
    ): ?>

        <a
            href="<?php
            echo htmlspecialchars(
                $project["live_url"]
            );
            ?>"
            target="_blank"
        >
            Live
        </a>

    <?php endif; ?>


    <!-- Edit -->

    <a
        href="edit_project.php?id=<?php echo $project['id']; ?>"
    >
        Edit
    </a>


    <!-- Delete -->

    <a
        href="delete_project.php?id=<?php echo $project['id']; ?>"
        class="delete-btn"
        onclick="return confirm('Are you sure you want to delete this project?');"
    >
        Delete
    </a>

</div>

                        </div>

                    </div>


                <?php endwhile; ?>


            <?php else: ?>

                <p class="no-projects">
                    No projects added yet.
                </p>

            <?php endif; ?>


        </div>


    </div>

</main>


</body>

</html>

<?php

mysqli_close($conn);

?>
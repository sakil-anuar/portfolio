<?php


session_start();


// Check admin login

if (!isset($_SESSION["admin_id"])) {

    header("Location: login.php");

    exit;

}


require_once "../php/db.php";

$conn = dbConnection();


// Get total messages

$sql = "SELECT COUNT(*) AS total FROM contacts";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$totalMessages = $row["total"];


// Get total projects

$sql = "SELECT COUNT(*) AS total FROM projects";

$resultProjects = mysqli_query($conn, $sql);

$rowProjects = mysqli_fetch_assoc($resultProjects);

$totalProjects = $rowProjects["total"];


// Get recent messages

$sql = "SELECT id, name, email, subject, created_at
        FROM contacts
        ORDER BY created_at DESC
        LIMIT 5";

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

    <title>Admin Dashboard - Sakil Anuar</title>

    <link
        rel="stylesheet"
        href="../css/style.css"
    >

</head>


<body>


<!-- =========================
     Admin Navbar
========================= -->

<header class="admin-navbar">

    <div class="admin-navbar-content">

        <a href="dashboard.php" class="admin-logo">
            Sakil<span>.</span>
        </a>


        <div class="admin-nav-right">

            <span>
                Welcome,
                <?php echo htmlspecialchars($_SESSION["admin_name"]); ?>
            </span>

            <a href="logout.php">
                Logout
            </a>

        </div>

    </div>

</header>



<!-- =========================
     Dashboard
========================= -->

<main class="admin-dashboard">

    <div class="admin-container">


        <div class="admin-heading">

            <div>

                <p>Administration</p>

                <h1>
                    Dashboard
                </h1>

            </div>

        </div>



        <!-- =========================
             Statistics
        ========================= -->

        <div class="admin-stats">


            <!-- Total Messages -->

            <div class="stat-card">

                <div class="stat-icon">
                    ✉
                </div>

                <div>

                    <p>
                        Total Messages
                    </p>

                    <h2>
                        <?php echo $totalMessages; ?>
                    </h2>

                </div>

            </div>


            <!-- Total Projects -->

            <div class="stat-card">

                <div class="stat-icon">
                    📁
                </div>

                <div>

                    <p>
                        Total Projects
                    </p>

                    <h2>
                        <?php echo $totalProjects; ?>
                    </h2>

                </div>

            </div>


        </div>



        <!-- =========================
             Projects
        ========================= -->

        <div class="admin-section">


            <div class="admin-section-header">

                <div>

                    <h2>
                        Projects
                    </h2>

                    <p>
                        Manage your portfolio projects.
                    </p>

                </div>


                <div style="display: flex; gap: 10px; align-items: center;">

                    <a
                        href="projects.php"
                        class="admin-view-all"
                    >
                        Manage Projects
                    </a>


                    <a
                        href="add_project.php"
                        class="admin-add-btn"
                    >
                        + Add Project
                    </a>

                </div>

            </div>


        </div>



        <!-- =========================
             Recent Messages
        ========================= -->

        <div class="admin-section">


            <div class="admin-section-header">

                <div>

                    <h2>
                        Recent Messages
                    </h2>

                    <p>
                        Latest messages received from visitors.
                    </p>

                </div>


                <a
                    href="messages.php"
                    class="admin-view-all"
                >
                    View All
                </a>

            </div>



            <div class="admin-table-wrapper">

                <table class="admin-table">

                    <thead>

                        <tr>

                            <th>Name</th>

                            <th>Email</th>

                            <th>Subject</th>

                            <th>Date</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php if (mysqli_num_rows($result) > 0): ?>


                        <?php while ($message = mysqli_fetch_assoc($result)): ?>

                            <tr>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $message["name"]
                                    );
                                    ?>
                                </td>


                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $message["email"]
                                    );
                                    ?>
                                </td>


                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $message["subject"]
                                    );
                                    ?>
                                </td>


                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $message["created_at"]
                                    );
                                    ?>
                                </td>

                            </tr>

                        <?php endwhile; ?>


                    <?php else: ?>

                        <tr>

                            <td
                                colspan="4"
                                class="no-data"
                            >
                                No messages yet.
                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>


        </div>


    </div>

</main>


</body>

</html>

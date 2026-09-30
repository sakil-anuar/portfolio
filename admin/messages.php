<?php

session_start();


// Check admin login

if (!isset($_SESSION["admin_id"])) {

    header("Location: login.php");

    exit;
}


require_once "../php/db.php";

$conn = dbConnection();


// Get all messages

$sql = "SELECT id, name, email, subject, message, created_at
        FROM contacts
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

    <title>Messages - Sakil Anuar</title>

    <link
        rel="stylesheet"
        href="../css/style.css"
    >

</head>


<body>

    
     <?php

if (isset($_GET["deleted"]) && $_GET["deleted"] == "1") {

    echo '
    <div class="container">
        <div class="admin-success">
            ✓ Message deleted successfully.
        </div>
    </div>
    ';

}

?>


<!-- =========================
     Admin Navbar
========================= -->

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



<!-- =========================
     Messages
========================= -->

<main class="admin-dashboard">

    <div class="admin-container">


        <div class="admin-heading">

            <p>
                Administration
            </p>

            <h1>
                All Messages
            </h1>

        </div>



        <div class="admin-section">


            <div class="admin-section-header">

                <div>

                    <h2>
                        Contact Messages
                    </h2>

                    <p>
                        Messages received from portfolio visitors.
                    </p>

                </div>


                <a
                    href="dashboard.php"
                    class="admin-view-all"
                >
                    ← Dashboard
                </a>

            </div>



            <div class="admin-table-wrapper">

                <table class="admin-table">

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Name</th>

                            <th>Email</th>

                            <th>Subject</th>

                            <th>Message</th>

                            <th>Date</th>
                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php if (
                        $result &&
                        mysqli_num_rows($result) > 0
                    ): ?>


                        <?php while (
                            $message =
                            mysqli_fetch_assoc($result)
                        ): ?>

                            <tr>

                                <td>
                                    <?php
                                    echo $message["id"];
                                    ?>
                                </td>


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


                                <td class="message-cell">

                                    <?php
                                    echo htmlspecialchars(
                                        $message["message"]
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

                            <td class="message-actions">

    <a
        href="view_message.php?id=<?php echo $message['id']; ?>"
        class="view-btn"
    >
        View
    </a>


    <a
        href="delete_message.php?id=<?php echo $message['id']; ?>"
        class="delete-btn"
        onclick="return confirm('Are you sure you want to delete this message?');"
    >
        Delete
    </a>

</td>

                        <?php endwhile; ?>


                    <?php else: ?>

                        <tr>

                            <td
                                colspan="6"
                                class="no-data"
                            >
                                No messages found.
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


<?php

mysqli_close($conn);

?>
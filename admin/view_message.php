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


// Get message

$sql = "SELECT id, name, email, subject, message, created_at
        FROM contacts
        WHERE id = ?";


$stmt = mysqli_prepare($conn, $sql);


mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);


mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);


$message = mysqli_fetch_assoc($result);


if (!$message) {

    mysqli_stmt_close($stmt);

    mysqli_close($conn);

    die("Message not found.");

}


mysqli_stmt_close($stmt);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>View Message - Sakil Anuar</title>

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
                View Message
            </h1>

        </div>


        <div class="message-details">


            <div class="message-detail-row">

                <span>Name</span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $message["name"]
                    );
                    ?>
                </strong>

            </div>


            <div class="message-detail-row">

                <span>Email</span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $message["email"]
                    );
                    ?>
                </strong>

            </div>


            <div class="message-detail-row">

                <span>Subject</span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $message["subject"]
                    );
                    ?>
                </strong>

            </div>


            <div class="message-detail-row">

                <span>Date</span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $message["created_at"]
                    );
                    ?>
                </strong>

            </div>


            <div class="message-content">

                <h3>
                    Message
                </h3>

                <p>
                    <?php
                    echo nl2br(
                        htmlspecialchars(
                            $message["message"]
                        )
                    );
                    ?>
                </p>

            </div>


            <div class="message-detail-buttons">

                <a
                    href="messages.php"
                    class="admin-view-all"
                >
                    ← Back to Messages
                </a>

            </div>


        </div>


    </div>

</main>


</body>

</html>

<?php

mysqli_close($conn);

?>
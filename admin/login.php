<?php



session_start();

require_once "../php/db.php";


$error = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");

    $password = $_POST["password"] ?? "";


    if (empty($email) || empty($password)) {

        $error = "Please enter email and password.";

    } else {

        $conn = dbConnection();


        $sql = "SELECT id, name, email, password
                FROM admins
                WHERE email = ?";


        $stmt = mysqli_prepare($conn, $sql);


        mysqli_stmt_bind_param(
            $stmt,
            "s",
            $email
        );


        mysqli_stmt_execute($stmt);


        $result = mysqli_stmt_get_result($stmt);


        if ($admin = mysqli_fetch_assoc($result)) {

            if (
                password_verify(
                    $password,
                    $admin["password"]
                )
            ) {

                $_SESSION["admin_id"] =
                    $admin["id"];

                $_SESSION["admin_name"] =
                    $admin["name"];

                header("Location: dashboard.php");

                exit;

            } else {

                $error = "Invalid email or password.";

            }

        } else {

            $error = "Invalid email or password.";

        }


        mysqli_stmt_close($stmt);

        mysqli_close($conn);

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

    <title>Admin Login - Sakil Anuar</title>

    <link
        rel="stylesheet"
        href="../css/style.css"
    >

</head>


<body>


<div class="admin-login-page">

    <div class="admin-login-box">

        <h1>
            Admin Login
        </h1>


        <p>
            Login to manage your portfolio.
        </p>


        <?php if (!empty($error)): ?>

            <div class="admin-error">

                <?php echo htmlspecialchars($error); ?>

            </div>

        <?php endif; ?>


        <form method="POST">


            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter admin email"
                    required
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn primary-btn admin-login-btn"
            >
                Login
            </button>


        </form>


        <a
            href="../index.php"
            class="back-home"
        >
            ← Back to Portfolio
        </a>


    </div>

</div>


</body>

</html>
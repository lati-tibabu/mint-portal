<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles/login_styles.css">
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>

</head>

<?php
$role = $_GET['role'];

$role_name = "";
if ($role == 1) {
    $role_name = "human resource";
} else if ($role == 2) {
    $role_name = "public relation";
}
if ($role == 3) {
    $role_name = "document manager";
}
?>

<body>
    <div class="wrapper">
        <div class="logo-name">
            <div class="logo-login">
                <img id="logo" src="../logo/mint_logo_circle.svg" alt="" srcset="">
                <div>
                    Content Management Login
                </div>
            </div>
        </div>
        <div class="close-page" href="index.php">
            <a href="index.php">
                <!-- <i class="fa-solid fa-xmark"></i> -->
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        </div>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="../back_end/admin-login.php" method="post">

                <div class="input-box role-box">
                    <div>
                        <span>Login as</span>
                        <input id="role" name="role" type="text" value="<?php echo $role_name; ?>" readonly required>
                    </div>
                </div>

                <div class="input-box">
                    <!-- <span class="icon"><ion-icon name="mail-outline"></ion-icon></span> -->
                    <i class="fa-solid fa-envelope"></i>
                    <input class="input-field" name="email" type="email" required placeholder="email">
                    <!-- <label for="">Email </label> -->
                </div>

                <div class="input-box">
                    <!-- <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span> -->
                    <i class="fa-solid fa-lock"></i>
                    <input class="input-field" name="password" type="password" required placeholder="password">
                    <!-- <label for="">Password </label> -->
                </div>
                <div class="input-box">

                </div>
                <button type="submit" class="btn">Login</button>
            </form>

            <div class="input-box">
                <a href="forgot_password">Forgot Password</a>
            </div>

        </div>
    </div>

    <script>
        function close() {
            window.location.href = 'index.php';
        }
    </script>

    <!-- <script src="script.js"></script> -->
    <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
</body>

</html>
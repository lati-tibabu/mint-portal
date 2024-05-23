<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../admin-content/styles/login_styles.css">
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>

</head>

<body>
    <header>
        <h2 class="Logo"></h2>
    </header>
    <div class="wrapper">
        <h1>
            Admin Dashboard Login
        </h1>
        <div class="form-box login">
            <h2>Login</h2>
            <!-- <form action="../back_end/super-login.php"> -->
            <form action="../back_end/su_login.php" method="post">
                <div class="input-box">
                    <i class="fa-solid fa-user"></i>
                    <input name="username" type="text" required placeholder="email" required>
                </div>
                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input name="password" type="password" required placeholder="password" required>
                </div>
                <button type="submit" class="btn">
                    <!-- <a href="dashboard.html" style="text-decoration: none; color: white;">Login</a> -->
                    Login
                </button>
            </form>
        </div>
    </div>

</body>

</html>
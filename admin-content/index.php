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

<body>
    <header>
        <h2 class="Logo"></h2>
    </header>
    <div class="wrapper">
        <h1>
            Choose to login
        </h1>

        <div class="form-box login">
            <div class="roles">
                <div class="role-card" onclick="choose_role(1)">
                    <p>H<span>uman</span></p>
                    <p>R<span>esource</span></p>
                </div>

                <div class="role-card" onclick="choose_role(2)">
                    <p>P<span>ublic</span></p>
                    <p>R<span>elation</span></p>
                </div>

                <div class="role-card" onclick="choose_role(3)">
                    <p>D<span>ocument</span></p>
                    <p>M<span>anager</span></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function choose_role(params) {
            window.location.href = 'login.php?role=' + params;
        }
    </script>

</body>

</html>
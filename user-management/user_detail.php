<?php
session_start();

if (isset($_SESSION['s_user'])) {
    $s_username = $_SESSION['s_user'];
} else {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Account Details</title>
    <style>
        @font-face {
            font-family: "Poppins";
            src: url("/fonts/Poppins-Regular.ttf");
        }

        @font-face {
            font-family: "Open Sans";
            src: url("/fonts/OpenSans-Regular.ttf");
        }

        body {
            font-family: Arial, sans-serif;
            /* background-color: #f2f2f2; */
            background: linear-gradient(-45deg, #e74c3c, blue);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            text-align: center;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 15px;
            /* background-color: #3498db; */
            background: linear-gradient(45deg, #3498eb, green);
            color: #fff;
            line-height: 100px;
            font-size: 3rem;
            font-weight: bold;
            font-family: Poppins;
            text-transform: uppercase;
            user-select: none;
        }

        .info {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .info label {
            font-weight: bold;
        }

        .info p {
            margin: 0;
        }

        .password {
            color: #e74c3c;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .password input {
            border: none;
            width: 40%;
        }

        /* Style for the show/hide button */
        .show-hide-button {
            cursor: pointer;
            color: #3498db;
            text-decoration: underline;
        }

        /* Style for the back button */
        .back-button {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            background-color: #0f0f39;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php
    include("../back_end/config.php");

    $user_id = $_GET['user_id'];

    $query = "SELECT * FROM user where user_id = $user_id;";

    $result = mysqli_query($con, $query);

    $data = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    } else {
        echo "<script>alert('user couldn't found');</script>";
        // header('Location: ../mint-portal/vacancy_detail.php');
    }
    ?>

    <div class="card">
        <div class="avatar">
            <?php echo substr($data[0]['full_name'], 0, 1); ?>
        </div>
        <div class="info">
            <label>Username:</label>
            <p>
                <?php echo $data[0]['user_name'] ?>
            </p>
        </div>
        <div class="info">
            <label>Full Name:</label>
            <p>
                <?php echo $data[0]['full_name'] ?>
            </p>
        </div>
        <div class="info">
            <label>Email Address:</label>
            <p>
                <?php echo $data[0]['user_email'] ?>
            </p>
        </div>
        <div class="info">
            <label>Role:</label>
            <p>
                <?php echo $data[0]['role'] ?>
            </p>
        </div>
        <!-- <div class="info password">
            <label>Password:</label>
            <input type="password" id="password" value="<?php echo $data[0]['user_password'] ?>" readonly>
            <span class="show-hide-button" id="show-hide-button">Show Password</span>
        </div> -->
        <a class="back-button" href="dashboard.php">Back</a>
    </div>

    <script>
        // JavaScript to toggle password visibility
        const passwordInput = document.getElementById('password');
        const showHideButton = document.getElementById('show-hide-button');

        showHideButton.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showHideButton.textContent = 'Hide Password';
            } else {
                passwordInput.type = 'password';
                showHideButton.textContent = 'Show Password';
            }
        });
    </script>
</body>

</html>
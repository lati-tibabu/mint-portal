<?php
// include("session-checker.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/content-manage-style.css">
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
</head>

<body>

    <!-- <div id="adminHeader"></div>
    <script src="../js/adminHeader.js"></script> -->

    <?php
    include("header_2.php");
    ?>

    <main id="main">
        <div class="container">
            <div class="header">
                <!-- <ul>
                    <li><a href="" onclick="post_news()">Post News</a></li>
                    <li><a href="" onclick="manage_news()">Manage News</a></li>
                </ul> -->
                <h1><i class="fa-solid fa-home"></i>Home</h1>
                <div class="buttons">
                    <button onclick="post()" id="add-btn"><i class="fa-solid fa-table"></i>Manage Contents</button>
                    <button onclick="manage()" id="manage-btn"><i class="fa-solid fa-user-gear"></i>Manage Accounts</button>
                </div>
            </div>
            <div class="main-news-page">
                <div class="news-page post-news" id="post-news">
                    <?php
                    include("../../back_end/config.php");

                    function getCount($table_name)
                    {
                        global $con;
                        $query = "SELECT * FROM $table_name;";
                        $result = mysqli_query($con, $query);
                        $count = 0;

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $count++;
                            }
                        }

                        return $count;
                    }
                    ?>

                    <div class="contents">
                        <?php

                        if ($_SESSION['role'] == 'public relation') {

                            echo '<div class="contents-count">';
                            echo '<div class="name">';
                            echo 'News';
                            echo '</div>';
                            echo '<div class="count">';
                            echo '<h2>' . getCount("news") . '</h2> new(s) are posted!';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="contents-count">';
                            echo '<div class="name">';
                            echo 'Events';
                            echo '</div>';
                            echo '<div class="count">';
                            echo '<h2>' . getCount("event") . '</h2> event(s) are posted!';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="contents-count">';
                            echo '<div class="name">';
                            echo 'Announcements';
                            echo '</div>';
                            echo '<div class="count">';
                            echo '<h2>' . getCount("announcements") . '</h2> announcement(s) are posted!';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="contents-count">';
                            echo '<div class="name">';
                            echo 'History';
                            echo '</div>';
                            echo '<div class="count">';
                            echo '<h2>' . getCount("mint_history") . '</h2> History(ies) are posted!';
                            echo '</div>';
                            echo '</div>';
                        }

                        if ($_SESSION['role'] == 'document manager') {

                            echo '<div class="contents-count">';
                            echo '<div class="name">';
                            echo 'Documents';
                            echo '</div>';
                            echo '<div class="count">';
                            echo '<h2>' . getCount("documents") . '</h2> document(s) are posted!';
                            echo '</div>';
                            echo '</div>';
                        }

                        if ($_SESSION['role'] == 'human resource') {


                            echo '<div class="contents-count">';
                            echo '<div class="name">';
                            echo 'Vacancy';
                            echo '</div>';
                            echo '<div class="count">';
                            echo '<h2>' . getCount("vacancy") . '</h2> vacancy(ies) are posted!';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="contents-count">';
                            echo '<div class="name">';
                            echo 'Sectors';
                            echo '</div>';
                            echo '<div class="count">';
                            echo '<h2>' . getCount("sector") . '</h2> sector(s) are posted!';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="contents-count">';
                            echo '<div class="name">';
                            echo 'Office';
                            echo '</div>';
                            echo '<div class="count">';
                            echo '<h2>' . getCount("office") . '</h2> office(s) are posted!';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="contents-count">';
                            echo '<div class="name">';
                            echo 'Desk';
                            echo '</div>';
                            echo '<div class="count">';
                            echo '<h2>' . getCount("desk") . '</h2> desk(s) are posted!';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="contents-count">';
                            echo '<div class="name">';
                            echo 'Personnel';
                            echo '</div>';
                            echo '<div class="count">';
                            echo '<h2>' . getCount("personnel") . '</h2> personnel(s) are posted!';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>

                </div>

                <div class="news-page manage-news" id="manage-news">
                    <div class="profile-logout">
                        <div class="edit-profile">
                            <button onclick="show_profile()">
                                <i class="fa-solid fa-pencil"></i>Edit Profile
                            </button>
                        </div>

                        <div class="profile-info" id="profile-info">

                            <?php
                            include("../../back_end/config.php");

                            $query = "SELECT * FROM user where user_email = '$user_email';";

                            $result = mysqli_query($con, $query);

                            $data = array();

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
                            }

                            // echo $data[0]['user_email'];
                            ?>

                            <div class="user-name">
                                <label for="user-name">Username</label>
                                <input type="text" id="user-name" value="<?php echo $data[0]['user_name'] ?>" readonly>
                            </div>

                            <div class="user-name">
                                <label for="full-name">Fullname</label>
                                <input type="text" id="full-name" value="<?php echo $data[0]['full_name'] ?>">
                            </div>

                            <div class="user-name">
                                <label for="email">Email</label>
                                <input type="email" id="email" value="<?php echo $data[0]['user_email'] ?>">
                            </div>
                            <button class="save">Save</button>

                            <!-- 
                            <div class="change-password-btn">
                                <button class="save change" onclick>Change your password</button>
                            </div> -->

                            <div class="change_user_password">
                                <h3>
                                    Change Password
                                </h3>
                                <form action="../../back_end/change_user_password.php" method="post">

                                    <div class="user-name">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="user_email" value="<?php echo $data[0]['user_email'] ?>">
                                    </div>

                                    <div class="user-name">

                                        <label for="password">Old Password</label>
                                        <input type="password" id="password_old" name="old_password">

                                    </div>

                                    <div class="user-name">

                                        <label for="password">New Password</label>
                                        <input type="password" id="password" name="new_password" oninput="validatePassword()" required>

                                    </div>
                                    <span id="password-strength"></span>

                                    <button class="save">Change</button>
                                </form>
                            </div>


                        </div>
                        <div class="logout">
                            <!-- <form action="../../back_end/admin-logout.php"> -->
                            <button onclick="logout()"><i class="fa-solid fa-right-from-bracket"></i>Logout</button>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>
    <footer>
        <div class="footer-text">
            &copy;Copyright 2023, MinT
        </div>
    </footer>

    <script src="../../js/behavior.js" defer></script>

    <script>

        function validatePassword() {
            var password = document.getElementById("password").value;
            var passwordStrength = document.getElementById("password-strength");

            // Define regular expressions for password strength
            var strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            var mediumRegex = /^(?=.*[a-zA-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

            if (strongRegex.test(password)) {
                passwordStrength.innerHTML = '<span style="color: green;">Strong</span>';
            } else if (mediumRegex.test(password)) {
                passwordStrength.innerHTML = '<span style="color: orange;">Medium</span>';
            } else {
                passwordStrength.innerHTML = '<span style="color: red;">Weak</span>';
            }
        }

        function post() {
            const post_news = document.getElementById("post-news");
            const manage_news = document.getElementById("manage-news");
            const add_btn = document.getElementById("add-btn");
            const manage_btn = document.getElementById("manage-btn");

            post_news.style.transform = "translateX(50%)";
            manage_news.style.transform = "translateX(100%)";
            // add_btn.style.backgroundColor = "rgba(230, 148, 60, 0.585)";
            add_btn.style.borderBottom = "4px solid rgba(230, 148, 60, 0.585)";
            // add_btn.style.color = "white";
            // manage_btn.style.backgroundColor = "white";
            manage_btn.style.borderBottom = "none";
            // manage_btn.style.color = "black";
        }

        function manage() {
            const post_news = document.getElementById("post-news");
            const manage_news = document.getElementById("manage-news");
            const add_btn = document.getElementById("add-btn");
            const manage_btn = document.getElementById("manage-btn");

            post_news.style.transform = "translateX(-100%)";
            manage_news.style.transform = "translateX(-50%)";
            // manage_btn.style.backgroundColor = "rgba(230, 148, 60, 0.585)";
            manage_btn.style.borderBottom = "4px solid rgba(230, 148, 60, 0.585)";
            // manage_btn.style.color = "white";
            // add_btn.style.backgroundColor = "white";
            add_btn.style.borderBottom = "none";
            // add_btn.style.color = "black";
        }

        function show_profile() {
            const profile_info = document.getElementById("profile-info");

            if (profile_info.style.display === "none") {
                profile_info.style.display = "flex";
            } else {
                profile_info.style.display = "none";
            }
        }


        function delete_event(param) {
            if (confirm("Are you sure you want to delete this event?")) {
                window.location.href = '../../back_end/delete-events.php?event_id=' + param;
            }
        }

        function logout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "../../back_end/admin-logout.php";
            }
        }
    </script>
</body>

</html>
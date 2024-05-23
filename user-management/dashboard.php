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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/header_styles.css">
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
    <title>User Manager</title>
</head>

<body>
    <div class="container">
        <div class="container-header">
            <div class="logoPart" id="logoPart">
                <img class="logo" id="logo" src="../logo/mint_logo_circle.svg" alt="" srcset="">
                <div id="co_name">
                    Ministry of Innovation and Technology<br>
                    የኢኖቬሽን እና ቴክኖሎጂ ሚኒስቴር
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="side-section">
                <!-- <ul class="menu">
                    <li>
                        <i class="fa-solid fa-home"></i>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-users"></i>
                        <a href="#">User Management</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-file"></i>
                        <a href="#">Content Management</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-shield"></i>
                        <a href="#">Permissions & Roles</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chart-bar"></i>
                        <a href="#">Analytics & Reporting</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-pencil"></i>
                        <a href="#">Content Creation</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-upload"></i>
                        <a href="#">Content Publishing</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-flag"></i>
                        <a href="#">Content Moderation</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-bell"></i>
                        <a href="#">Notifications & Alerts</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-cog"></i>
                        <a href="#">Settings</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-question"></i>
                        <a href="#">Help & Support</a>
                    </li>

                    <li>
                        <i class="fa-solid fa-lock"></i>
                        <a href="#">Security & Compliance</a>
                    </li>

                    <li>
                        <i class="fa-solid fa-history"></i>
                        <a href="#">User Activity Logs</a>
                    </li>

                    <li>
                        <i class="fa-solid fa-database"></i>
                        <a href="#">Backup & Restore</a>
                    </li>

                    <li>
                        <i class="fa-solid fa-cloud-download"></i>
                        <a href="#">System Updates</a>
                    </li>

                    <li>
                        <i class="fa-solid fa-plug"></i>
                        <a href="#">API & Integration</a>
                    </li>

                    <li>
                        <i class="fa-solid fa-user"></i>
                        <a href="#">User Profile</a>
                    </li>
                </ul> -->

                <ul class="menu">
                    <!-- <li>
                        <i class="fa-solid fa-home"></i>
                        <a href="#">Dashboard</a>
                    </li> -->
                    <li>
                        <i class="fa-solid fa-users"></i>
                        <a href="">User Management</a>
                    </li>
                    <!-- <li>
                        <i class="fa-solid fa-file"></i>
                        <a href="#">Content Management</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-cog"></i>
                        <a href="#">Settings</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-question"></i>
                        <a href="#">Help & Support</a>
                    </li> -->
                </ul>

                <button id="log-out" onclick="logout()">
                    <i class="fa-solid fa-power-off"></i>
                    <p>Logout</p>
                </button>
            </div>
            <section>
                <div class="section-header">
                    <div class="pagename">
                        User Management
                    </div>
                    <div class="slide-menus">
                        <div class="slide-menu" id="create-cm" onclick="create_btn()">
                            Create Content Manager
                        </div>
                        <div class="slide-menu" id="manage-cm" onclick="manage_btn()">
                            Manage Content Managers
                        </div>
                        <div class="slide-menu" id="reset-cm" onclick="reset_btn()">
                            Account Resetting
                        </div>
                    </div>
                </div>

                <div class="manage-section">
                    <div class="section" id="create-user">

                        <span class="section-name">Create Content Manager</span>
                        <div class="form-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <form action="../back_end/create-content-manager.php" method="POST">

                            <!-- <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" required>
                            </div>

                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" id="middle_name" name="middle_name">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" required>
                            </div> -->

                            <div class="form-group">
                                <label for="last_name">Full Name</label>
                                <input type="text" id="full_name" name="full_name" oninput="usernameGenerate()" required>
                            </div>

                            <div class="form-group">
                                <label for="user_name">Choose username</label>
                                <input type="text" id="user_name" name="user_name" required>
                            </div>

                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="email" id="user_email" name="user_email" required>
                            </div>
                            <!-- 
                            <div class="form-group">
                                <label for="user_password">Password</label>
                                <input type="password" id="user_password" name="user_password" required>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password" required>
                            </div> -->

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" required>
                                    <option value="human resource">Human Resources</option>
                                    <option value="public relation">Public Relations</option>
                                    <option value="document manager">Document Managers</option>
                                </select>
                            </div>

                            <div class="form-group submit-button">
                                <input type="submit" value="Create">
                            </div>
                        </form>

                    </div>

                    <div class="section" id="manage-user">
                        <?php
                        include("../back_end/config.php");
                        $query = "SELECT * FROM user;";

                        $result = mysqli_query($con, $query);

                        $data = array();

                        $count = 0;

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $data[] = $row;
                                $count = $count + 1;
                            }
                        }
                        ?>
                        <span class="section-name">Manage Content Manager</span>
                        <div class="content-managers-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($count != 0) {

                                        for ($i = $count - 1; $i >= 0; $i--) {
                                            echo '<tr>';
                                            echo '    <th>' . $count - $i . '</th>';
                                            echo '    <th>' . $data[$i]["full_name"] . '</th>';
                                            echo '    <th>' . $data[$i]["user_email"] . '</th>';
                                            echo '    <th class="user-role">' . $data[$i]["role"] . '</th>';
                                            echo '    <th>';
                                            echo '        <div class="button-div">';
                                            echo '            <button class="view-btn" onclick="view(' . $data[$i]["user_id"] . ')">View</button>';
                                            echo '            <button class="delete-btn" onclick="delete_user(' . $data[$i]["user_id"] . ')">Delete</button>';
                                            echo '        </div>';
                                            echo '    </th>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Content Managers</h1><br><hr>";
                                    }
                                    ?>
                                </tbody>
                                <!-- <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>Lati Tibabu Gamachu</th>
                                        <th>lati@gmail.com</th>
                                        <th>Human Resource</th>
                                        <th>
                                            <div class="button-div">
                                                <button class="view-btn">View</button>
                                                <button class="delete-btn">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <th>John Doe</th>
                                        <th>john.doe@example.com</th>
                                        <th>Finance</th>
                                        <th>
                                            <div class="button-div">
                                                <button class="view-btn">View</button>
                                                <button class="delete-btn">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <th>Jane Smith</th>
                                        <th>jane.smith@example.com</th>
                                        <th>Marketing</th>
                                        <th>
                                            <div class="button-div">
                                                <button class="view-btn">View</button>
                                                <button class="delete-btn">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <th>Michael Johnson</th>
                                        <th>michael.johnson@example.com</th>
                                        <th>Engineering</th>
                                        <th>
                                            <div class="button-div">
                                                <button class="view-btn">View</button>
                                                <button class="delete-btn">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>5</th>
                                        <th>Susan Lee</th>
                                        <th>susan.lee@example.com</th>
                                        <th>Sales</th>
                                        <th>
                                            <div class="button-div">
                                                <button class="view-btn">View</button>
                                                <button class="delete-btn">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>6</th>
                                        <th>David Brown</th>
                                        <th>david.brown@example.com</th>
                                        <th>IT</th>
                                        <th>
                                            <div class="button-div">
                                                <button class="view-btn">View</button>
                                                <button class="delete-btn">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>7</th>
                                        <th>Laura Martinez</th>
                                        <th>laura.martinez@example.com</th>
                                        <th>Customer Support</th>
                                        <th>
                                            <div class="button-div">
                                                <button class="view-btn">View</button>
                                                <button class="delete-btn">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>8</th>
                                        <th>Robert Wilson</th>
                                        <th>robert.wilson@example.com</th>
                                        <th>Research</th>
                                        <th>
                                            <div class="button-div">
                                                <button class="view-btn">View</button>
                                                <button class="delete-btn">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>9</th>
                                        <th>Amy Taylor</th>
                                        <th>amy.taylor@example.com</th>
                                        <th>Product Management</th>
                                        <th>
                                            <div class="button-div">
                                                <button class="view-btn">View</button>
                                                <button class="delete-btn">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>10</th>
                                        <th>William Harris</th>
                                        <th>william.harris@example.com</th>
                                        <th>Operations</th>
                                        <th>
                                            <div class="button-div">
                                                <button class="view-btn">View</button>
                                                <button class="delete-btn">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody> -->
                            </table>
                        </div>
                    </div>

                    <div class="section reset-section" id="reset-user">

                        <span class="section-name">Account Reset Request</span>
                        <div class="request_list">

                            <?php

                            include("../back_end/config.php");

                            $request_query = "SELECT * FROM password_request;";

                            $request_result = mysqli_query($con, $request_query);

                            $request_data = array();

                            $request_count = 0;

                            if (mysqli_num_rows($request_result) > 0) {
                                while ($row = mysqli_fetch_assoc($request_result)) {
                                    $request_data[] = $row;
                                    $request_count = $request_count + 1;
                                }
                            }


                            if ($request_count != 0) {

                                for ($i = 0; $i < $request_count; $i++) {

                                    $user_email = $request_data[$i]["request_email"];

                                    echo '<div class="request_card">';
                                    echo '    <div class="request_information">';
                                    echo '        <div class="email_address"><span>Email: </span>' . $request_data[$i]["request_email"] . '</div>';

                                    $request_query2 = "SELECT full_name FROM user WHERE user_email = ?";

                                    if ($stmt = mysqli_prepare($con, $request_query2)) {

                                        mysqli_stmt_bind_param($stmt, "s", $request_data[$i]["request_email"]);
                                        mysqli_stmt_execute($stmt);

                                        $request_result2 = mysqli_stmt_get_result($stmt);

                                        $request_data2 = array();

                                        if (mysqli_num_rows($request_result2) > 0) {
                                            while ($row = mysqli_fetch_assoc($request_result2)) {
                                                $request_data2[] = $row['full_name'];
                                            }
                                        } else {
                                            $request_data2[] = "No records found for the provided email.";
                                        }

                                        // Close the statement
                                        mysqli_stmt_close($stmt);
                                    } else {
                                        echo "Error in preparing the SQL statement: " . mysqli_error($con);
                                    }

                                    echo '        <div class="user_fullname"><span>Full Name: </span>' . $request_data2[0] . '</div>';
                                    echo '    </div>';
                                    echo '    <div class="request_action">';
                                    echo '        <button class="request-btn approve" onclick="approve(' . $request_data[$i]["request_id"] . ')">Approve</button>';
                                    echo '        <button class="request-btn decline" onclick="decline(' . $request_data[$i]["request_id"] . ', \'' . $user_email . '\')">Decline</button>';
                                    echo '    </div>';
                                    echo '</div>';
                                }
                            } else {
                                echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Request</h1><br><hr>";
                            }

                            ?>

                            <!-- <div class="request_card">

                                <div class="request_information">
                                    <div class="email_address"><span>Email: </span> latitibabu@gmail.com</div>
                                    <div class="user_fullname"><span>Full Name: </span>Lati Tibabu</div>
                                </div>

                                <div class="request_action">
                                    <button class="request-btn approve">Approve</button>
                                    <button class="request-btn decline">Decline</button>
                                </div>

                            </div>

                            <div class="request_card">

                                <div class="request_information">
                                    <div class="email_address"><span>Email: </span> latitibabu@gmail.com</div>
                                    <div class="user_fullname"><span>Full Name: </span>Lati Tibabu</div>
                                </div>

                                <div class="request_action">
                                    <button class="request-btn approve">Approve</button>
                                    <button class="request-btn decline">Decline</button>
                                </div>

                            </div>

                            <div class="request_card">

                                <div class="request_information">
                                    <div class="email_address"><span>Email: </span> latitibabu@gmail.com</div>
                                    <div class="user_fullname"><span>Full Name: </span>Lati Tibabu</div>
                                </div>

                                <div class="request_action">
                                    <button class="request-btn approve">Approve</button>
                                    <button class="request-btn decline">Decline</button>
                                </div>

                            </div> -->
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </div>

    <script>
        function create_btn() {

            var create_button = document.getElementById('create-cm');
            var manage_button = document.getElementById('manage-cm');
            var reset_button = document.getElementById('reset-cm');

            var create_section = document.getElementById('create-user');
            var manage_section = document.getElementById('manage-user');
            var reset_section = document.getElementById('reset-user');

            create_button.style.backgroundColor = "#124e5a";
            manage_button.style.backgroundColor = "transparent";
            reset_button.style.backgroundColor = "transparent";

            create_button.style.color = "white";
            manage_button.style.color = "#124e5a";
            reset_button.style.color = "#124e5a";

            create_section.style.transform = "translateX(0)";
            manage_section.style.transform = "translateX(0)";
            reset_section.style.transform = "translateX(0)";

            create_section.style.opacity = "1"
            manage_section.style.opacity = "0"
            reset_section.style.opacity = "0"
            // create_section.style.display = "block"
            // manage_section.style.display = "none"
        }

        function manage_btn() {
            var create_button = document.getElementById('create-cm');
            var manage_button = document.getElementById('manage-cm');
            var reset_button = document.getElementById('reset-cm');

            var create_section = document.getElementById('create-user');
            var manage_section = document.getElementById('manage-user');
            var reset_section = document.getElementById('reset-user');

            create_button.style.backgroundColor = "transparent";
            manage_button.style.backgroundColor = "#124e5a";
            reset_button.style.backgroundColor = "transparent";

            create_button.style.color = "#124e5a";
            manage_button.style.color = "white";
            reset_button.style.color = "#124e5a";

            create_section.style.transform = "translateX(-100%)";
            manage_section.style.transform = "translateX(-100%)";
            reset_section.style.transform = "translateX(-100%)";

            create_section.style.opacity = "0"
            manage_section.style.opacity = "1"
            reset_section.style.opacity = "0"

            // create_section.style.display = "none"
            // manage_section.style.display = "block"
        }

        function reset_btn() {
            var create_button = document.getElementById('create-cm');
            var manage_button = document.getElementById('manage-cm');
            var reset_button = document.getElementById('reset-cm');

            var create_section = document.getElementById('create-user');
            var manage_section = document.getElementById('manage-user');
            var reset_section = document.getElementById('reset-user');

            create_button.style.backgroundColor = "transparent";
            manage_button.style.backgroundColor = "transparent";
            reset_button.style.backgroundColor = "#124e5a";

            create_button.style.color = "#124e5a";
            manage_button.style.color = "#124e5a";
            reset_button.style.color = "white";

            create_section.style.transform = "translateX(-200%)";
            manage_section.style.transform = "translateX(-200%)";
            reset_section.style.transform = "translateX(-200%)";

            create_section.style.opacity = "0"
            manage_section.style.opacity = "0"
            reset_section.style.opacity = "1"

            // create_section.style.display = "none"
            // manage_section.style.display = "block"
        }

        function delete_user(param) {
            if (confirm("Are you sure you want to delete this manager?")) {
                window.location.href = '../back_end/delete_content_managers.php?user_id=' + param;
            }
        }

        function view(params) {
            window.location.href = 'user_detail.php?user_id=' + params;
        }

        function logout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "../back_end/s_admin-logout.php";
            }
        }

        function usernameGenerate() {
            var user_name = document.getElementById("user_name");
            var full_name_input = document.getElementById("full_name");

            var full_name = full_name_input.value.replace(/ /g, "_");

            var randomNumber = Math.floor(Math.random() * 1000);

            var generateUsername = full_name.toLowerCase() + randomNumber;
            // var user_name.value = full_name.value.toLowerCase() + toString();

            user_name.value = generateUsername;

            // var number = Math.random() * 10000;

            // console.log(Math.floor(Math.random() * 1000));
        }
        // setInterval(usernameGenerate, 1000);

        function approve(param) {
            if (confirm("Are you sure you want to approve this request?")) {
                window.location.href = '../back_end/approve_reset_request.php?request_id=' + param;
            }
        }

        function decline(param, param2) {
            if (confirm("Are you sure you want to decline this request?")) {
                window.location.href = '../back_end/decline_reset_request.php?request_id=' + param + '&user_email=' + encodeURIComponent(param2);
            }
        }
    </script>
</body>

</html>
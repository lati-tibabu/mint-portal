<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desk</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/sector_styles.css">
</head>

<body>
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous"></script>

    <!-- <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script> -->

    <?php
    include('header.php');
    ?>

    <?php
    include("../mint-portal/back_end/config.php");

    $desk_id = $_GET['desk_id'];

    $query = "SELECT * FROM desk where desk_id = $desk_id;";
    $query2 = "SELECT * FROM personnel where desk_id = $desk_id;";

    $result = mysqli_query($con, $query);
    $result2 = mysqli_query($con, $query2);

    $desk_data = array();
    $personnel_data = array();

    $count = 0;
    $count2 = 0;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $desk_data[] = $row;
            $count = $count + 1;
        }
    }

    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $personnel_data[] = $row;
            $count2 = $count2 + 1;
        }
    }

    ?>

    <div class="page">
        <div class="page_name">
            Desk
        </div>
        <div class="office-page">
            <div class="page-subname">
                <!-- Records Management Team -->
                <?php
                echo $desk_data[0]['desk_name'];
                ?>
            </div>

            <div class="bar">
                <hr class="hor-bar">
            </div>

            <div class="subpage-contents">
                <div class="subpage-name">
                    Personnel
                </div>
                <div class="subpage-contents-detail desk-page">

                    <?php
                    for ($i = $count2 - 1; $i >= 0; $i--) {
                        echo '<div class="horizontal-card">';
                        echo '    <div class="card-image">';
                        echo '        <img src="back_end/personnel_images/' . $personnel_data[$i]['personnel_image'] . '" alt="' . $personnel_data[$i]['name'] . " image" . '" srcset="">';
                        echo '    </div>';
                        echo '    <div class="card-content">';
                        echo '        <div class="card-content-detail">';
                        echo '            <label for="name">Name: </label>';
                        echo '            <span id="name">' . $personnel_data[$i]['name'] . '</span>';
                        echo '        </div>';
                        echo '        <div class="card-content-detail">';
                        echo '            <label for="job-title">Job Title: </label>';
                        echo '            <span id="job-title">' . $personnel_data[$i]['job_title'] . '</span>';
                        echo '        </div>';
                        echo '        <div class="card-content-detail">';
                        echo '            <label for="department">Department: </label>';
                        echo '            <span id="department">' . $personnel_data[$i]['department'] . '</span>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- 
    <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script> -->
    <?php
    include('footer.php');
    ?>

    <script src="js/behavior.js"></script>
</body>

</html>
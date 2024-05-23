<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offices</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/sector_styles.css">
</head>

<body>
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous"></script>

    <?php
    include('header.php');
    ?>

    <?php
    include("../mint-portal/back_end/config.php");

    $office_id = $_GET['office_id'];

    $query = "SELECT * FROM desk where office_id = $office_id;";
    $query2 = "SELECT * FROM office where office_id = $office_id;";

    $result = mysqli_query($con, $query);
    $result2 = mysqli_query($con, $query2);

    $desk_data = array();
    $office_data = array();

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
            $office_data[] = $row;
            $count2 = $count2 + 1;
        }
    }

    ?>

    <div class="page">
        <div class="page_name">
            Office
        </div>
        <div class="office-page">
            <div class="page-subname">
                <!-- Human Resource Competency & Management Office -->
                <?php
                echo $office_data[0]['office_name'];
                ?>
            </div>

            <div class="bar">
                <hr class="hor-bar">
            </div>

            <div class="subpage-contents">
                <div class="subpage-name">
                    Desks
                </div>
                <div class="subpage-contents-detail">

                    <?php
                    for ($i = $count - 1; $i >= 0; $i--) {
                        // echo 'office';
                        echo '<div class="page-card" style="background: url(\'/images/news1.jpg\');">';

                        echo '<div class="card-title">';
                        echo $desk_data[$i]['desk_name'];
                        echo '</div>';

                        echo '<div class="card-button">';
                        echo '    <button onclick="view_desk(' . $desk_data[$i]['desk_id'] . ')">';
                        echo '        View';

                        echo '        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>';
                        echo '    </button>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    <!-- <div class="page-card" style="background: url('/images/news7.jpg');">
                        <div class="card-title">
                            Records Management Team
                        </div>

                        <div class="card-button">
                            <button>
                                View

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="page-card" style="background: url('/images/news2.jpg');">
                        <div class="card-title">
                            Human Resource Administration Team
                        </div>

                        <div class="card-button">
                            <button>
                                View

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="page-card" style="background: url('/images/news3.jpg');">
                        <div class="card-title">
                            Human Resource Competency & Management Team
                        </div>

                        <div class="card-button">
                            <button>
                                View

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>


    <!-- <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script> -->

    <?php
    include('footer.php');
    ?>

    <script src="js/behavior.js"></script>

    <script>
        function view_desk(params) {
            window.location.href = 'desk.php?desk_id=' + params;
        }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacancy</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/vacancy_styles.css">
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>

</head>

<body>
    <!-- <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script> -->

    <?php
    include("header.php");
    ?>

    <main>

        <!-- <div class="search-news">
            <form action="" method="get">
                <input type="number" name="job_id" id="">
                <button>Search</button>
            </form>
        </div> -->

        <?php
        include("../mint-portal/back_end/config.php");

        $job_id = $_GET['job_id'];

        // if ($job_id === null){
        //     $job_id = 4;
        // }
        // // $job_id = 4;

        $query = "SELECT * FROM vacancy where job_id = $job_id;";

        $result = mysqli_query($con, $query);

        $data = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            echo "<script>alert('vacancy couldn't found');</script>";
            header('Location: ../mint-portal/vacancy_detail.php');
        }
        ?>


        <div class="vacancy-section">

            <div class="back-button">
                <button>
                    <a href="vacancy.php">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg> Vacancies -->
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </button>

            </div>
            <div class="main-title">
                Vacancy
            </div>

            <div class="detailed">
                <div class="card-big vacancy-card">
                    <div class="job-title">
                        <p><span>Job Title: <br></span> <?php echo $data[0]['job_title'] ?> </p>
                    </div>

                    <div class="department">
                        <p><span>Department/Division: <br></span> <?php echo $data[0]['department_division'] ?> </p>
                    </div>

                    <div class="location">
                        <p><span>Location: <br></span><?php echo $data[0]['location'] ?></p>
                    </div>

                    <div class="deadline">
                        <p><span>Application Deadline: <br></span><?php echo $data[0]['deadline'] ?></p>
                    </div>

                    <div class="job-description">
                        <p><span>Job Description (Detailed): <br></span><?php echo $data[0]['job_description'] ?></p>
                    </div>

                    <div class="responsibilities">
                        <p><span>Responsibilities: <br></span><?php echo $data[0]['job_responsibility'] ?></p>
                    </div>

                    <div class="qualifications">
                        <p><span>Qualifications/Requirements: <br></span><?php echo $data[0]['qualification'] ?></p>
                    </div>

                    <div class="preferred-skills">
                        <p><span>Preferred Skills (if any): <br></span><?php echo $data[0]['skills'] ?></p>
                    </div>

                    <div class="application-instructions">
                        <p><span>Application Instructions: <br></span> <?php echo $data[0]['instruction'] ?> </p>
                    </div>

                    <div class="benefits">
                        <p><span>Benefits (if applicable): <br></span><?php echo $data[0]['benefits'] ?></p>
                    </div>

                    <div class="company-overview">
                        <p><span>Company Overview (brief): <br></span><?php echo $data[0]['co_overview'] ?></p>
                    </div>

                    <div class="apply-button">
                        <!-- <a href="vacancy-application.php"> -->
                        <?php
                        $jobId = $data[0]['job_id'];
                        $ariaLabel = 'Apply for Job ID ' . $jobId;

                        echo '<button ';
                        echo 'onclick="vacancy_application(' . $jobId . ')" ';
                        echo 'aria-label="' . $ariaLabel . '" ';
                        echo 'style="background-color: #124e5a; color: white;">';
                        echo 'Apply';
                        echo '</button>';
                        ?>

                    </div>

                </div>
            </div>

        </div>
    </main>

    <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script>


    <script src="js/behavior.js"></script>
    <script src="js/event_behavior.js"></script>

    <script>
        function vacancy_application(param) {
            window.location.href = 'vacancy-application.php?job_id=' + param;
        }
    </script>
</body>

</html>
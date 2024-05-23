<?php
include("session-checker.php");
include('human-resource-checker.php');
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

    <div class="submission-section">
        <div class="page-name">
            Application Detail
        </div>


        <?php
        include("../../back_end/config.php");

        $application_id = $_GET['application_id'];

        // if ($job_id === null){
        //     $job_id = 4;
        // }
        // // $job_id = 4;

        $query = "SELECT * FROM vacancy_applications where application_id = $application_id;";

        $result = mysqli_query($con, $query);

        $data = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            echo "<script>alert('vacancy application couldn't found');</script>";
            // header('Location: ../mint-portal/vacancy_detail.php');
            exit();
        }
        ?>




        <div class="back-button">
            <!-- <a href="vacancy_applications.html"> -->
            <?php
            // echo '<button onclick="view_applications(' . $data[0]['job_id'] . ')>';
            // echo '<i class="fa-solid fa-arrow-left"></i>';
            // echo 'Back to Application List';
            // echo '</button>';


            echo '<button onclick="view_applications(' . $data[0]["job_id"] . ')">';
            echo '<i class="fa-solid fa-arrow-left"></i>';
            echo 'Back to Application List';
            echo '</button>';
            ?>
            <!-- </a> -->
        </div>
        <div class="applicant-info">

            <div class="applicant-photo">
                <!-- <img src="../../back_end/images/64df983d71994.jfif" alt="applicant photo"> -->
                <?php echo '<img src=../../back_end/uploads/' . $data[0]['apply_image'] . ' alt="applicant photo' . $data[0]['first_name'] . '">' ?>;
            </div>

            <div class="applicant-detailed-info">

                <div class="info-details">
                    <label for="full-name">Full Name:</label>
                    <div id="full-name"><?php echo $data[0]['first_name'] . ' ' . $data[0]['middle_name'] . ' ' . $data[0]['last_name']; ?></div>
                </div>

                <div class="info-details">
                    <label for="gender">Gender:</label>
                    <div id="gender"><?php echo $data[0]['gender'] ?></div>
                </div>

                <div class="info-details">
                    <label for="phone">Phone Number:</label>
                    <div id="phone"><?php echo $data[0]['phone'] ?></div>
                </div>

                <div class="info-details">
                    <label for="email">Email:</label>
                    <div id="email"><?php echo $data[0]['email'] ?></div>
                </div>

                <div class="info-details">
                    <label for="dob">Date of Birth(GC):</label>
                    <div id="dob"><?php echo $data[0]['dob'] ?></div>
                </div>

                <div class="info-details">
                    <label for="marital-status">Marital Status:</label>
                    <div id="marital-status"><?php echo $data[0]['marital_status'] ?></div>
                </div>

                <div class="info-details">
                    <label for="address">Address:</label>
                    <div id="address"><?php echo $data[0]['address'] ?></div>
                </div>

                <div class="info-details">
                    <label for="address2">Additional Address:</label>
                    <div id="address2"><?php echo $data[0]['address2'] ?></div>
                </div>

                <div class="info-details">
                    <label for="work-experience">Total Working Experience:</label>
                    <div id="work-experience" <?php echo $data[0]['work_experience'] ?>></div>
                </div>

                <div class="info-details">
                    <label for="employment-status">Employment Status:</label>
                    <div id="employment-status"><?php echo $data[0]['employment_status'] ?></div>
                </div>

                <div class="info-details">
                    <label for="current-organization">Current Working Organization:</label>
                    <div id="current-organization"><?php echo $data[0]['current_organization'] ?></div>
                </div>

                <div class="info-details">
                    <label for="educational-status">Educational Status:</label>
                    <div id="educational-status"><?php echo $data[0]['educational_status'] ?></div>
                </div>

                <div class="info-details">
                    <label for="field-of-study">Field of Studies:</label>
                    <div id="field-of-study"><?php echo $data[0]['field_of_study'] ?></div>
                </div>

                <div class="info-details">
                    <label for="cgpa">CGPA:</label>
                    <div id="cgpa"><?php echo $data[0]['cgpa'] ?></div>
                </div>

                <div class="info-details">
                    <label for="grad-year">Year of Graduation:</label>
                    <div id="grad-year"><?php echo $data[0]['grad_year'] ?></div>
                </div>

                <div class="info-details">
                    <label for="institution-name">Institution Name:</label>
                    <div id="institution-name"><?php echo $data[0]['institution_name'] ?></div>
                </div>

                <!--  the pattern for the Educational and Work Background Section -->
                <div class="info-details">
                    <label for="resume">Resume/CV:</label>
                    <div id="resume">
                        <!-- You can include a link or display the file name here -->
                        <?php echo '<a href=../../back_end/uploads/' . $data[0]['resume_cv'] . ' target="_blank">'; ?>View Resume</a>
                    </div>
                </div>

                <div class="info-details">
                    <label for="cover-letter">Cover Letter:</label>
                    <div id="cover-letter">
                        <!-- You can include a link or display the file name here -->
                        <!-- <a href="path_to_cover_letter.pdf" target="_blank">View Cover Letter</a> -->
                        <?php echo '<a href=../../back_end/uploads/' . $data[0]['cover_letter'] . ' target="_blank">' ?>View Cover Letter</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script>
        function view_applications(param) {
            window.location.href = 'vacancy_applications.php?job_id=' + param;
        }
        // alert ("hello")}
    </script>
    <script src="../../js/behavior.js"></script>

</body>

</html>
<?php

include("session-checker.php");
include('human-resource-checker.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Items</title>
    <!-- <link rel="stylesheet" href="../styles/content-manage-style.css"> -->
    <link rel="stylesheet" href="../styles/edit_items_style.css">
    <link rel="stylesheet" href="../../style/header_styles.css">
    <script sync src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
</head>

<body>

    <div class="container">
        <div class="logoPart" id="logoPart">
            <img class="logo" id="logo" src="../../logo/mint_logo_circle.svg" alt="" srcset="">
            <div id="co_name" style="color: white;">
                Ministry of Innovation and Technology<br>
                የኢኖቬሽን እና ቴክኖሎጂ ሚኒስቴር
            </div>
        </div>
        <div class="item-category">
            <i class="fa-solid fa-pencil"></i>Edit Vacancy
        </div>
        <a href="vacancy.php">
            <div class="back_button">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </a>

        <div class="item-content">
            <form action="../../../mint-portal/back_end/vacancy-edit-post.php" method="post">
                <?php
                include("../../back_end/config.php");

                $job_id_no = $_GET['job_id_no'];

                $query = "SELECT * FROM vacancy where job_id = $job_id_no;";

                $result = mysqli_query($con, $query);

                $data = array();

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                } else {
                    echo "<script>alert('Vacancy couldn't be found');</script>";
                    header('Location: ../../admin-content/cms-pages/vacancy.php');
                }

                ?>

                <input type="hidden" name="job_id" value="<?php echo $data[0]['job_id']; ?>" readonly>

                <div class="item-content-detail">
                    <label for="job-title">Job Title</label>
                    <input name="job-title" class="headline" type="text" id="job-title" placeholder="Job Title" value="<?php echo $data[0]['job_title']; ?>" required><br>
                </div>

                <div class="item-content-detail">
                    <label for="department-division">Department/Division</label>
                    <input name="department-division" class="headline" type="text" id="department-division" placeholder="Department/Division" value="<?php echo $data[0]['department_division']; ?>" required><br>
                </div>

                <div class="item-content-detail">
                    <label for="location">Location</label>
                    <input name="location" class="headline" type="text" id="location" placeholder="Location" value="<?php echo $data[0]['location']; ?>" required><br>
                </div>

                <div class="item-content-detail">
                    <label for="deadline">Application Deadline</label>
                    <input name="deadline" class="headline" type="date" id="deadline" value="<?php echo $data[0]['deadline']; ?>" required><br>
                </div>

                <div class="item-content-detail">
                    <label for="job-description">Job Description</label>
                    <textarea name="job-description" id="job-description" cols="70" rows="6" autocomplete="off" placeholder="Job Description" required><?php echo $data[0]['job_description']; ?></textarea><br>
                </div>

                <div class="item-content-detail">
                    <label for="responsibility">Job Responsibility</label>
                    <textarea name="responsibility" id="responsibility" cols="70" rows="6" autocomplete="off" placeholder="Job Responsibilities" required><?php echo $data[0]['job_responsibility']; ?></textarea><br>
                </div>

                <div class="item-content-detail">
                    <label for="qualification">Qualifications/Requirements</label>
                    <textarea name="qualification" id="qualification" cols="70" rows="6" autocomplete="off" placeholder="Job Qualification and Requirements" required><?php echo $data[0]['qualification']; ?></textarea><br>
                </div>

                <div class="item-content-detail">
                    <label for="skills">Preferred Skills (if any)</label>
                    <textarea name="skills" id="skills" cols="70" rows="6" autocomplete="off" placeholder="Preferred Skills"><?php echo $data[0]['skills']; ?></textarea><br>
                </div>

                <div class="item-content-detail">
                    <label for="instruction">Application Instructions</label>
                    <textarea name="instruction" id="instruction" cols="70" rows="6" autocomplete="off" placeholder="Application Instructions" required><?php echo $data[0]['instruction']; ?></textarea><br>
                </div>

                <div class="item-content-detail">
                    <label for="benefits">Benefits (if applicable)</label>
                    <textarea name="benefits" id="benefits" cols="70" rows="6" autocomplete="off" placeholder="Benefits"><?php echo $data[0]['benefits']; ?></textarea><br>
                </div>

                <div class="item-content-detail">
                    <label for="co-overview">Company Overview (brief)</label>
                    <textarea name="co-overview" id="co-overview" cols="70" rows="6" autocomplete="off" placeholder="Company Overview"><?php echo $data[0]['co_overview']; ?></textarea><br>
                </div>

                <button>Update The Vacancy</button>
            </form>
            
        </div>

    </div>
</body>

</html>
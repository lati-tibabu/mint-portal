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

        <a href="personnel.php">
            <div class="back_button">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </a>

        <div class="logoPart" id="logoPart">
            <img class="logo" id="logo" src="../../logo/mint_logo_circle.svg" alt="" srcset="">
            <div id="co_name" style="color: white;">
                Ministry of Innovation and Technology<br>
                የኢኖቬሽን እና ቴክኖሎጂ ሚኒስቴር
            </div>
        </div>
        <div class="item-category">
            <i class="fa-solid fa-pencil"></i>Edit Personnel
        </div>

        <div class="item-content">
            <form action="../../../mint-portal/back_end/personnel-edit-post.php" method="post" enctype="multipart/form-data">
                <?php
                include("../../back_end/config.php");

                $personnel_id_no = $_GET['personnel_id_no'];

                $query = "SELECT * FROM personnel where personnel_id = $personnel_id_no;";
                $desk_query = "SELECT * FROM desk;";


                $result = mysqli_query($con, $query);
                $desk_result = mysqli_query($con, $desk_query);

                $data = array();
                $desk_data = array();

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                } else {
                    echo "<script>alert('Personnel couldn't be found');</script>";
                    header('Location: ../../admin-content/cms-pages/personnel.php');
                }

                $desk_count = 0;

                if (mysqli_num_rows($desk_result) > 0) {
                    while ($row = mysqli_fetch_assoc($desk_result)) {
                        $desk_data[] = $row;
                        $desk_count += 1;
                    }
                } else {
                    echo "<script>alert('Personnel couldn't be found');</script>";
                    header('Location: ../../admin-content/cms-pages/personnel.php');
                }
                ?>

                <input type="hidden" name="personnel_id" value="<?php echo $data[0]['personnel_id']; ?>" readonly>

                <div class="item-content-detail">
                    <label>Personnel Name</label>
                    <input name="personnel-name" class="headline" type="text" placeholder="Personnel Name" value="<?php echo $data[0]['name']; ?>" required><br>
                </div>

                <div class="item-content-detail">
                    <label>Job Title</label>
                    <input name="job-title" class="headline" type="text" placeholder="Job Title" value="<?php echo $data[0]['job_title']; ?>" required><br>
                </div>

                <div class="item-content-detail">
                    <label>Department</label>
                    <input name="department" class="headline" type="text" placeholder="Department" value="<?php echo $data[0]['department']; ?>" required><br>
                </div>

                <div class="item-content-detail">
                    <label>Personnel Desk</label>
                    <select name="personnel-desk" id="personnel-desk">
                        <option value="0">Select Desk</option>
                        <?php
                        for ($i = $desk_count - 1; $i >= 0; $i--) {
                            $selected = ($desk_data[$i]['desk_id'] == $data[0]['desk_id']) ? 'selected' : '';
                            echo '<option value="' . $desk_data[$i]['desk_id'] . '" ' . $selected . '>' . $desk_data[$i]['desk_name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="item-content-detail">

                    <label>Personnel Image</label>
                    <div class="change-picture" id="new_selected_image">
                        <img id="old_news_image" src="../../back_end/personnel_images/<?php echo $data[0]['personnel_image']; ?>" alt="personnel-image" srcset="">
                        <p style="display: none;" id="originalPhotoURL">../../back_end/personnel_images/<?php echo $data[0]['personnel_image']; ?></p>
                        <img id="new_news_image" src="#" alt="personnel-image" srcset="">
                    </div>
                </div>

                <div class="item-content-detail">

                    <div class="toggle_section">
                        <label for="">Change Personnel Image</label>
                        <div class="toggle_change" onclick="update_file()" id="toggle_change">
                            <div class="toggle_button" onclick="update_file()" id="toggle_button">
                            </div>
                            <input type="hidden" name="update_file" id="update_file" value="0">
                        </div>
                    </div>

                    <div class="replace_section" id="replace_section">

                        <label>Change Personnel Image</label>
                        <input type="file" id="image" name="image" accept="image/*" class="image-input" onclick="updateImage()">
                    </div>
                </div>

                <button>Update Personnel</button>
            </form>
        </div>

    </div>

    <script>
        new_news_image.style.display = "none";

        function updateImage() {
            old_news_image.style.display = "none";
            new_news_image.style.display = "block";
        }

        var old_news_image = document.getElementById("old_news_image");
        var new_selected_image = document.getElementById("new_selected_image");
        var image = document.getElementById("image");
        const imagePreview = document.getElementById('new_news_image');
        const originalPhotoURL = document.getElementById('originalPhotoURL');

        image.addEventListener('change', function() {
            // Check if a file is selected
            if (image.files.length > 0) {
                // Get the selected file
                const file = image.files[0];

                const reader = new FileReader();

                // Set up a function to run when the reader loads the file
                reader.onload = function(e) {
                    // Update the image element's src attribute with the data URL
                    imagePreview.src = e.target.result;
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);

                // Update the paragraph with the directory and file name
                // new_selected_image.innerHTML = `Directory: ${file.webkitRelativePath} File Name: ${file.name}`;
            } else {
                // Clear the paragraph if no file is selected
                // new_selected_image.textContent = '';
                imagePreview.src = '';
            }
        });

        function update_file() {

            var update_file = document.getElementById("update_file");

            var replace_section = document.getElementById("replace_section");
            var toggle_button = document.getElementById("toggle_button");
            var toggle_change = document.getElementById("toggle_change");
            var imageInput = document.getElementById("image");

            if (toggle_change.style.justifyContent === "start") {
                update_file.value = "1";
                toggle_change.style.justifyContent = "end";
                toggle_change.style.background = "#137497";
                replace_section.style.opacity = "1";
                imageInput.required = true;
            } else {
                toggle_change.style.justifyContent = "start";
                toggle_change.style.background = "gray";
                replace_section.style.opacity = "0.4";
                update_file.value = "0";
                imageInput.required = false;
            }
        }
    </script>

</body>

</html>
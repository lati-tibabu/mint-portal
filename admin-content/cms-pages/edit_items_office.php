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
            <i class="fa-solid fa-pencil"></i>Edit Office
        </div>

        <div class="item-content">
            <form action="../../../mint-portal/back_end/office-edit-post.php" method="post" enctype="multipart/form-data">
                <?php
                include("../../back_end/config.php");

                $office_id = $_GET['office_id_no'];

                $query = "SELECT * FROM office WHERE office_id = $office_id;";
                $sector_query = "SELECT * FROM sector;";

                $result = mysqli_query($con, $query);
                $sector_result = mysqli_query($con, $sector_query);

                $office_data = array();
                $sector_data = array();

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $office_data[] = $row;
                    }
                } else {
                    echo "<script>alert('Office couldn't be found');</script>";
                    header('Location: ../../admin-content/cms-pages/offices.php');
                }

                $sector_count = 0;

                if (mysqli_num_rows($sector_result) > 0) {
                    while ($row = mysqli_fetch_assoc($sector_result)) {
                        $sector_data[] = $row;
                        $sector_count += 1;
                    }
                } else {
                    echo "<script>alert('Sectors couldn't be found');</script>";
                    header('Location: ../../admin-content/cms-pages/offices.php');
                }
                ?>

                <input type="hidden" name="office_id" value="<?php echo $office_data[0]['office_id']; ?>" readonly>

                <div class="item-content-detail">
                    <label>Office Name</label>
                    <input name="office-name" class="headline" type="text" placeholder="Office Name" value="<?php echo $office_data[0]['office_name']; ?>" required><br>
                </div>

                <div class="item-content-detail">
                    <label>Office Description</label>
                    <textarea name="office-description" id="office-description" cols="70" rows="6" autocomplete="off" placeholder="Office Description" required><?php echo $office_data[0]['description']; ?></textarea><br>
                </div>

                <div class="item-content-detail">
                    <label>Office Sector</label>
                    <select name="office-sector" id="office-sector">
                        <option value="0">Select Sector</option>
                        <?php
                        for ($i = $sector_count - 1; $i >= 0; $i--) {
                            $selected = ($sector_data[$i]['sector_id'] == $office_data[0]['sector_id']) ? 'selected' : '';
                            echo '<option value="' . $sector_data[$i]['sector_id'] . '" ' . $selected . '>' . $sector_data[$i]['sector_name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <button>Update Office</button>
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
    </script>

</body>

</html>
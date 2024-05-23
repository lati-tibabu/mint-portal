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
            <i class="fa-solid fa-pencil"></i>Edit Desk
        </div>

        <div class="item-content">

            <form action="../../../mint-portal/back_end/desk-edit-post.php" method="post" enctype="multipart/form-data">
                <?php
                include("../../back_end/config.php");

                $desk_id = $_GET['desk_id_no'];

                $query = "SELECT * FROM desk WHERE desk_id = $desk_id;";
                $office_query = "SELECT * FROM office;";

                $result = mysqli_query($con, $query);
                $office_result = mysqli_query($con, $office_query);

                $desk_data = array();
                $office_data = array();

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $desk_data[] = $row;
                    }
                } else {
                    echo "<script>alert('Desk couldn't be found');</script>";
                    header('Location: ../../admin-content/cms-pages/desks.php');
                }

                $office_count = 0;

                if (mysqli_num_rows($office_result) > 0) {
                    while ($row = mysqli_fetch_assoc($office_result)) {
                        $office_data[] = $row;
                        $office_count += 1;
                    }
                } else {
                    echo "<script>alert('Offices couldn't be found');</script>";
                    header('Location: ../../admin-content/cms-pages/desks.php');
                }
                ?>

                <input type="hidden" name="desk_id" value="<?php echo $desk_data[0]['desk_id']; ?>" readonly>

                <div class="item-content-detail">
                    <label>Desk Name</label>
                    <input name="desk-name" class="headline" type="text" placeholder="Desk Name" value="<?php echo $desk_data[0]['desk_name']; ?>" required><br>
                </div>

                <div class="item-content-detail">
                    <label>Desk Description</label>
                    <textarea name="desk-description" id="desk-description" cols="70" rows="6" autocomplete="off" placeholder="Desk Description" required><?php echo $desk_data[0]['desk_description']; ?></textarea><br>
                </div>

                <div class="item-content-detail">
                    <label>Desk Office</label>
                    <select name="desk-office" id="desk-office">
                        <option value="0">Select Office</option>
                        <?php
                        for ($i = $office_count - 1; $i >= 0; $i--) {
                            $selected = ($office_data[$i]['office_id'] == $desk_data[0]['office_id']) ? 'selected' : '';
                            echo '<option value="' . $office_data[$i]['office_id'] . '" ' . $selected . '>' . $office_data[$i]['office_name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <button>Update Desk</button>
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
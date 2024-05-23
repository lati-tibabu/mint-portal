<?php

include("session-checker.php");
include('public-relation-checker.php');

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
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
</head>

<body>

    <?php
    // include("header_2.php");
    ?>

    <div class="container">
        <div class="logoPart" id="logoPart">
            <img class="logo" id="logo" src="../../logo/mint_logo_circle.svg" alt="" srcset="">
            <div id="co_name" style="color: white;">
                Ministry of Innovation and Technology<br>
                የኢኖቬሽን እና ቴክኖሎጂ ሚኒስቴር

            </div>
        </div>
        <div class="item-category">
            <i class="fa-solid fa-pencil"></i>Edit Events
        </div>

        <div class="back_button">
            <a href="event.php"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <div class="item-content">
            <form action="../../../mint-portal/back_end/event-edit-post.php" method="post" enctype="multipart/form-data">
                <!-- <div class="search-news">
                    <form action="" method="get">
                        <input type="number" name="news_id_no" id="">
                        <button>Search</button>
                    </form>
                </div> -->
                <?php
                include("../../back_end/config.php");

                $event_id_no = $_GET['event_id_no'];

                $query = "SELECT * FROM event where event_id = $event_id_no;";

                $result = mysqli_query($con, $query);

                $data = array();

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                } else {
                    echo "<script>alert('event couldn't found');</script>";
                    header('Location: ../../admin-content/cms-pages/event.php');
                }
                ?>

                <input type="hidden" name="event_id" value="<?php echo $data[0]['event_id']; ?>" readonly>
                <div class="item-content-detail">
                    <label for="news_headline">Event Name</label>
                    <input type="text" name="event-name" id="news-headline" value="<?php echo $data[0]['event_name']; ?>">
                </div>
                <div class="item-content-detail">
                    <label for="news-detail">Event Description</label>
                    <!-- <textarea name="news-detail" id="news-detail" cols="30" rows="6"></textarea> -->
                    <textarea name="event-detail" id="news-description" cols="30" rows="10"><?php echo $data[0]['event_description']; ?></textarea>
                </div>

                <div class="item-content-detail">
                    <label>Event Date</label>
                    <input name="event-happen-date" type="date" placeholder="Event Date" required value="<?php echo $data[0]['event_happen_date']; ?>">
                </div>
                <div class="item-content-detail">
                    <label>Event Time</label>
                    <input name="event-happen-time" type="time" placeholder="Event Time" required value="<?php echo $data[0]['event_happen_time']; ?>">
                </div>

                <div class="item-content-detail">
                    <label>Event Location</label>
                    <input name="event-location" type="text" placeholder="Event Location" required value="<?php echo $data[0]['event_location']; ?>">
                </div>

                <div class="item-content-detail">
                    <label>Event Type</label>
                    <?php
                    $event_type = $data[0]['event_is_featured'];
                    ?>
                    <select name="is_featured" required>
                        <option value="">Event Type</option>
                        <option value='1' <?php if ($event_type === '1') {
                                                echo 'selected';
                                            } ?>>Featured</option>
                        <option value='0' <?php if ($event_type === '0') {
                                                echo 'selected';
                                            } ?>>Not Featured</option>
                    </select>
                </div>

                <div class="item-content-detail">
                    <label for="news-image">Old Event Picture</label>
                    <div class="change-picture" id="new_selected_image">
                        <img id="old_news_image" src="../../back_end/images/event/<?php echo $data[0]['event_image']; ?>" alt="event-image " srcset="">
                        <img id="new_news_image" src="#" alt="news-image" srcset="">
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

                        <label for="image">Change Picture</label>
                        <input type="file" id="image" name="image" accept="image/*" class="image-input" onchange="updateImage()">
                    </div>
                </div>

                <button>Update The Event</button>
                <!-- <input type="submit"> -->
                <!-- <input type="submit" name="submit" id="submit" value="Update Article"> -->

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
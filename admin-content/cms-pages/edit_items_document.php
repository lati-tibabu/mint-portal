<?php

include("session-checker.php");
include('document-manager-checker.php');

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
            <i class="fa-solid fa-pencil"></i>Edit Document
        </div>

        <div class="item-content">

            <form action="../../../mint-portal/back_end/document-edit-post.php" method="post" enctype="multipart/form-data">
                <?php
                include("../../back_end/config.php");

                // Assuming you have retrieved the document details from the database
                $document_id = $_GET['document_id_no'];
                $query = "SELECT * FROM documents WHERE document_id = $document_id";
                $result = mysqli_query($con, $query);
                $document = mysqli_fetch_assoc($result);

                if (!$document) {
                    echo "<script>alert('Document not found');</script>";
                    header('Location: ../../admin-content/cms-pages/documents.php');
                }
                ?>

                <input type="hidden" name="document_id" value="<?php echo $document['document_id']; ?>" readonly>

                <div class="item-content-detail">
                    <label>Document Name</label>
                    <input name="document-name" class="headline" type="text" placeholder="Document Name" value="<?php echo $document['document_name']; ?>" required><br>
                </div>

                <div class="item-content-detail">
                    <label>Document Description</label>
                    <textarea name="document-description" id="document-description" cols="70" rows="10" placeholder="Document Description" required><?php echo $document['document_description']; ?></textarea><br>
                </div>

                <div class="item-content-detail">

                    <div class="toggle_section">
                        <label for="">Change Document File</label>
                        <div class="toggle_change" onclick="update_file()" id="toggle_change">
                            <div class="toggle_button" onclick="update_file()" id="toggle_button">
                            </div>
                            <input type="hidden" name="update_file" id="update_file" value="0">
                        </div>
                    </div>

                    <div class="replace_section" id="replace_section">
                        <label>Replace Document File</label>
                        <input type="file" id="new-document" name="document">
                    </div>

                </div>

                <button>Update Document</button>
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

        // var toggle_button = document.getElementById("toggle_button");
        // var toggle_change = document.getElementById("toggle_change");

        function update_file() {

            var update_file = document.getElementById("update_file");

            var replace_section = document.getElementById("replace_section");
            var toggle_button = document.getElementById("toggle_button");
            var toggle_change = document.getElementById("toggle_change");
            var documentInput = document.getElementById("new-document");

            if (toggle_change.style.justifyContent === "start") {
                update_file.value = "1";
                toggle_change.style.justifyContent = "end";
                toggle_change.style.background = "#137497";
                replace_section.style.opacity = "1";
                documentInput.required = true;
            } else {
                toggle_change.style.justifyContent = "start";
                toggle_change.style.background = "gray";
                replace_section.style.opacity = "0.4";
                update_file.value = "0";
                documentInput.required = false;
            }
        }
    </script>

</body>

</html>
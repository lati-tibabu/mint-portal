<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/event_styles.css">
    <link rel="stylesheet" href="style/document_styles.css">
</head>

<body>
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous"></script>
    <!-- <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script> -->
    <?php
    include("header.php")
    ?> 

    <div class="document-research">

        <div class="page_name document-title">
            Documents and Researches
        </div>
        <div class="container document-container">
            <div class="container-title">
                Documents
            </div>


            <div class="document-lists">
                <?php
                include("../mint-portal/back_end/config.php");
                $query = "SELECT * FROM documents;";

                $result = mysqli_query($con, $query);

                $data = array();

                $count = 0;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                        $count = $count + 1;
                    }
                }

                $home_page_news_cutOff = 0;

                if ($count != 0) {

                    for ($i = $count - 1; $i >= 0; $i--) {
                        echo '<div class="document-card">';
                        echo '    <div class="document-icon">';
                        echo '        <i class="fa-solid fa-file-pdf"></i>';
                        echo '    </div>';
                        echo '    <div class="document-name">';
                        echo '        <p>';
                        echo             $data[$i]['document_name'];
                        echo '        </p>';
                        echo '    </div>';
                        echo '    <div class="document-description">';
                        echo             $data[$i]['document_description'];
                        echo '    </div>';
                        echo '    <div class="document-size">';
                        $doc_size = $data[$i]['document_file_size'];
                        if($doc_size >= 1024 and $doc_size < 1048576){
                            $doc_sizeKB = $doc_size/1024;
                            echo (int)$doc_sizeKB.'KB';
                        }
                        else if($doc_size >= 1048576 and $doc_size < 1073741824){
                            $doc_sizeMB = $doc_size/1048576;
                            echo (int)$doc_sizeMB.'MB';
                        }
                        else if($doc_size >= 1073741824){
                            $doc_sizeGB = $doc_size/1073741824;
                            echo (int)$doc_sizeGB.'GB';
                        }

                        else{
                            echo $doc_size.'B';
                        }
                        // echo '        480 KB';
                        echo '    </div>';
                        echo '    <div class="download-button">';
                        echo '        <a href="back_end/document/'.$data[$i]['document_file_name'].'" download="'.$data[$i]['document_name'].'" style="text-decoration: none;">';
                        echo '            <button> <i class="fa-solid fa-download"></i> Download</button>';
                        echo '        </a>';
                        echo '    </div>';
                        echo '</div>';
                        // $home_page_news_cutOff++;

                        // if ($current_file == "C:\wamp64\www\mint-portal\\home.php" && $home_page_news_cutOff == 6) {
                        //     break;
                        // }
                    }
                } else {
                    echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Documents</h1><br><hr>";
                }

                // echo $current_file;
                
                ?>
            </div>


        </div>


    </div>


    <!-- <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script> -->
    <?php
    include("footer.php");
    ?>


    <script src="js/behavior.js"></script>
    <script src="js/event_behavior.js"></script>
</body>

</html>
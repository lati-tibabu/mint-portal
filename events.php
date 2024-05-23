<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/event_styles.css">
</head>

<body>
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
    <!-- <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script> -->
    <?php
    include("header.php");
    ?>

    <?php
    $current_file = __FILE__;
    include("event_content.php");
    ?>

    
    <!-- <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script> -->
    
    <?php
    include("footer.php");
    ?>
    
    
    <script src="js/behavior.js"></script>
    <script src="js/event_behavior.js"></script>
</body>

</html>
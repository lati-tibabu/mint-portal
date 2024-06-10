<?php
include("session-checker.php");
?>
<!-- <link rel="stylesheet" href="../../style/header_styles copy.css"> -->
<link rel="stylesheet" href="../styles/header_style copy.css">

<header id="main-header">
    <div class="logo-section" id="logo-section">
        <img class="brand-logo" id="brand-logo" src="../../logo/mint_logo_circle.svg" alt="" srcset="">
        <div id="company-name">
            የኢኖቬሽን እና ቴክኖሎጂ ሚኒስቴር
        </div>

        <div style="font-size: 0.5rem, font-family: 'sans-serif';">
            Content management page
        </div>

    </div>

    <nav id="navigation">
        <ul id="nav-items">
            <?php
            echo '<li><a class="nav-item-link" id="homepage" href="home.php" onclick="highlightLink(\'homepage\'), handleClick(\'homepage\')">Home</a></li>';

            if ($_SESSION['role'] == 'human resource') {
                echo '<div class="hr-section">';
                echo '<li><a class="nav-item-link" id="hr-sectors" href="sectors.php" onclick="highlightLink(\'hr-sectors\'), handleClick(\'hr-sectors\')">Sectors</a></li>';
                echo '<li><a class="nav-item-link" id="hr-offices" href="offices.php" onclick="highlightLink(\'hr-offices\'), handleClick(\'hr-offices\')">Offices</a></li>';
                echo '<li><a class="nav-item-link" id="hr-desks" href="desks.php" onclick="highlightLink(\'hr-desks\'), handleClick(\'hr-desks\')">Desks</a></li>';
                echo '<li><a class="nav-item-link" id="hr-personnel" href="personnel.php" onclick="highlightLink(\'hr-personnel\'), handleClick(\'hr-personnel\')">Personnel</a></li>';
                echo '</div>';
                echo '<li><a class="nav-item-link" id="hr-vacancy" href="vacancy.php" onclick="highlightLink(\'hr-vacancy\'), handleClick(\'hr-vacancy\')">Vacancy</a></li>';
            }
            if ($_SESSION['role'] == 'public relation') {
                echo '<li><a class="nav-item-link" id="pr-news" href="news.php" onclick="highlightLink(\'pr-news\'), handleClick(\'pr-news\')">News</a></li>';
                echo '<li><a class="nav-item-link" id="pr-events" href="event.php" onclick="highlightLink(\'pr-events\'), handleClick(\'pr-events\')">Event</a></li>';
                echo '<li><a class="nav-item-link" id="pr-announcements" href="announcements.php" onclick="highlightLink(\'pr-announcements\'), handleClick(\'pr-announcements\')">Announcements</a></li>';
                echo '<li><a class="nav-item-link" id="pr-history" href="history.php" onclick="highlightLink(\'pr-history\'), handleClick(\'pr-history\')">History</a></li>';
                echo '<li><a class="nav-item-link" id="pr-hero" href="hero_content.php" onclick="highlightLink(\'pr-hero\'), handleClick(\'pr-hero\')">Hero</a></li>';
            }
            if ($_SESSION['role'] == 'document manager') {
                echo '<li><a class="nav-item-link" id="doc-documents" href="documents.php" onclick="highlightLink(\'doc-documents\'), handleClick(\'doc-documents\')">Documents</a></li>';
                echo '<li><a class="nav-item-link" id="doc-research" href="research.php" onclick="highlightLink(\'doc-research\'), handleClick(\'doc-research\')">Research</a></li>';
            }
            ?>
        </ul>
    </nav>
    <!-- Menu Button -->
    <div class="menu-button" id="menu-button" onclick="toggleMenu()">
        <div class="bar" id="bar1"></div>
        <div class="bar" id="bar2"></div>
        <div class="bar" id="bar3"></div>
    </div>
</header>

<script src="../../js/behavior.js"></script>
<script>
    let menuClicked = 0;

    function toggleMenu() {
        const bar1 = document.getElementById("bar1");
        const bar2 = document.getElementById("bar2");
        const bar3 = document.getElementById("bar3");
        const navItems = document.getElementById("nav-items");
        const menuButtonContainer = document.getElementById("menu-button");

        if (menuClicked === 0) {
            bar2.style.transform = "translateX(100px)";
            bar2.style.opacity = "0";
            bar1.style.transform = "rotate(45deg)";
            bar3.style.transform = "rotate(-45deg)";
            navItems.style.display = "flex";
            menuButtonContainer.style.transform = "translateX(-200px)";
            menuClicked = 1;
        } else {
            bar2.style.transform = "translateX(0)";
            bar2.style.opacity = "1";
            bar1.style.transform = "rotate(0)";
            bar3.style.transform = "rotate(0)";
            navItems.style.display = "none";
            menuButtonContainer.style.transform = "translateX(0)";
            menuClicked = 0;
        }
    }
</script>

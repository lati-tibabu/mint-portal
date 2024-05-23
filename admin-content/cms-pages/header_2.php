<?php
include("session-checker.php");
?>
<link rel="stylesheet" href="../../style/header_styles.css">
<header id="nav-header">
    <div class="logoPart" id="logoPart">
        <img class="logo" id="logo" src="../../logo/mint_logo_circle.svg" alt="" srcset="">
        <div id="co_name">
            <!-- Ministry of Innovation and Technology<br> -->
            የኢኖቬሽን እና ቴክኖሎጂ ሚኒስቴር

        </div>
    </div>


    <nav id="nav_lists">
        <ul id="nav-links-list">
            <?php
            echo '<li><a class="nav-links" id="home" href="home.php" onclick="updateActiveLink(\'home\'), clicked(\'home\')">Home</a></li>';

            if ($_SESSION['role'] == 'human resource') {
                echo '<div class="sector-section">';
                echo '<li><a class="nav-links" id="sectors" href="sectors.php" onclick="updateActiveLink(\'sectors\'), clicked(\'sectors\')">Sectors</a></li>';
                echo '<li><a class="nav-links" id="offices" href="offices.php" onclick="updateActiveLink(\'offices\'), clicked(\'offices\')">Offices</a></li>';
                echo '<li><a class="nav-links" id="desks" href="desks.php" onclick="updateActiveLink(\'desks\'), clicked(\'desks\')">Desks</a></li>';
                echo '<li><a class="nav-links" id="personnel" href="personnel.php" onclick="updateActiveLink(\'personnel\'), clicked(\'personnel\')">Personnel</a></li>';
                echo '</div>';
                echo '<li><a class="nav-links" id="vacancy" href="vacancy.php" onclick="updateActiveLink(\'vacancy\'), clicked(\'vacancy\')">Vacancy</a></li>';
            }
            if ($_SESSION['role'] == 'public relation') {
                echo '<li><a class="nav-links" id="news" href="news.php" onclick="updateActiveLink(\'news\'), clicked(\'news\')">News</a></li>';
                echo '<li><a class="nav-links" id="events" href="event.php" onclick="updateActiveLink(\'events\'), clicked(\'events\')">Event</a></li>';
                echo '<li><a class="nav-links" id="announcement" href="announcements.php" onclick="updateActiveLink(\'announcements\'), clicked(\'announcements\')">Announcements</a></li>';
                echo '<li><a class="nav-links" id="history" href="history.php" onclick="updateActiveLink(\'history\'), clicked(\'history\')">History</a></li>';
                echo '<li><a class="nav-links" id="hero" href="hero_content.php" onclick="updateActiveLink(\'hero\'), clicked(\'hero\')">Hero</a></li>';
            }
            if ($_SESSION['role'] == 'document manager') {
                echo '<li><a class="nav-links" id="documents" href="documents.php" onclick="updateActiveLink(\'documents\'), clicked(\'documents\')">Documents</a></li>';
                echo '<li><a class="nav-links" id="research" href="research.php" onclick="updateActiveLink(\'research\'), clicked(\'research\')">Research</a></li>';
            }
            ?>
        </ul>
    </nav>
    <!-- Menu Bar -->
    <div class="menu-bar" id="menu-bar" onclick="menu_anima()">
        <div class="line" id="line1"></div>
        <div class="line" id="line2"></div>
        <div class="line" id="line3"></div>
    </div>

</header>

<script src="../../js/behavior.js"></script>
<script>
    let menu_bar_clicked = 0;

    function toggleMenu() {
        const line1 = document.getElementById("line1");
        const line2 = document.getElementById("line2");
        const line3 = document.getElementById("line3");
        const nav_list = document.getElementById("nav-links");
        const menu_bar_container = document.getElementById("menu-bar");

        if (menu_bar_clicked === 0) {
            line2.style.transform = "translateX(100px)";
            line2.style.opacity = "0";
            line1.style.transform = "rotate(45deg)";
            line3.style.transform = "rotate(-45deg)";
            nav_list.style.display = "flex";
            menu_bar_container.style.transform = "translateX(-200px)";
            menu_bar_clicked = 1;
        } else {
            line2.style.transform = "translateX(0)";
            line2.style.opacity = "1";
            line1.style.transform = "rotate(0)";
            line3.style.transform = "rotate(0)";
            nav_list.style.display = "none";
            menu_bar_container.style.transform = "translateX(0)";
            menu_bar_clicked = 0;
        }
    }
</script>
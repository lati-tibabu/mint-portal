<link rel="stylesheet" href="style/header_styles.css">

<?php
include("../mint-portal/back_end/config.php");
$query = "SELECT * FROM sector;";
// $query2 = "SELECT * FROM office;";

$result = mysqli_query($con, $query);
// $result2 = mysqli_query($con, $query2);

$sector_data = array();
// $office_data = array();

$count = 0;
// $count2 = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sector_data[] = $row;
        $count = $count + 1;
    }
}

?>
<header>
    <div class="logoPart" id="logoPart">
        <img class="logo" id="logo" src="logo/mint_logo_circle.svg" alt="" srcset="" href="home.php">
        <div id="co_name">
            <!-- Ministry of Innovation and Technology<br> -->
            የኢኖቬሽን እና ቴክኖሎጂ ሚኒስቴር<br>
            <!-- Ministry of Innovation and Technology -->
        </div>
    </div>

    <nav id="nav_lists">
        <ul id="nav-links">
            <li id="home" onclick="clicked('home')"><a class="nav-links" href="home.php">Home</a></li>
            <li id="sectors" onclick="sector_dropdown()" onclick="clicked('sectors')"><a class="nav-links">Sectors</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </li>

            <div class="sectors-dropdown" id="sectors-dropdown">
                <ul>
                    <?php
                    for ($i = $count - 1; $i >= 0; $i--) {
                        echo '<li onclick="view_sector(' . $sector_data[$i]['sector_id'] . ')">' . $sector_data[$i]['sector_name'] . '</li>';
                    }
                    ?>
                </ul>
            </div>
            
            <li id="vacancy" onclick="clicked('vacancy')"><a class="nav-links" href="vacancy.php">Vacancy</a></li>
            <li id="news" onclick="clicked('news')"><a class="nav-links" href="news.php">News</a></li>
            <li id="events" onclick="clicked('events')"><a class="nav-links" href="events.php">Events</a></li>
            <li id="announcements" onclick="clicked('announcements')"><a class="nav-links" href="announcement.php">Announcement</a></li>
            <!-- <li><a class="nav-links" href="index.html">Research/Document</a></li> -->
            <!-- <li><a class="nav-links" href="documents.php">Research/Document</a></li> -->

            <li onclick="show_more_resource()" id="resource" onclick="clicked('resource')">
                <p class="nav-links">Resources</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </li>

            <div class="dropdown-list res-list" id="resource-list">
                <div class="department">
                    <a href="research.php">Research</a>
                </div>
                <div class="department">
                    <a href="documents.php">Documents</a>
                </div>
            </div>

           <!-- <li id="online-app" onclick="clicked('online-app')"><a class="nav-links" href="online-application.php">Online Application</a></li>
            <li id="e-service" onclick="clicked('e-service')"><a class="nav-links" href="e-services.php">E-Services</a></li> -->

        </ul>
    </nav>
    <div class="menu-bar" id="menu-bar" onclick="menu_anima()">
        <div class="line" id="line1"></div>
        <div class="line" id="line2"></div>
        <div class="line" id="line3"></div>
    </div>
</header>

<script>
    function view_sector(params) {
        window.location.href = 'sectors.php?sector_id=' + params;
    }

    let sectors_visible = false;

    function sector_dropdown() {
        const sectors_dropdown = document.getElementById('sectors-dropdown');
        if (sectors_visible === false) {
            sectors_dropdown.style.display = "block";
            sectors_visible = true;
        } else {
            sectors_dropdown.style.display = "none";
            sectors_visible = false;
        }
    }
</script>
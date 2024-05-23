<?php
include("session-checker.php");
include('human-resource-checker.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/content-manage-style.css">
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
</head>

<body>

    <!-- <div id="adminHeader"></div>
    <script src="../js/adminHeader.js"></script> -->


    <div class="submission-section">
        <div class="page-name">
            Vacancy Application Submissions
        </div>

        <div class="back-button">
            <a href="vacancy.php">
                <button>
                    <i class="fa-solid fa-arrow-left"></i>
                    Back to Application List
                </button>
            </a>
        </div>


        <?php
        include("../../back_end/config.php");

        $job_id = $_GET['job_id'];

        $query = "SELECT * FROM vacancy_applications where job_id = $job_id;";
        $query2 = "SELECT job_title FROM vacancy where job_id = $job_id;";

        $result = mysqli_query($con, $query);
        $result2 = mysqli_query($con, $query2);

        $data = array();
        $data2 = array();

        $count = 0;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
                $count = $count + 1;
            }
        }

        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $data2[] = $row;
                // $count = $count + 1;
            }
        }

        ?>

        <div class="application-info">
            <div>
                <div class="job-title"><span>Job Title:</span> <?php echo $data2[0]['job_title'] ?></div>
                <div class="application-count"><span>Total Application:</span> <?php echo $count ?></div>
            </div>
        </div>


        <div class="application-lists">
            <table id="application-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Vacancy ID</th>
                        <th>Full Name</th>
                        <th>Sex</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- <th>1</th>
                        <th>19</th>
                        <th>Lati Tibabu Gamachu</th>
                        <th>Male</th>
                        <th>0979586697</th>
                        <th>latitibabu@gmail.com</th>
                        <th>
                            <a href="application-detail.html">
                                <button>
                                    View Application
                                </button>
                            </a>
                        </th> -->
                        <?php
                        if ($count != 0) {

                            for ($i = 0; $i < $count; $i++) {

                                echo '<tr>';
                                echo '<th>' . $i + 1 . '</th>';
                                echo '<th>' . $data[$i]['application_id'] . '</th>';
                                echo '<th>' . $data[$i]['first_name'] . ' ' . $data[$i]['middle_name'] . ' ' . $data[$i]['last_name'] . '</th>';
                                echo '<th>' . $data[$i]['gender'] . '</th>';
                                echo '<th>' . $data[$i]['phone'] . '</th>';
                                echo '<th>' . $data[$i]['email'] . '</th>';
                                echo '<th>';
                                // echo '<a href="application-detail.html">';
                                echo '<button onclick="application_detail(' . $data[$i]['application_id'] . ')">';
                                echo 'View Application';
                                echo '</button>';
                                echo '<button id="delete_application" onclick="delete_application(' . $data[$i]['application_id'] . ')">';
                                echo 'Delete';
                                echo '</button>';
                                // echo '</a>';
                                echo '</th>';
                                echo '</tr>';
                            }
                        } else {
                            echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Vacancy Application!</h1><br>
                            <hr>";
                        }

                        // echo $data[0]['application_id'];
                        ?>

                    </tr>
                </tbody>
            </table>
            <div class="export_application">
                <button onclick="exportTableToCSV()">Export to CSV</button>
            </div>
        </div>
    </div>

    <script>
        function application_detail(param) {
            window.location.href = 'application-detail.php?application_id=' + param;
        }

        function delete_application(param) {
            // window.location.href = 'application-detail.php?application_id=' + param;
            if (confirm("Are you sure you want to delete this application?")) {
                window.location.href = '../../back_end/delete_application.php?application_id=' + param;
            }
        }

        function exportTableToCSV() {
            var table = document.getElementById("application-table");
            var rows = table.querySelectorAll("tr");
            var csv = [];

            for (var i = 0; i < rows.length; i++) {
                var row = [];
                var cols = rows[i].querySelectorAll("td, th");

                for (var j = 0; j < cols.length; j++) {
                    row.push(cols[j].textContent.trim());
                }

                csv.push(row.join(","));
            }

            // Combine the rows into a single CSV string
            var csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");

            // Create a data URI and a link element for download
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "table_data.csv");
            document.body.appendChild(link);

            // Trigger the download
            link.click();
        }
    </script>
</body>

</html>
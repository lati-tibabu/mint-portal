<?php
include("config.php");

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $headline = htmlspecialchars($_POST["headline"]);
//     $detail = htmlspecialchars($_POST["news_detail"]);
//     $category = htmlspecialchars($_POST["category"]);

//     $query = "INSERT INTO news (news_headline, news_detail, news_category) VALUES ($headline, $detail, $category)";
    
//     $stmt = mysqli_query($con, $query);

    // mysqli_stmt_bind_param($stmt, "sss", $headline, $detail, $category);
    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_close($stmt);

    // if ($stmt) {
    //     mysqli_stmt_bind_param($stmt, "sss", $headline, $detail, $category);
        
    //     if (mysqli_stmt_execute($stmt)) {
    //         $json = array("response" => 'success', "status" => 0, "message" => 'uploaded successfully'); 
    //     } else {
    //         $json = array("response" => 'failed', "status" => 1, "message" => 'error in uploading item'); 
    //     }
        
    //     mysqli_stmt_close($stmt);
    // } else {
    //     $json = array("response" => 'failed', "status" => 1, "message" => 'error in preparing statement');
    // }
    
    // header('Content-type: application/json');
    // echo json_encode($json);

//     if($stmt){
//         $json = array("response"=>'success', "status"=>0, "message"=>'uploaded succesfully'); 
//     }else{
//         $json = array("response"=>'failed', "status"=>1, "message"=>'error in uploading item'); 
//     }
    
//     header('Content-type : application/json');
//     echo json_encode($json);
// } else {
//     echo "Error";
// }

// if(isset($_POST['submit']))
// {
//     $headline = $_POST["headline"];
//     $detail = $_POST["news_detail"];
//     $category = $_POST["category"];
// }

//     $query = "INSERT INTO news (news_headline, news_detail, news_category, news_view_count, news_like_count) VALUES ($headline, $detail, $category, 0, 0)";

//     $rs = mysqli_query($con, $query);

//     if($rs)
//     {
//         echo "Entries added!";
//     }

if(isset($_POST['submit']))
{
    $headline = $_POST["headline"];
    $detail = $_POST["news_detail"];
    $category = $_POST["category"];
    $news_view_count = 0;
    $news_like_count = 0;


    // Sanitize and escape input values
    // $headline = mysqli_real_escape_string($con, $headline);
    // $detail = mysqli_real_escape_string($con, $detail);
    // $category = mysqli_real_escape_string($con, $category);

    // Create the SQL query using prepared statement

    $query = "INSERT INTO news (news_headline, news_detail, news_category, news_view_count, news_like_count, news_date) VALUES (?, ?, ?, ?, ?, NOW())";
    
    // Prepare and execute the statement
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssii", $headline, $detail, $category, $news_view_count, $news_like_count);
    $result = mysqli_stmt_execute($stmt);

    if($result)
    {
        echo "<script>alert(`Entry added!`)</script>";
    }
    else
    {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    header("Location: ../admin-content/index.html");
    exit();
}

?>


<?php
$con = mysqli_connect("localhost", "root2", "password", "mint_portal");

if(!$con){
    echo(mysqli_error($con));
}
// else{
//     echo "connected!";
// }
?>

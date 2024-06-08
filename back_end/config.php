<?php
$con = mysqli_connect("localhost", "lati", "password", "mint_portal");

if(!$con){
    echo(mysqli_error($con));
}
// else{
//     echo "connected!";
// }
?>

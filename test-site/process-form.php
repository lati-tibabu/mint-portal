<?php
// echo "hello";
// echo pathinfo($_FILES['image']['name'])['extension'];
$imageDirectory = __DIR__.'\images\\'; // Adjust the path as needed
$imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];

// echo $imageFileName;

$destination = $imageDirectory . $imageFileName;

echo $destination;
if ( ! move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

    exit("Can't move uploaded file");

}
// $targetImagePath = $imageDirectory . $imageFileName;
?>

<?php
// session_start();
if($_SESSION['role'] != 'human resource'){
    echo '<script> Login as HR first</script)';
    header('Location: home.php'); 
    exit;
}
// echo $_SESSION['role'];
?>
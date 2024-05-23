<?php
// session_start();
if($_SESSION['role'] != 'document manager'){
    echo '<script> Login as HR first</script)';
    header('Location: home.php'); 
    exit;
}
// echo $_SESSION['role'];
?>
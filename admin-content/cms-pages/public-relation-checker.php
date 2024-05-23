<?php
// session_start();
if($_SESSION['role'] != 'public relation'){
    echo '<script> Login as PR first</script)';
    header('Location: home.php'); 
    exit;
}
// echo $_SESSION['role'];
?>
<?php

session_start();
session_unset();
session_destroy();

header('Location: ../user-management/index.php');
exit;

?>
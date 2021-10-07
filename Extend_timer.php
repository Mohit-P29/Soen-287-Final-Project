<?php
 session_start();
 unset($_SESSION['timer']);
 header("Location: Timer2.php");
 exit();
?>
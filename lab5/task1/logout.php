<?php

session_start();
if (isset($_SESSION['userid'])) {
    session_destroy();
}
header("location: index.php");
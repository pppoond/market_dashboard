<?php
session_start();

if ($_SESSION["admin_id"] == null) {
    header("location: ./view_login.php");
    exit(0);
}

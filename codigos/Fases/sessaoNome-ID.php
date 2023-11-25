<?php
if (isset($_SESSION['name']) && isset($_SESSION['user_id'])) {
    $name = $_SESSION['name'];
    $userId = $_SESSION['user_id'];
}
?>
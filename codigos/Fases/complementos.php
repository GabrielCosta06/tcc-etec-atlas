<?php
if (isset($_SESSION['name']) && isset($_SESSION['user_id']) && isset($_SESSION['progress'])) {
    $name = $_SESSION['name'];
    $userId = $_SESSION['user_id'];
    $progress = $_SESSION['progress'];
}

function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

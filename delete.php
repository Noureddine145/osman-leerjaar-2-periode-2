<?php
include 'db.php';

try {
    $db = new Database();

    if (isset($_GET['id'])) {
        $db->deleteUser($_GET['id']);
        header("Location:home.php?success");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
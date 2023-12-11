<?php
include 'db.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $db->editUser($_POST['email'], $_POST['password'], $_GET['id']);
        header("Location:home.php?Success");
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
       <input type="text" name="email">
       <input type="password" name="password">
       <input type="submit">
    </form>
</body>
</html>
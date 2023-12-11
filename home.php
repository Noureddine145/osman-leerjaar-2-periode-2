<?php
include ("db.php");
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

try {
    $db->insertUser($email, $password);
    echo "Succes";
} catch (PDOException $e) {
    echo "Error inserting' . ".$e->getMessage();
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
    <table>
        <tr>
            <th>id</th>
            <th>Email</th>
            <th>Password</th>
            <th colspan="2">Action</th>
        </tr>

        <tr>
            <?php $users = $db->selec();
            foreach ($users as $user) { ?>
                <tr>
            <td><?php echo $user["id"]?></td>
            <td><?php echo $user["email"]?></td>
            <td><?php echo $user['password']?></td>
            <td> <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $user['id']; ?>" class="dtn dtn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
        </tr>
            <?php
            }
            ?>
        </tr> 
    </table>


</body>
</html>
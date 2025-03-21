<!-- views/user_list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
    <h1>List of Users</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?php 
                    echo "ID: {$user->id} ";
                    echo "Name: {$user->name}";                    
                ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

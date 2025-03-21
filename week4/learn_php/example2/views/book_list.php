<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
</head>
<body>
    <h1>List of Books</h1>
    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <?php 
                    echo "{$book->getTitle()} - {$book->getAuthor()} - {$book->getPrice()}";
                ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
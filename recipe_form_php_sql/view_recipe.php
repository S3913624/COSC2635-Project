<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <title>Recipe Book</title>
</head>

<body>
    <?php
    $id = $_GET['id'];
    include('./connection.php');
    $sql = 'SELECT * FROM recipes WHERE id=' . $id;
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $description = $row['description'];
        $category = $row['category'];
        $time = $row['time'];
        $diff = $row['diff'];
        $ingredients = unserialize($row['ingredients']);
        $instructions = unserialize($row['instructions']);
        $image = $row['image'];
        echo '
            <header>
                <h1 class="center">' . $name . '</h1>
                <a href="index.php" class="center">Back</a>
            </header>
            <section class="recipe-container">
                <div class="recipes">
                    <a href="images/' . $image . '">
                        <div style="background-image: url(images/' . $image . ');"></div>
                        <h3>' . $name . '</h3>
                        <p>' . $category . '</p>
                        <p>' . $time . '</p>
                        <p>' . $diff . '</p>
                        <p>' . $description . '</p>
                        ';
        if ($ingredients !== false) {
            echo '<h3>Ingredients</h3><ul>';
            foreach ($ingredients as $ingredient) {
                if (!empty($ingredient['name'])) {
                    echo '<li>' . $ingredient['name'] . ' ' . $ingredient['amount'] . ' ' . $ingredient['unit'] . '</li> <br>';
                }
            }
            echo '</ul>';
        }
        if ($instructions !== false) {
            echo '<h3>Instructions</h3><ol>';
            foreach ($instructions as $instruction) {
                if (!empty($instruction['step'])) {
                    echo '<li>' . $instruction['step'] . '</li> <br>';
                }
            }
            echo '</ol>';
        }
        echo '
                        
                    </a>
                </div>
            </section>';
    }
    ?>


    <aside></aside>
    <footer></footer>
</body>

</html>
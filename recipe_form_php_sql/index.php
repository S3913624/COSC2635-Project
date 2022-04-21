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
    <header>
        <h1>Cook's Collection</h1>
    </header>
    <section class="recipe-container">
        <a href="add_recipe.php" class="center">Add Recipe</a>
        <div class="recipes">
            <?php
          include ('./connection.php');
          $sql="Select * from `recipes`";
          $result=mysqli_query($con,$sql);
          while ($row = mysqli_fetch_array($result)){
            $name = $row['name'];
            $description = $row['description'];
            $image = $row['image'];

            echo '<a href="images/'.$image.'">
            <div style="background-image: url(images/'.$image.');"></div>
            <h3>'.$name.'</h3>
            <p>'.$description.'</p>
            </a>';
          }
        ?>
        </div>
    </section>
    <aside></aside>
    <footer></footer>
</body>

</html>
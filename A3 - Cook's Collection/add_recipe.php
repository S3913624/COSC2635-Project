<?php
include('./connection.php');

if (isset($_POST["submit"])) {
    $category = $_POST["category"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $time = $_POST["time"];
    $diff = $_POST["diff"];

    if (empty($_POST["ingredients"])) {
        $ingredients = NULL;
    } else {
        $ingredients = serialize($_POST["ingredients"]);
    }

    if (empty($_POST["instructions"])) {
        $instructions = NULL;
    } else {
        $instructions = serialize($_POST["instructions"]);
    }

    if ($_FILES["image"]["error"] == 4) {
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validExtension)) {
            echo
            "
      <script>
        alert('Image must be jpg, jpeg or png');
      </script>
      ";
        } else if ($fileSize > 10000000000) {
            echo
            "
      <script>
        alert('Image is too large');
      </script>
      ";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'images/recipe_images/' . $newImageName);
            $sql = "INSERT INTO `recipes` (category, name, description, time, diff, ingredients, instructions, image) VALUES('$category', '$name', '$description', '$time', '$diff', '$ingredients', '$instructions', '$newImageName')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                header("location: index.php");
            } else {
                die(mysqli_error($con));
            }
        }
    }
}
?>

<!DOCTYPE html>

<html>

<head>
    <title>Cooks Collection | Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="main-header">
        <h1 class="team-name team-name-large">Cooks Collection</h1>
    </header>

    <!-- Sidebar -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Recipes</a>
        <a href="add_recipe.php">Add Recipe</a>
    </div>

    <!-- Content -->
    <div id="main">
        <!-- Burger button for sidebar -->
        <span class="sticky" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <h2 class="section-header">Add a Recipe</h2>
        <section class="content-section">


            <button class="center" type="button" onclick="javascript:history.back()">Back</button>
            <br>
            <form id="recipe-form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <fieldset>
                    <div>
                        <label for="category">Choose a category:</label>
                        <select id="category" name="category" required>
                            <option value="Breakfast">Breakfast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                            <option value="Dessert">Dessert</option>
                        </select>
                    </div>
                    <br />
                    <div class="field-txt">
                        <label for="name">Recipe Name: </label>
                        <input type="text" id="name" name="name" placeholder="Enter recipe name" required />
                    </div>

                    <div class="field-msg">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" placeholder="Enter description" required></textarea>
                    </div>

                    <div class="field-num">
                        <label for="time">Cooking Time (mins): </label>
                        <input type="number" id="time" name="time" placeholder="Enter cooking time" required />
                    </div>
                    <div class="field-slide">
                        <label for="diff">Difficulty</label>
                        <input type="range" id="diff" name="diff" min="0" max="10" step="1" />
                    </div>
                    <div>
                        <label for="image">Add an Image:</label>
                        <input type="file" id="image" name="image" accept="image/jpg, image/png, image/jpeg" required />
                    </div>
                    <div id="empty-image"></div>
                </fieldset>

                <fieldset>
                    <legend>Ingredients</legend>
                    <div id="ingredients"></div>
                    <button type="button" id="add-ingredient">
                        Add ingredient
                    </button>
                </fieldset>

                <fieldset>
                    <legend>Instructions</legend>
                    <div id="steps"></div>
                    <button type="button" id="add-step">
                        Add step
                    </button>
                </fieldset>

                <br>
                <button class="center" id="submit-btn" type="submit" name="submit">Create Recipe</button>
            </form>


        </section>
    </div>

    <!-- clear space to stop footer covering page content -->
    <div class="clear"></div>

    <!-- Footer fixed to bottom of window -->
    <footer class="main-footer">
        <div class="container main-footer-container">
            <h3 class="team-name">Arch-IT-ects</h3>
            <ul class="nav footer-nav">
                <li><a href="https://github.com/S3913624/COSC2635-Project" target="blank"><img src="Images/Github_Logo.png"></a></li>
                <li><a href="https://trello.com/b/GCaH8adM/oua-sp1-2022-the-arch-it-ects" target="blank"><img src="Images/Trello_Logo.png"></a></li>
                <li><a href="https://teams.microsoft.com/l/team/19%3avBpYPZcjTf3SApKH2JYja066DpDA_lI-27kDuzStrEI1%40thread.tacv2/conversations?groupId=a51a27be-9bbc-4199-a5fe-942d6e4c7973&tenantId=d1323671-cdbe-4417-b4d4-bdb24b51316b" target="blank"><img src="Images/MSTeams_Logo.png"></a></li>
            </ul>
        </div>
    </footer>
    <script src="recipe_form.js"></script>
    <script src="main.js"></script>
</body>

</html>
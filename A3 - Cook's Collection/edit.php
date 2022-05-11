<?php
include('./connection.php');
$id = $_GET['id'];

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
}

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
    if (empty($_FILES["image"]["name"])) {
        $newImageName = $image;
        $sql = "UPDATE `recipes` SET category='$category', name='$name', description='$description', time='$time', diff='$diff', ingredients='$ingredients', instructions='$instructions', category='$category', image='$newImageName'  WHERE id=" . $id;
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("location: index.php");
        } else {
            die(mysqli_error($con));
        }
    } else {
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
                $sql = "UPDATE `recipes` SET category='$category', name='$name', description='$description', time='$time', diff='$diff', ingredients='$ingredients', instructions='$instructions', category='$category', image='$newImageName'  WHERE id=" . $id;
                $result = mysqli_query($con, $sql);
                if ($result) {
                    header("location: index.php");
                } else {
                    die(mysqli_error($con));
                }
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
        <h2 class="section-header">Edit Recipe</h2>
        <section class="content-section">

            <section>
                <button class="center" type="button" onclick="javascript:history.back()">Back</button>
                <br>
                <form id="recipe-form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <fieldset>
                        
                        <div>
                    <label>Enter a Category:
                        <input list="category" name="category" required value="<?php echo $category ?>"/>
                    </label>
                    <datalist id="category">
                    <?php
                include('./connection.php');
                $sql = 'SELECT DISTINCT category FROM recipes';
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $categoryOpt = $row['category'];
                    echo '
                    <option>' . $categoryOpt . '</option>
                    ';
                }
                ?> 
                    </datalist>
                    </div>

                        <br />
                        <div class="field-txt">
                            <label for="name">Recipe Name: </label>
                            <input type="text" id="name" name="name" placeholder="Enter recipe name" value="<?php echo $name ?>" required />
                        </div>

                        <div class="field-msg">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" placeholder="Enter description" required><?php echo $description ?></textarea>
                        </div>

                        <div class="field-num">
                            <label for="time">Cooking Time (mins): </label>
                            <input type="number" id="time" name="time" placeholder="Enter cooking time" value="<?php echo $time ?>" required />
                        </div>
                        <div class="field-slide">
                            <label for="diff">Difficulty</label>
                            <input type="range" id="diff" name="diff" min="0" max="10" step="1" value="<?php echo $diff ?>" />
                        </div>
                        <div>
                            <label for="image">Add an Image:</label>
                            <input type="file" id="image" name="image" accept="image/jpg, image/png, image/jpeg" />
                        </div>

                        <?php
                        echo '<div id="display-image" style="background-image: url(images/recipe_images/' . $image . ');"></div>';
                        ?>

                    </fieldset>

                    <fieldset>
                        <legend>Ingredients</legend>
                        <div id="ingredients">

                            <?php
                            if ($ingredients !== false) {
                                $ingredientCounter = 1;
                                foreach ($ingredients as $ingredient) {
                                    if (!empty($ingredient['name'])) {
                                        echo '
                                       <div>
                                        <h3>Ingredient ' . $ingredientCounter . ' </h3>
                                        <div class="field-txt">
                                            <label for="ing-name-' . $ingredientCounter . '">Name:</label>
                                            <input type="text" id="ing-name-' . $ingredientCounter . '" name="ingredients[' . $ingredientCounter . '][name]" value=' . $ingredient['name'] . ' required>
                                        </div>
                                        <div class="field-num">
                                            <label for="amount' . $ingredientCounter . '">Amount:</label>
                                            <input type="number" step="any" id="amount-' . $ingredientCounter . '" name="ingredients[' . $ingredientCounter . '][amount]" value=' . $ingredient['amount'] . ' required>
                                        </div>
                                        <div>
                                        <label for="unit-' . $ingredientCounter . '">Unit:</label>
                                        <select id="unit-' . $ingredientCounter . '" name="ingredients[' . $ingredientCounter . '][unit]"  required>
                                            <option selected style="display: none;">' . $ingredients[$ingredientCounter]['unit'] . '</option>
                                            <option value="g">g</option>
                                            <option value="kg">kg</option>
                                            <option value="mg">mg</option>
                                            <option value="cup(s)">cup(s)</option>
                                            <option value="tsp.">tsp.</option>
                                            <option value="tbsp.">tbsp.</option>
                                            <option value="pinch(es)">pinch(es)</option>
                                            <option value="mL">mL</option>
                                            <option value="L">L</option>
                                            <option value="dL">dL</option>
                                            <option value="oz">oz</option>
                                            <option value="fl oz">fl oz</option>
                                            <option value="fl pt">fl pt</option>
                                            <option value="fl qt">fl qt</option>
                                            <option value="gal">gal</option>
                                            <option value="gill">gill</option>
                                            <option value="ea.">ea.</option>
                                        </select>
                                        </div>
                                        </div>
                                       ';
                                        ++$ingredientCounter;
                                    }
                                }
                            }
                            ?>

                        </div>
                        <button type="button" id="add-ingredient">
                            Add ingredient
                        </button>
                    </fieldset>

                    <fieldset>
                        <legend>Instructions</legend>
                        <div id="steps">

                            <?php
                            if ($instructions !== false) {
                                $stepCounter = 1;
                                foreach ($instructions as $instruction) {
                                    if (!empty($instruction)) {
                                        echo '
                                       <div class="field-msg">
                                       <label for="step-' . $stepCounter . '">Step ' . $stepCounter . ':</label>
                                       <textarea id="step-' . $stepCounter . '" name="instructions[' . $stepCounter . '][step]" required>' . $instruction['step'] . '</textarea>
                                     </div>
                                       ';
                                        ++$stepCounter;
                                    }
                                }
                            }
                            ?>

                        </div>
                        <button type="button" id="add-step">
                            Add step
                        </button>
                    </fieldset>


                    <button class="center" id="submit-btn" type="submit" name="submit">Update</button>
                </form>
            </section>

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
    <script src="edit_form.js"></script>
    <script src="main.js"></script>
</body>

</html>
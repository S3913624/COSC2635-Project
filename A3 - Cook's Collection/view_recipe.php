<!DOCTYPE html>

<html>

<head>
    <title>Cooks Collection | Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="CSS/styles.css">
</head>

<body>
    <header class="main-header">
        <h1 class="team-name team-name-large">Cooks Collection</h1>
    </header>

    <!-- Sidebar -->
    <div id="mainSidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Recipes</a>
        <a href="add_recipe.php">Add Recipe</a>
    </div>

    <!-- Content -->
    <div id="main">
        <!-- Burger button for sidebar -->
        <span class="sticky" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <?php
        $id = $_GET['id'];
        include('./PHP/connection.php');
        $sql = 'SELECT * FROM recipes WHERE id=' . $id;
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
            $name = $row['name'];
            $description = $row['description'];
            $category = $row['category'];
            $time = $row['time'];
            $diff = $row['diff'];
            $ingredients = unserialize($row['ingredients']);
            $instructions = unserialize($row['instructions']);
            $image = $row['image'];
            echo ' 
                    <section class="content-section">
                   
                        <div class="recipe-display">
                        
                        <div id="del-' . $id . '" class="confirm">
                            <span onclick="document.getElementById(\'del-' . $id . '\').style.display=\'none\'" class="close" title="Close">×</span>
                            <div class="confirm-content">
                              <div class="confirm-container">
                                <h1>Delete Recipe?</h1>
                                <p>Are you sure you want to delete this recipe?</p>
                                <span class="modify-buttons">
                                <form method="POST" action="PHP/delete.php?id=' . $id . '">
                                    <input type="submit" value="Confirm">
                                </form>
                                <button type="button" onclick="document.getElementById(\'del-' . $id . '\').style.display=\'none\'">Cancel</button>
                                </span>
                              </div>
                            </div>
                          </div>  
                        <div class="recipe">
                        <button class="center" type="button" onclick="javascript:history.back()">Back</button>
                            <br>
                        <h2 class="section-header">' . $name . '</h2>
                        
                            <a href="images/recipe_images/' . $image . '">
                                <div class="recipe-picture" style="background-image: url(images/recipe_images/' . $image . ');"></div></a>
                                <br>
                                <span class="modify-buttons">
                                <form method="POST" action="edit.php?id=' . $id . '">
                                          <input type="submit" value="Edit">
                                      </form>
                                <button  onclick="document.getElementById(\'del-' . $id . '\').style.display=\'block\'">Delete</button>
                                </span>
                                <div class="text-center">
                                
                                
                                <p>Category: ' . $category . '</p>
                                <p>Cooking Time: ' . $time . '</p>
                                <p>Difficulty: ' . $diff . '/10</p>
                                <p>' . $description . '</p>
                                ';
            if ($ingredients !== false) {
                echo '<h3>Ingredients</h3><div class="ingredient-container">';
                foreach ($ingredients as $ingredient) {
                    if (!empty($ingredient['name'])) {
                        echo '<span><input type="checkbox" />  ' .$ingredient['name'] . ' ' . $ingredient['amount'] . ' ' . $ingredient['unit'] . '</span>';
                    }
                }
                echo '</div>';
                
            }
            if ($instructions !== false) {
                echo '<h3>Instructions</h3><div class="recipe-instructions"><ol>';
                foreach ($instructions as $instruction) {
                    if (!empty($instruction['step'])) {
                        echo '<li><input type="checkbox" /> ' . $instruction['step'] . '</li>';
                    }
                }
                echo '</ol></div>';
            }

            echo " </div>";
        
        ?>
        </ol>
        
        </div>
    </div>
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
    <script src="JS/main.js"></script>
    <script src="JS/recipe_view_delete.js"></script>
</body>

</html>
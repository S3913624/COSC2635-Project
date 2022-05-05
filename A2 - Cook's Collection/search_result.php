<!DOCTYPE html>

<html>

<head>
    <title>Cooks Collection | Categories</title>
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
        <a href="index.php" class="bar-item sidebar-contents-button">Recipes</a>
        <a href="add_recipe.php" class="bar-item sidebar-contents-button">Add Recipe</a>
        <a href="search.html" class="bar-item sidebar-contents-button">Search</a>
        <a href="select_category.php" class="bar-item sidebar-contents-button">Categories</a>
        <a href="contact_us.html" class="bar-item sidebar-contents-button">Contact Us</a>
    </div>

    <!-- Content -->
    <div id="main">
        <!-- Burger button for sidebar -->
        <span class="sticky" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <section class="recipe-container">
            <div class="recipes">

                <?php
                    // Create connection
                    include('./connection.php');

                    $resultTitle = "";
                    $returnButton = "<a href='search.html' class='buffer center'>Return to Search</a>";

                    if (isset($_GET["q"]) && $_GET["q"] !== "" && $_GET["q"] !== " ") {
                        $searchq = $_GET["q"];
                        $sql = "SELECT * FROM recipes WHERE `name` LIKE '%$searchq%'";
                        $result = mysqli_query($con, $sql)
                            
                            or die(mysqli_error($con));

                        $numOfCol = mysqli_num_rows($result);
                        
                        if ($numOfCol == 0) {
                            $resultTitle = '<h2 class="buffer center">No results found</h2>';
                            print($resultTitle);
                        } 
                        
                        else {
                            //$resultTitle = '<a href="search.html" class="buffer center">TEST BUTTON</a>';
                            //print($resultTitle);

                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $category = $row['category'];
                                $image = $row['image'];

                                echo '<a href="view_recipe.php?id=' . $id . '">
                                    <div style="background-image: url(images/recipe_images/' . $image . ');"></div>
                                    <h3>' . $name . '</h3>
                                    </a>';
                            }        
                        }
                    }

                    // if no input found, return to search.html
                    else {
                        header("location: search.html");
                    }

                    print($resultTitle); 
                    print($returnButton);
                    mysqli_close($con); 
                ?>
            </div>
        </section>
    </div>

    <!-- clear space to stop footer covering page content -->
    <div class="clear"></div>

    <footer class="main-footer">
        <div class="container main-footer-container">
            <h3 class="team-name">Arch-IT-ects</h3>
            <ul class="nav footer-nav">
                <li><a href="https://github.com/S3913624/COSC2635-Project" target="blank"><img
                            src="Images/Github_Logo.png"></a></li>
                <li><a href="https://trello.com/b/GCaH8adM/oua-sp1-2022-the-arch-it-ects" target="blank"><img
                            src="Images/Trello_Logo.png"></a></li>
                <li><a href="https://teams.microsoft.com/l/team/19%3avBpYPZcjTf3SApKH2JYja066DpDA_lI-27kDuzStrEI1%40thread.tacv2/conversations?groupId=a51a27be-9bbc-4199-a5fe-942d6e4c7973&tenantId=d1323671-cdbe-4417-b4d4-bdb24b51316b"
                        target="blank"><img src="Images/MSTeams_Logo.png"></a></li>
            </ul>
        </div>
    </footer>
    <script src="main.js"></script>
</body>

</html>
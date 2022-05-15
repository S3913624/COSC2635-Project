<!DOCTYPE html>

<html>

<head>
    <title>Cooks Collection | Categories</title>
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
        <h2 class="section-header">Search</h2>
        <section class="content-section">
            <div class="center">
                <form name="frmSearch" method="get" action="./search_result.php">
                    <input type="text" name="q" placeholder="Search" />
                    <input type="submit" value="Go" />
                </form>
                <br>
            </div>
            <div class="center">
            <select id="category-select">
                    <option selected style="display: none;" value="">Choose a Category...</option>
                    <?php
                    include('./PHP/connection.php');
                    $sql = 'SELECT DISTINCT category FROM recipes';
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $category = $row['category'];
                        echo '
                        <option value="categories.php?category=\'' . $category . '\'">' . $category . '</option>
                        ';
                    }
                    ?> 
                </select>
                <button id="go" onclick="gotosite()">Go</button>
            </div>
            <br>
            <form class="center" method="POST" action="index.php">
                <input type="submit" value="All Recipes">
            </form>
            <br>
            

                <?php
                // Create connection
                include('./PHP/connection.php');
                if (isset($_GET["q"]) && $_GET["q"] !== "" && $_GET["q"] !== " ") {
                    $searchq = $_GET["q"];
                    // start with the first part of the query
                    $sql = "SELECT * FROM recipes WHERE ";

                    // cut the string on whitespaces
                    $separateWords = explode(" ", $searchq);

                    // create an array and store the words in it
                    $wordArray = array();
                    foreach ($separateWords AS $word)
                    {
                        $wordArray[] = "`name` LIKE '%$word%'";
                    };

                    // link everything together
                    $sql .= implode(" OR ", $wordArray);
                    
                    // send the query
                    $result = mysqli_query($con, $sql)
                        or die(mysqli_error($con));
                    $numOfCol = mysqli_num_rows($result);

                    if ($numOfCol == 0) {
                        echo '<h2 class="center">No results found for "'.$searchq.'"</h2>
                        <div class="recipes">
                        ';
                    } else {
                        echo '<h2 class="center">Showing results for "'.$searchq.'"</h2>
                        <div class="recipes">
                        ';
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $category = $row['category'];
                            $image = $row['image'];

                            echo '  <div class="recipe">
                                    <a href="view_recipe.php?id=' . $id . '">
                                    <div style="background-image: url(images/recipe_images/' . $image . ');"></div>
                                    <h3>' . $name . '</h3>
                                    </a>
                                    </div>';
                        }
                    }
                }
                // if no input found, return to index.php
                else {
                    header("location: index.php");
                }
                mysqli_close($con);
                ?>
            </div>
            <?php
            if ($numOfCol == 0) {
                echo '
                        <br>
                        <form class="center" method="POST" action="add_recipe.php">
                            <input type="submit" value="Add Recipe">
                        </form>
                ';
            }
            ?>
        </section>
    </div>

    <!-- clear space to stop footer covering page content -->
    <div class="clear"></div>

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
    
</body>

</html>
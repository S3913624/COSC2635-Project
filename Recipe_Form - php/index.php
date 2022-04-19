<?php
include ('./connection.php');

if (isset($_POST["submit"])) {
  $category = $_POST["category"];
  $name = $_POST["name"];
  $description = $_POST["description"];
  $time = $_POST["time"];
  $diff = $_POST["diff"];

  if(count($_POST["ingredients"]) == 0) {
    $ingredients = NULL;
  }else{
    $ingredients = serialize($_POST["ingredients"]);
  }

  if(count($_POST["instructions"]) == 0) {
    $instructions = NULL;
  }else{
    $instructions = serialize($_POST["instructions"]);
  }

  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validExtension) ){
      echo
      "
      <script>
        alert('Image must be jpg, jpeg or png');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image is too large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'images/' . $newImageName);
      $sql="INSERT INTO `recipes` (category, name, description, time, diff, ingredients, instructions, image) VALUES('$category', '$name', '$description', '$time', '$diff', '$ingredients', '$instructions', '$newImageName')";
      $result=mysqli_query($con,$sql);
      if ($result){
        echo "Data inserted successfully";
      }else{
        die(mysqli_error($con));
      }
      echo
      "
      <script>
        alert('Recipe Successfully Added');
        document.location.href = 'recipes.php';
      </script>
      ";
    }
  }

  
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <title>Add a Recipe</title>
  </head>
  <body>
    <header>
      <h1>Add a Recipe</h1>
    </header>
    <section class="container">
      <form
        id="recipe-form"
        action=""
        method="post"
        enctype="multipart/form-data"
      >
        <fieldset>
          <div class="drop-select">
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
            <input
              type="text"
              id="name"
              name="name"
              placeholder="Enter recipe name"
              autocomplete=\"off"
              required
            />
          </div>

          <div class="field-msg">
            <label for="description">Description:</label>
            <textarea
              id="description"
              name="description"
              placeholder="Enter description"
              autocomplete=\"off"
              required
            ></textarea>
          </div>

          <div class="field-num">
            <label for="time">Cooking Time (mins): </label>
            <input
              type="number"
              id="time"
              name="time"
              placeholder="Enter cooking time"
              autocomplete=\"off"
              required
            />
          </div>
          <div class="field-slide">
            <label for="diff">Difficulty</label>
            <input
              type="range"
              id="diff"
              name="diff"
              min="0"
              max="10"
              step="1"
            />
          </div>
          <div class="field-img">
            <label for="image">Add an Image:</label>
            <input
              type="file"
              id="image"
              name="image"
              accept="image/png, image/jpg"
              required
            />
          </div>
          <div id="empty-image"></div>
        </fieldset>

        <fieldset>
          <legend>Ingredients</legend>
          <div id="ingredients"></div>
          <button type="button" class="add-button" id="add-ingredient">
            Add ingredient
          </button>
        </fieldset>

        <fieldset>
          <legend>Instructions</legend>
          <div id="steps"></div>
          <button type="button" class="add-button" id="add-step">
            Add step
          </button>
        </fieldset>

        <fieldset>
          <a href="recipes." class="center">View Recipe Book</a>
        </fieldset>
        <button id="btn" class="center" type="submit" name="submit">Submit</button>
      </form>
    </section>
    <aside></aside>
    <footer></footer>

    <script src="main.js"></script>
  </body>
</html>

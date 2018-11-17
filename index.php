<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Recipe Book</title>
    <meta name="keywords" content="cooking, recipes, cookbook, food, culinary"/>
    <meta name="description" content="Easily view your stored recipes for easy access in this online app. "/>
    <!-- Imports a custom font from Google -->
    <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">

    <link rel="stylesheet" href="app.css">
    <script type="text/javascript">

    /* Two objects; foodieRecipes and veggieRecipes store data about certain recipeNames
    for each respective user */

    var foodieRecipes = [
      {
        name: 'Curried Chickpeas with Spinach',
        ingredients: ['2 Tbs Olive Oil', '1 Onion', '2 Cloves Garlic', 'Fresh Ginger', '1.5 Tbs Curry Powder', 'Fresh Spinach', '15 oz. Tomato Sauce', '29 oz. Chickpeas'],
        img: 'img/curried-chickpeas.jpg'
      },
      {
        name: 'Chicken and Asparagus Lemon Stir Fry',
        ingredients: ['1lb Chicken Breast', 'Salt', '1/2 Cup Chicken Broth', '2 tsp Cornstarch', '2 Tbs Water', '1 Tbs Canola Oil', 'Asparagus', '6 Cloves Garlic', 'Fresh Ginger', '3 Tbs Fresh Lemon Juice', 'Pepper'],
        img: 'img/chicken-lemon-stirfry.jpg'
      },
      {
      name: 'Rosemary Merlot Flank Steak',
      ingredients: ['1 Onion', '3/4 Cup Chicken Broth', '1 Cup Red Wine', '2 Tbs Fresh Rosemary', '1/2 tsp Salt', '1/2 tsp Pepper', '2 Garlic Cloves', '1 lbs Flank Steak', '1 Tbs Tomato Paste', '2 tsp Dijon Mustard'],
      img: 'img/rosemary-flank-steak.jpg'
      }
  ]

    var veggieRecipe = [
      {
        name: 'Marinated Chickpea Salad',
        ingredients: ['15 oz Chickpeas', '1/2 Cucumber', '1/2 Red Onion', '1 Cup Cherry Tomatoes', '1 Cup Fresh Mozarella Balls', '1/4 Cup Basil', '1/4 Cup Olive Oil', '1 Tbs Red Wine Vinegar', '1 Tbs Balsamic Vinegar', '1 Pinch Salt', '1 Pinch Pepper'],
        img: 'img/chickpea-salad.jpg'
      },
      {
        name: 'Mexican Cauliflower Rice',
        ingredients: ['1 Head of Cauliflower', '2 Tbs Oil', '1 Red Onion', '2 Bell Peppers', '3 Garlic Cloves', '1 tsp Salt', '1 tsp Chili Powder', '1 tsp Cumin', '1 tsp Oregano', '15 oz Black Beans', '2 Avocados', '1/2 Red Onion', '1/2 Lime', '1/2 Jalapeno', '1/4 Cup Cilantro'],
        img: 'img/cauliflower-rice.jpg'
      }
  ]


  // Loops through the foodieRecipes object and replaces on page HTML with data from the object
    var showFoods = function() {
      var text = ""
      for (i = 0; i < foodieRecipes.length; i++) {
          text = text + `<div class = "recipeCard"><img src="${foodieRecipes[i].img}"><h2>${foodieRecipes[i].name}</h2><ul>${foodieRecipes[i].ingredients.map(item => `<li>${item}</li>`).join("")}<br></ul></div>`
    }
      return document.body.innerHTML = text;
    }

  // Loops through the veggieRecipe object and replaces on page HTML with data from the object
    var showVeg = function() {
      var text = ""
      for (i = 0; i < veggieRecipe.length; i++) {
          text = text + `<div class = "recipeCard"><img src="${veggieRecipe[i].img}"><h2>${veggieRecipe[i].name}</h2><ul>${veggieRecipe[i].ingredients.map(item => `<li>${item}</li>`).join("")}<br></ul></div>`
    }
      return document.body.innerHTML = text;
    }
    </script>
  </head>

  <body>
    <!-- sets the username and password variables upon form submission -->
    <?php
    $foodieRecipes = foodieRecipes;
    $user = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $user = $_POST["username"];
      $pass = $_POST["password"];
    }
    ?>
    <!-- The login form -->
    <h1>Recipe Book</h1>
    <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <p>Username<br><input type="text" name="username"></p>
      <p>Password<br><input type="password" name="password"></p>
      <p><input class="submit" type="submit" name="submit"></p>
    </form>

    <!-- For instructions for testing users in this assignment -->
    <section class="assigment">
      <em><p>For the purposes of testing users, use the following usernames and passwords:</p>
      <p>Username: foodie</p>
      <p>Password: lovetoeat</p>
      <p>or</p>
      <p>Username: vegeterian</p>
      <p>Password: eatinggreens</p></em>
    </section>

    <!-- Validates input. If the user exists show them their specific content. If not show error message. -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($user == "foodie" && $pass == "lovetoeat") {
        echo "<script language='javascript' type='text/javascript'>";
        echo "document.body.innerHTML = showFoods();";
        echo "</script>";
      } elseif ($user == "vegeterian" && $pass == "eatinggreens") {
        echo "<script language='javascript' type='text/javascript'>";
        echo "document.body.innerHTML = showVeg();";
        echo "</script>";
      } else {
        echo "<script language='javascript' type='text/javascript'>";
        echo "document.body.innerHTML = '<h3 class=unrecognized>Invalid username and password. Please go back and try again.</h3>';";
        echo "</script>";
        }
    }
    ?>
  </body>
</html>

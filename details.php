<?php
  require("./admin/phpscripts/config.php");

  if(isset($_GET["movie"])) {
    $id = $_GET["movie"];
    $tbl = "tbl_movies";
    $col = "movies_id";
    
    $movie = getSingle($tbl, $col, $id);
  }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?= $movie["movies_title"] ?></title>
<?php include "./includes/styles.html" ?>
</head>
<body>	
  <?php include "./includes/nav.html" ?>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"><?= $movie["movies_title"]?></h1>
      <p class="lead"><?= $movie["movies_release"] ?></p>
    </div>
  </div>
  <div class="container">
    <div class="row">
        <p class="col-4"><?= $movie["movies_storyline"] ?></p>
        <img class="col-8" src="./images/<?= $movie["movies_cover"] ?>" alt="<?= $movie["movies_title"] ?>">
    </div>
  </div>

  <?php include "./includes/scripts.html" ?>
</body>
</html>
<?php
  # Error Reporting
  ini_set("display_errors", 1); // TODO: Turn off error reporting for production
  error_reporting(E_ALL);

  # Includes 
  require_once("./admin/phpscripts/read.php"); // This runs our query and exposes getAll() function

  # Query & Variables
  $tbl = "tbl_movies"; // Global variable for the table we wish to run our queries on.  See ./connect.php

  $getMovies = getAll($tbl); // Get all movies 

?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome to the Finest Selection of Blu-rays on the internets!</title>
  <?php @include "./includes/styles.html" ?>
</head>
<body>
  <?php include "./includes/nav.html" ?>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="lead">Welcome to the Finest Selection of Blu-rays on the internets!</p>
      <h1 class="display-4">We've got something for the whole family</h1>
    </div>
  </div>
  <div class="container">
    <div class="row mt-6">
  <?php
  if(!is_string($getMovies)) {
    while($row = mysqli_fetch_array(($getMovies))) {
      echo "
      <div class=\"col-4\">
      <div class=\"card mb-3\">
        <a href=\"./details.php?movie={$row["movies_id"]}\">
          <img src=\"images/{$row["movies_cover"]}\" alt=\"{$row["movies_title"]}\" class=\"card-img-top\">
        </a>
          <div class=\"card-body\">
          <a href=\"./details.php?movie={$row["movies_id"]}\">
          <h5 class=\"card-title\">
            {$row["movies_title"]}
          </h5>
          <h6 class=\"card-subtitle mb-2 text-muted\">{$row["movies_release"]}</h6>
          </a>
          <p class=\"card-text\">
            {$row["movies_storyline"]}
          </p>
        </div>
      </div>
    </div>";
    }
  } else {
    echo "<div class=\"alert-danger\">{$getMovies}</div>";
  }

  ?>
  </div>
</div>



  <?php @include "./includes/scripts.html" ?>
</body>
</html>
<?php
  
  // Get all of something
  function getAll(String $table) {
    include('connect.php'); // Grab Credentials and DB Connections ($link)

    $queryAll = "SELECT * FROM {$table}"; // Query String with the $table param.
    $runAll = mysqli_query($link, $queryAll); // Querry the DB connection our dynamic query

    // Return either the result of the query or an error msgP
    return $runAll ? 
      $runAll : "There was an error accessing this information.  Please contact your admin"; 

    mysqli($link); // Close off the connection token after execution.
  }
  function getSingle(String $table, String $col, Int $id) {
    include("connect.php");

    $query = "SELECT * FROM {$table} WHERE {$col} = {$id}";

    $result = mysqli_query($link, $query);


    return $result ?
      mysqli_fetch_array($result) : "There was an error accessing this info.  Please contact you admin";
  }




?>
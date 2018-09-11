

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">
    <?php 
      $sitename = 'small-efforts';
      $title;

      if(isset($title)){
       echo "<title> $title | $sitename </title>";
      } 
        else {
      echo "<title>$sitename</title>";
      }
      ?>

    <base href="/" />
    <link rel="stylesheet" href="vendor/uikit.min.css" />
  </head>

  <body>
      <div class="uk-section uk-container">
        <h2><a href="/">HOME</a></h2>
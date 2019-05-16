
<html>
<head>
  <title>Remember</title>
      <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

  <?php
  include "connect.php";
  // Format today's date as YYYY-MM-DD
  date_default_timezone_set("America/New_York");
  $hour = date('H:00');
  $today = date("F j, Y, g:i a");
  echo "<h1>";
  echo $today;
  echo "</h1>";
  echo "</br>";
  echo "</br>";

  
  // Run a SQL query and store the results in $result
  // Always specify an order
  // * - all columns
  // FROM events - always specify the table name
  // ORDER BY - always specify an order and use ASC or DESC
  // WHERE - a condition
  $sql = "SELECT * FROM book WHERE time = '$hour' ";
  $result = $conn->query($sql);
  // If there is at least 1 row in the result, show all the rows
  if ($result->num_rows > 0) {
      // Get one row at a time until we're out of rows
       while ($row = $result->fetch_assoc()) {
          echo "<p>";
          echo "{$row['message']}";
          echo "<p>";
      }
  } else {
      echo "No events";
  }
  // Close the databse connection
  $conn->close();
  ?>

</body>
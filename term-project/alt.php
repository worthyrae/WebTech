<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    $conn = new mysqli("104.236.51.8:3306","worthy","FM9r?S9wMRk-r+UE", "musicplace");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql1 = "SELECT id, artist, albumName, coverUrl, releaseDate, estimatedStreams FROM Offering ORDER BY releaseDate LIMIT 5";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
      while($row1 = $result1->fetch_assoc()) {
        
        echo " " . $row1["id"]. ", " . $row1["artist"]. ", " . $row1["albumName"] . ", " . $row1["coverUrl"] . ", " . $row1["releaseDate"] . ", " . $row1["estimatedStreams"] . "<br>";
      }
    }
    else {
      echo "0 results";
    }
    $sql2 = "SELECT offeringId, streamsDate, streamsTotal FROM Streams WHERE offeringId=$idItem ORDER BY streamsDate DESC LIMIT 2";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
      while($row2 = $result2->fetch_assoc()) {
        echo " " . $row2["offeringId"]. ", " . $row2["streamsDate"]. ", " . $row2["streamsTotal"] . "<br>";
      }
    }
    else {
      echo "0 results";
    }
    $conn->close();

    ?>

  </body>
</html>

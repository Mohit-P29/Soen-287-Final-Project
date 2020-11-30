<?php

require_once 'connection/check_connection.php';

?>


<?php

/*  $sql = "INSERT INTO masks (primary_color_Id, secondary_color_Id, image_Id)
VALUES ('4', '4', '4')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
} */

// updating instead of inserting mask


 $colorP = $_POST['mask_primary_color'];
 $colorS = $_POST['mask_secondary_color'];
 $imagesF = $_POST['images'];

echo $colorP;
echo $colorS;
echo $imagesF;




$sql = "UPDATE masks SET primary_color_Id='$colorP', secondary_color_Id='$colorS', image_Id='$imagesF'   WHERE maskId=1";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
















$sql = "SELECT maskId, u1.color_name primary_color_name, u2.color_name secondary_color_name, images.image_name 
FROM masks 
JOIN colors u1 ON masks.primary_color_Id = u1.colorId 
JOIN colors u2 ON masks.secondary_color_Id = u2.colorId 
JOIN images ON masks.image_Id = images.image_id";

$result = $conn->query($sql);

// 1. attempt ash
/* if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["maskId"]."</td><td>".$row["primary_color_Id"]." ".$row["secondary_color_Id"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
} */

//2. attempt mohit stack overflow
if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br>" ."maskId: " . $row["maskId"].  " Color_Primary: " . $row["primary_color_name"]. " Color_Outline:" . $row["secondary_color_name"]. " Image: " . $row["image_name"]. "<br>";
      //"maskId: " . $row["maskId"].
  }
} else {
  echo "0 results";
}
$conn->close();


?>

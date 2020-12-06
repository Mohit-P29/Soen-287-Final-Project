<?php
include('includes/header.php')
    ?>
<?php

require_once 'connection/check_connection.php';

?>


<?php


// updating instead of inserting mask
if( !isset($_POST["delete"])){

 $colorP = $_POST['mask_primary_color'];
 $colorS = $_POST['mask_secondary_color'];
 $imagesF = $_POST['images'];

echo $colorP;
echo $colorS;
echo $imagesF;


/*

$sql = "UPDATE masks SET primary_color_Id='$colorP', secondary_color_Id='$colorS', image_Id='$imagesF'   WHERE maskId=1";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}


*/


  $sql = "INSERT INTO masks (primary_color_Id, secondary_color_Id, image_Id)
VALUES ('$colorP', '$colorS', '$imagesF')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
	
	
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
} 



$newMaskId = mysqli_insert_id($conn);



echo "Newly add Mask id: ".$newMaskId."<br>";
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
?>

<table style="width:40%; border: 1px solid black;">

<?php
echo "These are the masks in your cart at the moment:"."<br>";
	

	
if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  ?>
	  <tr>
    <th>
	  
	   <?php
    echo "<br>" ."maskId: " . $row["maskId"].  " Color_Primary: " . $row["primary_color_name"]. " Color_Outline:" . $row["secondary_color_name"]. " Image: " . $row["image_name"]. "<br>";
	?>
	  </th>
	  <?php
  }
} else {
  echo "0 results";
}





?>

</table>

	
	<br><br><br>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
		<p>If you'd like to delete a mask please enter its mask Id number here and press delete</p>
	<input type="text" value="" name="maskToDelete" placeholder="MaskId">
	<input  class="submit" type="submit" name="delete" value="Confirm" />
	

	<br><br><br>
	
	<?php
		
		
		
		
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			if(!isset($_POST["maskToDelete"])){
				
				$_POST["maskToDelete"] = "";
			}
		echo "The mask to delete is: ".$_POST["maskToDelete"]."<br>";
			$sql = "SELECT maskId, u1.color_name primary_color_name, u2.color_name secondary_color_name, images.image_name 
FROM masks 
JOIN colors u1 ON masks.primary_color_Id = u1.colorId 
JOIN colors u2 ON masks.secondary_color_Id = u2.colorId 
JOIN images ON masks.image_Id = images.image_id";

$result = $conn->query($sql);
		
		
	  if(isset($_POST["delete"]))
        {
		  
	if (!empty($result) && $result->num_rows > 0) {
		
  
		
  while($row = $result->fetch_assoc()) {

   
	  $maskDeleted = $_POST["maskToDelete"];
	
	
	  
	  if($row["maskId"] == $_POST["maskToDelete"]){
		  
		 $sql ="DELETE FROM masks WHERE maskId='$maskDeleted' ";
		  if ($conn->query($sql) === TRUE) {
  echo "New Id Loaded successfully, press delete to remove from cart";
	
	
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
		  
		  
	  }else{
		  
		  echo "mask number entered is not there";
		 
	  }
	  
      
  }
} else {
  echo "0 results";
}
	  }
		}
		
	$conn->close();
?>
	

	<input  class="submit" type="submit" name="delete" value="Delete" />
	</form>
		<form action="diy_mask_product_page.php" method="post">
		
		<input  class="submit" type="submit" name="submit" value="Goback to mask builder" />
	</form>

<?php 
    include('includes/footer.php')
    ?>
<?php
include('includes/header.php')
    ?>
<?php

require_once 'connection/check_connection.php';

if(!isset($_SESSION['MaskQuantity'])){
	
	
}

?>

<h1> Dummy DIY Mask Builder Cart</h1>
<?php

// fetching data from the previous page that the user selects
if( !isset($_POST["delete"])){

 $colorP = $_POST['mask_primary_color'];
 $colorS = $_POST['mask_secondary_color'];
 $imagesF = $_POST['images'];

echo $colorP;
echo $colorS;
echo $imagesF;



// inserting new mask that the user would like to add to the cart

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
	

//----------------------This is where the mask table is displayed-------------------------
?>
<!-----------------HTML-------------------->

<div style="border: 1px solid black; width:1500px; border-radius: 25px; padding: 25px;border-width: 10px;" >



<?php



// setting up my select query
$sql = "SELECT maskId, u1.color_name primary_color_name, u2.color_name secondary_color_name, images.image_name 
FROM masks 
JOIN colors u1 ON masks.primary_color_Id = u1.colorId 
JOIN colors u2 ON masks.secondary_color_Id = u2.colorId 
JOIN images ON masks.image_Id = images.image_id";

$result = $conn->query($sql);


?>

<!--- where my table is going to be displayed --->

<table style="width:40%; border: 1px solid black;">

 <tr>
<th class="masks_table_header" style="border: 1px solid black;">
Product Id
</th>
<th class="masks_table_header" style="border: 1px solid black;">
Mask Main Color
</th>
<th class="masks_table_header" style="border: 1px solid black;">
Mask Outline Color
</th>
<th class="masks_table_header" style="border: 1px solid black;">
Images
</th>

<?php // BEGINNING OF PHP TAG
	
	

	

	
if (!empty($result) && $result->num_rows > 0) {
	
  // output data from each row of the database into each row of the table
	
	
  while($row = $result->fetch_assoc()) {
	  
	  //END OF PHP TAG
	  ?>
	  <tr>
    <th style="border: 1px solid black;">
	  
	   <?php
    echo "<br>" ."maskId:  " . $row["maskId"];  ?>
	  </th>
	   <th style="border: 1px solid black;">
	  <?php
	echo " Color_Primary:  " . $row["primary_color_name"]; ?>
		</th>
		 <th style="border: 1px solid black;">
		<?php
	echo " Color_Outline: " . $row["secondary_color_name"]; ?>
		</th>
		 <th style="border: 1px solid black;">
		<?php
	echo " Image: " . $row["image_name"]. "<br>"; ?>
		</th>
	  
	  <?php
  }
} else {
  echo "You Have No masks in your Cart";
}





?>
</tr>
</table>

	
	<br><br><br>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
		<p>If you'd like to delete a mask please enter its mask Id number under here and confirm, then once confirmed you can delete: </p>
	<input type="text" value="" name="maskToDelete" placeholder="MaskId">
	<input  class="submit" type="submit" name="delete" value="Confirm" />
	

	<br><br><br>
	
	<?php
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			if(!isset($_POST["maskToDelete"])){
				
				$_POST["maskToDelete"] = "";
			}
			if(!isset($deleteMask)){
				
				$deleteMask = "";
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
		  $deleteMask = false;
		  
	if (!empty($result) && $result->num_rows > 0) {
		
  
		
  while($row = $result->fetch_assoc()) {

   
	  $maskDeleted = $_POST["maskToDelete"];
	
	
	  
	  if($row["maskId"] == $_POST["maskToDelete"]){
		  
		 $sql ="DELETE FROM masks WHERE maskId='$maskDeleted' ";
		  if ($conn->query($sql) === TRUE) {
  echo "New Id Loaded successfully, press delete to remove from cart";
		$deleteMask = true;	  
			 

	
	
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
		  
		  
	  }else{
		  
		 
		 
	  }
	  
      
  }
} else {
  echo "0 results";
}
	  }
			
			
	if($deleteMask == false){
		 echo "Mask you are searchin for is not in your cart";
		
	}		
			
			
			
			
		}
		
	$conn->close();
?>
	

	<input  class="submit" type="submit" name="delete" value="Delete" />
	</form>
	
	</div>
		<form action="diy_mask_product_page.php" method="post">
		
		<input  class="submit" type="submit" name="submit" value="Goback to mask builder" />
	</form>

<?php 
    include('includes/footer.php')
    ?>
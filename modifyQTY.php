<?php
    include("includes/ConnectDB.php");  

    $sql = "SELECT * FROM cart ";

    $result = $conn->query($sql);

    //Sort all items of the cart into an array

    while($row = $result->fetch_assoc()) {
	  
        //END OF PHP TAG
        ?>
        <tr>
      <th style="border: 1px solid black;">
        
         <?php
      echo "<br>" ."item id  " . $row["id"];  ?>
        </th>
         <th style="border: 1px solid black;">
        <?php
      echo " Name: " . $row["productName"]; ?>
          </th>
           <th style="border: 1px solid black;">
          <?php
      echo " Quantity " . $row["quantity"]; ?>
          </th>
           <th style="border: 1px solid black;">
          <?php
      echo "Price: " . $row["price"]. "<br>"; ?>
          </th>
        
        <?php
    }
?>

<div>
    <h2>Which would you like to add?</h2>


</div>

<?php




    $sql="UPDATE cart SET quantity='$qty' WHERE id='$id'";
    mysqli_query($conn, $sql);


  
     
?>
<?php
include_once 'includes/covaid_database.php';

$colorP = $_POST['mask_primary_color'];
$colorS = $_POST['mask_secondary_color'];
$image = $_POST['images'];
$product_id=4;
$product_Qty=1;
$product_name="Custom Mask";


$sql = "SELECT * FROM products";
$retval = mysqli_query( $conn,$sql);
if(! $retval ) {
   die('Could not get data: ' . mysqli_error());
}
 $result=mysqli_num_rows($retval);

     if($result>0){       
       while ( $row = mysqli_fetch_assoc($retval)){
           if($row["id"]==61){
                $special=$row['specialPrice'];
                $product_price=$row['price'];
            break;
           }
     }
   }



if($special!=null||$special<0){
    $product_price=$special;
}



//Insert product into products table to get ID
$sql = "INSERT INTO products (name, price) 
VALUES('$product_name', '$product_price');";
mysqli_query($conn, $sql);

$product_id = mysqli_insert_id($conn);

$sql ="DELETE FROM products WHERE id='$product_id' ";
mysqli_query($conn, $sql);

//Assign primary color
switch($colorP){
    case 1:
        $colorP="red";
        break;
     case 2:
        $colorP="blue";
        break;
    case 3:
        $colorP="green";
        break;
    case 4:
        $colorP="pink";
        break;
    case 5:
        $colorP="yellow";
        break;
    case 6:
        $colorP="purple";
        break;
    case 7:
        $colorP="orange";
        break;
    case 8:
        $colorP="black";
        break;
	case 9:
        $colorS="white";
        break;
}

//Assign secondary color
switch($colorS){
    case 1:
        $colorS="red";
        break;
     case 2:
        $colorS="blue";
        break;
    case 3:
        $colorS="green";
        break;
    case 4:
        $colorS="pink";
        break;
    case 5:
        $colorS="yellow";
        break;
    case 6:
        $colorS="purple";
        break;
    case 7:
        $colorS="orange";
        break;
    case 8:
        $colorS="black";
        break;
	case 9:
        $colorS="white";
        break;
}

//Assign image
switch($image){
    case 1:
        $image="images/animal/elephant.png";
        break;
     case 2:
        $image="images/animal/fox.png";
        break;
    case 3:
        $image="images/animal/gecko.png";
        break;
    case 4:
        $image="images/animal/polarbear.png";
        break;
    case 5:
        $image="images/animal/rabbit.png";
        break;
	case 6:
        $image="images/animal/no_image_selected.png";
        break;	
}

$sql="SELECT * FROM cart WHERE id=$product_id";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

//Check if this product is already in cart
if ($resultCheck > 0) {

    $row = mysqli_fetch_assoc($result);

    //update quantity
    $oldQty=$row["quantity"];
    $product_Qty=$oldQty+$product_Qty;

    $sql="UPDATE cart SET quantity='$product_Qty' WHERE id='$product_id'";
    mysqli_query($conn, $sql);

}

//If it's not in the cart
else{
    $sql = "INSERT INTO cart (id, productName, quantity, price, image, maskPColor, MaskSColor) 
        VALUES('$product_id', '$product_name', '$product_Qty', '$product_price','$image','$colorP','$colorS');";
        mysqli_query($conn, $sql);
}


header("Location: shoppingCart.php")

?>
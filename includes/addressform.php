<?php include_once 'ConnectDB.php'?>

<?php


$first=isset($_POST['first2'])?$_POST['first2']:'';
$last=isset($_POST['last2'])?$_POST['last2']:'';
$comp=isset($_POST['company'])?$_POST['company']:'';
$a1=isset($_POST['address1'])?$_POST['address1']:'';
$a2=isset($_POST['address2'])?$_POST['address2']:'';
$city=isset($_POST['city'])?$_POST['city']:'';
$country=isset($_POST['country'])?$_POST['country']:'';
$province=isset($_POST['province'])?$_POST['province']:'';
$post=isset($_POST['post'])?$_POST['post']:'';
$phone=isset($_POST['phone'])?$_POST['phone']:'';


$sql = "INSERT INTO useraddress (first,last,company,address,address2,city,country,province,post,phone) VALUES ('$first', '$last', '$comp', '$a1', '$a2', '$city','$country','$province','$post','$phone')";

mysqli_query($conn,$sql);
echo "Successfully Add Address to MySQL database.";
$conn->close();
?>
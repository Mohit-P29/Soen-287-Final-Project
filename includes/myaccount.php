<?php include_once 'ConnectDB.php'?>

<?php

$first=isset($_POST['user_first'])?$_POST['user_first']:'';
$last=isset($_POST['user_last'])?$_POST['user_last']:'';
$contactE1=isset($_POST['user_email1'])?$_POST['user_email1']:'';
$contactE2=isset($_POST['user_email2'])?$_POST['user_email2']:'';
$phone1=isset($_POST['user_phone1'])?$_POST['user_phone1']:'';
$phone2=isset($_POST['user_phone2'])?$_POST['user_phone2']:'';


$sql = "INSERT INTO user_info (user_first,user_last,user_email1,user_email2,phone1,phone2) VALUES ('$first', '$last', '$contactE1', '$contactE2', '$phone1', '$phone2')";

mysqli_query($conn,$sql);
echo "Successfully Add Address to MySQL database.";
$conn->close();

?>
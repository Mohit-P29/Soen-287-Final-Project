<?php include_once 'ConnectDB.php'?>
<?php
                     
     
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   
   $sql = "SELECT * FROM user_info where user_first='Jiawei'";
   $retval = mysqli_query( $conn,$sql);
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   
   $row = mysqli_fetch_assoc($retval); 
   $firstname1=empty($row['user_first'])?'':$row['user_first'];
 $lastname1=empty($row['user_last'])?'':$row['user_first'];
 $contact1=empty($row['user_email1'])?'':$row['user_first'];
 $contact2=empty($row['user_email2'])?'':$row['user_first'];
 $p1=empty($row['phone1'])?'':$row['phone1'];
       $p2=empty($row['phone2'])?'':$row['phone2']; 


  $sql2="SELECT * FROM useraddress where first='Jiawei'";
   $retval2 = mysqli_query( $conn,$sql2);
   if(! $retval2 ) {
      die('Could not get data: ' . mysqli_error());
   }
   
   $row2 = mysqli_fetch_assoc($retval2); 
   $firstname2=empty($row2['first'])?'':$row2['first'];
  $lastname2=empty($row2['last'])?'':$row2['last'];
  $comp=empty($row2['company'])?'':$row2['company'];
  $address1=empty($row2['address'])?'':$row2['address'];
  $address2=empty($row2['address2'])?'':$row2['address2'];
  $city=empty($row2['city'])?'':$row2['city'];
  $coun=empty($row['country'])?'':$row2['country'];
  $prov=empty($row2['province'])?'':$row2['province'];
  $po=empty($row2['post'])?'':$row2['post'];
  $p3=empty($row2['phone'])?'':$row2['phone'];
   
?>

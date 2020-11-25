 <?php
                             $db_servername="localhost";
                             $db_username="root";
                             $db_password="database11";
                             $db_name="user";

                             $conn=mysqli_connect($db_servername,$db_username,$db_password,$db_name);
                             $deletesql1="DELETE FROM useraddress where first='Jiawei'";
                             $delete_stmt=mysqli_query($conn,$deletesql1);
                             if(!$delete_stmt) {
                                  die('Could not get data: ' . mysqli_error());
                                  }
                            echo "Delete!";

 ?>

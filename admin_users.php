    <?php
    include_once "includes/covaid_database.php";
    $page = "Users";
    include("includes/admin_header.php");

    $result = mysqli_query($conn, "SELECT * FROM user_info");
    $num_rows = mysqli_num_rows($result)-1;

    $totalPurchase = 0; //Unknown
    $sql2 = "SELECT COUNT(userID) AS num_purchase FROM user_order;";
    $result2 = mysqli_query($conn, $sql2);
    $resultCheck2 = mysqli_num_rows($result2);
    if ($resultCheck2 > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        $totalPurchase = $row2['num_purchase'];
    }
    ?>



    <main class="main_content">
        <header class="header">
            <ion-icon name="people-outline" class="header-icon"></ion-icon>
            <span class="header-name">Users</span>
        </header>
        <div class="wrapper-grid layout2" id=scroll-1>
            <div class="half-page1" style="text-align: center; background: rgb(115,14,197);
            background: linear-gradient(90deg, rgba(115,14,197,1) 0%, rgba(154,92,205,1) 43%, rgba(200,169,225,1) 100%);">
                <span style="font-size: xx-large; color: white;">
                    Number of users: <?php echo $num_rows?>
                </span>
            </div>
            <div class="half-page2" style="background: rgb(8,0,154);
            background: linear-gradient(90deg, rgba(8,0,154,1) 0%, rgba(14,14,156,1) 35%, rgba(0,178,214,1) 100%);">
                <span style="font-size: xx-large; color: white;">
                    Total number of purchases: <?php echo $totalPurchase?>
                </span>
            </div>


            <div class="full-page ">
                <table class="user-table table-sortable">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Phone number</th>
                            <th>Total purchase</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //Retrieve all user info from the database
                        $user_email = "---";
                        $user_firstname = "---";
                        $user_lastname = "---";
                        $user_phone = "---";
                        $user_id;

                        $sql = "SELECT * FROM user_info;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        //Makes sure that the connection was established
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $user_email = $row['user_id'];
                                $user_firstname = $row['user_first'];
                                $user_lastname = $row['user_last'];
                                $user_id = $row['id'];
                                $user_phone = $row['phone1'];

                                $numPurchase = 0; //Unknown
                                $sql1 = "SELECT COUNT(userID) AS num_purchase FROM user_order WHERE userID = '$user_email';";
                                $result1 = mysqli_query($conn, $sql1);
                                $resultCheck1 = mysqli_num_rows($result1);
                                if ($resultCheck1 > 0) {
                                    $row1 = mysqli_fetch_assoc($result1);
                                    $numPurchase = $row1['num_purchase'];
                                }

                                if($user_id != 39){
                                    print("<tr><td>$user_email</td>");

                                    if ($user_firstname != "") {
                                        print("<td>$user_firstname</td>");
                                    } else {
                                        print("<td>---</td>");
                                    }
                                    if ($user_lastname != "") {
                                        print("<td>$user_lastname</td>");
                                    } else {
                                        print("<td>---</td>");
                                    }
                                    if ($user_phone != "") {
                                        print("<td>$user_phone</td>");
                                    } else {
                                        print("<td>---</td>");
                                    }
                                    print("<td>$numPurchase</td></tr>");
                                }
                                $user_email = "---";
                                $user_firstname = "---";
                                $user_lastname = "---";
                                $user_phone = "---";
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>


        </div>
    </main>


    <!-- JS script-->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
    <script src="js/admin.js "></script>
    </body>

    </html>
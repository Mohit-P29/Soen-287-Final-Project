<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Users</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
</head>

<body id="body-id">
    <!-- Header -->
    <?php include("includes/admin_header.php"); ?>

    <main class="main_content">
        <header class="header">
            <ion-icon name="people-outline" class="header-icon"></ion-icon>
            <span class="header-name">Users</span>
        </header>
        <div class="wrapper-grid layout1" id=scroll-1>
            <div class="quarter-page1" style="background: rgb(115,14,197);
            background: linear-gradient(90deg, rgba(115,14,197,1) 0%, rgba(154,92,205,1) 43%, rgba(200,169,225,1) 100%);">
                <span>
                    New users this week:<br /> 2
                </span>

            </div>
            <div class="quarter-page2" style="background: rgb(2,159,1);
            background: linear-gradient(90deg, rgba(2,159,1,1) 0%, rgba(92,205,99,1) 43%, rgba(161,244,171,1) 100%);">
                <span>

                </span>

            </div>
            <div class="quarter-page3" style="background: rgb(255,165,0);
            background: linear-gradient(90deg, rgba(255,165,0,1) 0%, rgba(255,185,58,1) 43%, rgba(255,214,140,1) 100%);">
                <span>
                </span>
            </div>
            <div class="quarter-page4" style="background: rgb(8,0,154);
            background: linear-gradient(90deg, rgba(8,0,154,1) 0%, rgba(14,14,156,1) 35%, rgba(0,178,214,1) 100%);">
                <a href="#">
                    <ion-icon name="add-circle-outline"></ion-icon>
                    <span>Add a user</span>
                </a>

            </div>
            <div class="full-page ">
                <table class="user-table table-sortable">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Total purchase</th>
                            <th># reviews</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>Catriona Beaumont</td>
                            <td>Catriona.Beaumont@concordia.ca</td>
                            <td>10</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>Austin Dillon</td>
                            <td>aDillon@hotmail.com</td>
                            <td>4</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>Jose Walls</td>
                            <td>jose.w@gmail.com</td>
                            <td>6</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>Jenna Salazar</td>
                            <td>salazar@mail.com</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>Samiya Frank</td>
                            <td>SamiyaFrank@yahoo.ca</td>
                            <td>3</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>Lowri Yang</td>
                            <td>Lowri.Yang@gmail.com</td>
                            <td>6</td>
                            <td>0</td>
                        </tr>
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
<?php
session_start();
include 'includes/header.php';
include_once 'includes/ConnectDB.php';
?>
<script>
    document.title = "Product Search Page";

</script>
<link rel="stylesheet" href="css/UserPage.css" />
<main>
<div style="top:150px;left:90px;height:100%;width:100%;padding-left:100px ">
    <form action="" method="post" style="margin-bottom:100px;margin-left:50px;">
        <table style="border-spacing:15px;">
            <tr>
                <td colspan="3" style="text-align:center;font-weight:bold;font-size:2.4em;">Product Search</td>
            </tr>
            <tr>
                <td>
                    <select id="criteria" name="criteria" style="	-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;-moz-box-shadow: 0 7px 4px #777;
	box-shadow: 0 7px 4px #777;border-radius:8px;border-color:gray;;width:80px;height:70px;border:2px solid gray;border-radius:8px;font-size:1.2em;">
                        <option value="all" selected>ALL</option>
                        <option value="mask">Mask</option>
                        <option value="other">Other</option>
                    </select>

                    <select id="sort" name="sort" style="	-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;-moz-box-shadow: 0 7px 4px #777;
	box-shadow: 0 7px 4px #777;border-radius:8px;border-color:gray;;width:120px;height:70px;border:2px solid gray;border-radius:8px;font-size:1.2em;">
                        <option value="Sort" selected disabled hidden>Sort By</option>
                        <option value="htl">From highest price to lowest price</option>
                        <option value="lth">From lowest price to highest price</option>
                        <option value="sales">The most sales</option>
                    </select>


                </td>


                <td><input type="text" placeholder="Search.." class="Inputfield2" style="font-size:1.2em;padding-left:0px;width:630px;height:80px;-webkit-box-shadow: 0 7px 4px #777;
	-moz-box-shadow: 0 7px 4px #777;
	box-shadow: 0 7px 4px #777;border-radius:8px;border-color:gray;;" name="search" required></td>


                <td> <input type="submit" class="UpdateAccount" style="width:150px;height:70px;border-radius:8px;-webkit-box-shadow: 0 7px 4px #777;
	-moz-box-shadow: 0 7px 4px #777;
	box-shadow: 0 7px 4px #777; font-size:1.2em;" value="Search" name="submit_search" value="search" /></td>
            </tr>
            <tr>
                <td colspan="4" style="font-size:0.7;">If the sortby option isn't chosen, the system lists products from the lowest price to highest price by default.</td>
            </tr>
        </table>
    </form>
	<div style="margin-top:10px;margin-left:40px;height:300px;width:70%;overflow:auto;text-align:center;">
    <?php
    if(isset($_POST['submit_search'])){
        $search=(isset($_POST['search']))?$_POST['search']:"";
        $criteria=(isset($_POST['criteria']))?$_POST['criteria']:"";
        $sort=(isset($_POST['sort']))?$_POST['sort']:"";
    //-----------------------------------When sortBy is not chosen------------------------------------------
        if($criteria==='all' && $sort==='' ){
            $sql = "SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY price ASC";
            
               $retval = mysqli_query( $conn,$sql);
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
                  $result=mysqli_num_rows($retval);
   
         if($result>0){
             echo "<div ><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
        
        elseif($criteria==='mask' && $sort==='' ){
            $sql = "SELECT * FROM products WHERE type = 'Mask' and name LIKE '%$search%' ORDER BY price ASC";
                $retval = mysqli_query( $conn,$sql);
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
                  $result=mysqli_num_rows($retval);
   
         if($result>0){
              echo "<div ><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
        
        elseif($criteria =='other' && $sort===''){
            $sql = "SELECT * FROM products WHERE type= 'Other' and name LIKE '%$search%' ORDER BY price ASC";
             $retval = mysqli_query( $conn,$sql);
                
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
         $result=mysqli_num_rows($retval);
   
         if($result>0){
          echo "<div ><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
    //-------------------------------------------Sortby chosen to highest to lowesr------------------------------------------------------------
    
        
       elseif($criteria==='all' && $sort==='htl' ){
            $sql = "SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY price DESC";
            
               $retval = mysqli_query( $conn,$sql);
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
                  $result=mysqli_num_rows($retval);
   
         if($result>0){
            echo "<div ><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
        
        elseif($criteria==='mask' && $sort==='htl' ){
            $sql = "SELECT * FROM products WHERE type = 'Mask' and name LIKE '%$search%' ORDER BY price DESC";
                $retval = mysqli_query( $conn,$sql);
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
                  $result=mysqli_num_rows($retval);
   
         if($result>0){
          echo "<div ><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
        
        elseif($criteria =='other' && $sort==='htl'){
            $sql = "SELECT * FROM products WHERE type= 'Other' and name LIKE '%$search%' ORDER BY price DESC";
             $retval = mysqli_query( $conn,$sql);
                
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
         $result=mysqli_num_rows($retval);
   
         if($result>0){
             echo "<div><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
    //---------------------------------Sortby is chosen to lth--------------------------------------------------------------
      elseif($criteria==='all' && $sort==='lth' ){
            $sql = "SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY price ASC";
            
               $retval = mysqli_query( $conn,$sql);
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
                  $result=mysqli_num_rows($retval);
   
         if($result>0){
          echo "<div ><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
        
        elseif($criteria==='mask' && $sort==='lth' ){
            $sql = "SELECT * FROM products WHERE type = 'Mask' and name LIKE '%$search%' ORDER BY price ASC";
                $retval = mysqli_query( $conn,$sql);
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
                  $result=mysqli_num_rows($retval);
   
         if($result>0){
           echo "<div ><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
        
        elseif($criteria =='other' && $sort==='lth'){
            $sql = "SELECT * FROM products WHERE type= 'Other' and name LIKE '%$search%' ORDER BY price ASC";
             $retval = mysqli_query( $conn,$sql);
                
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
         $result=mysqli_num_rows($retval);
   
         if($result>0){
           echo "<div ><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
        
    //---------------------------------Sortby is chosen to the most sales------------------------------------------------------
       
       elseif($criteria==='all' && $sort==='sales' ){
            $sql = "SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY sales DESC";
            
               $retval = mysqli_query( $conn,$sql);
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
                  $result=mysqli_num_rows($retval);
   
         if($result>0){
          echo "<div><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
        
        elseif($criteria==='mask' && $sort==='sales' ){
            $sql = "SELECT * FROM products WHERE type = 'Mask' and name LIKE '%$search%' ORDER BY sales DESC";
                $retval = mysqli_query( $conn,$sql);
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
                  $result=mysqli_num_rows($retval);
   
         if($result>0){
            echo "<div ><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
        
        elseif($criteria =='other' && $sort==='sales'){
            $sql = "SELECT * FROM products WHERE type= 'Other' and name LIKE '%$search%' ORDER BY sales DESC";
             $retval = mysqli_query( $conn,$sql);
                
         if(! $retval ) {
                   die('Could not get data: ' . mysqli_error());
                    }
  
         $result=mysqli_num_rows($retval);
   
         if($result>0){
             echo "<div ><table style='border-spacing:25px;border:0 nonek;text-align:left;font-size:1.3em;'><tr><th>Name</th><th>Picture</th><th>Sales</th><th>Price</th><th>Created</th></tr>";
          while ( $row = mysqli_fetch_assoc($retval)){
                echo "<tr>";
                echo "<td><a style='text-decoration:underline;' href='".$row['webpageLink']."'>".$row['name']."</a></td>";
                echo "<td><img width='80px' height='60px' src='".$row['image1']."'/></td>";
               
                echo "<td>".$row['sales']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['created']."</td>";
                echo  "</td></tr>";
              
               
          
              }
              echo "</table></div>";
             }
            else{
                echo "<div style='font-size:2.0em;'>No Results Found</div>";
            }
            }
      
    
    
   //-----------------------------------------------------------------------------------------------------------------   
    
     
    
    }
        
    ?>
<<<<<<< HEAD
=======
	</div>


>>>>>>> cb11481f0cbb11654b91797b70bfb28db1d2af83
</div>
</main>
</body>
</html>


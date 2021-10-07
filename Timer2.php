<?php
 session_start();

$_SESSION['timer']=(isset($_SESSION['timer']))?$_SESSION['timer']:time();					
if(time()-$_SESSION['timer']>=30){
  unset($_SESSION['timer']);	
  //code to clear all items in the cart
  echo "<script>alert('Time is out.Directing to Home Page');</scipt>";
  header("Location: index.php");
  exit();
}
//Each time when user enters the shopping cart, we will count the remaining time.
$remaining_time=30-(time()-$_SESSION['timer']);


?>
<html>
<!--Container of timer-->
<p style="border:thick solid red; width:500px; height:50px; font-weight:bold;text-align:center;color:red;font-size:1.2em;padding-top:10px;" id="timer">

</p>


</html>
<script>
	var element = document.getElementById('timer');
	var counter = <?php echo $remaining_time; ?>;
	var terminate = false;
	var no_extension = false;
	//set the timer
	var x = setInterval(function() {
			if (terminate != true) {
				//timer to 0
				if (counter <= 0) {
					terminate = true;
				}
				if (!no_extension && counter <= 15) {
					if (confirm("Do you want to extend the session?")) {
						window.location.href = 'Extend_timer.php';
						no_extension = true;
					} else {
						no_extension = true;
					}
				}

				var minutes = parseInt(counter / 60);
				var seconds = counter - 60 * (minutes);

				//timer counts down
				element.innerHTML = 'Remaining time to check out ' + minutes + '   m  ' + seconds + '  s  ';
				counter -= 1;
			}

			//reload to activate php code.
			else {
				window.location.reload();
			}
		},
		1000);

</script>

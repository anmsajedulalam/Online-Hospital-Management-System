<html>
<head>
<title>DOCTOR INFROMATION</title>
<style>
     
</style>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/stylesheet-pure-css.css">
</head>

<body>

	<header class="hdr">
       <img src="logo.png" alt="Logo" height=50 width=50>
       <h3> Hospital Management System</h3>
       <p class="nav_stuff">Welcome! <a href="index.php" class="hvr-float-shadow">Sign out</a>  <a href="index.php" class="hvr-float-shadow">Sign in</a></p>
    </header>


    <div id='cssmenu'>
<ul>
   <li><a href='target.php' class="hvr-float-shadow"><span>Home</span></a></li>
   <li class='has-sub'><a href='#' class="hvr-float-shadow"><span>Doctors</span></a>
      <ul>
         <li><a href='docinfo.php' class="hvr-float-shadow"><span>Doctor's List</span></a></li>
         <li><a href='adddoctor.php' class="hvr-float-shadow"><span>Add Doctor</span></a></li>
         <li><a href='rmv_doc.php' class="hvr-float-shadow"><span>Remove Doctor</span></a></li>
         <li><a href='addbill.php' class="hvr-float-shadow"><span>Supervise</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#' class="hvr-float-shadow"><span>Nurse</span></a>
      <ul>
         <li><a href='ninfo.php' class="hvr-float-shadow"><span>Nurse's List</span></a></li>
         <li><a href='addnurse.php' class="hvr-float-shadow"><span>Add Nurse</span></a></li>
         <li class='last' class="hvr-float-shadow"><a href='#'><span>Remove Nurse</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#' class="hvr-float-shadow"><span>Patient</span></a>
      <ul>
         <li><a href='admit.php' class="hvr-float-shadow"><span>Get Admited</span></a></li>
         <li><a href='hospital.php' class="hvr-float-shadow"><span>Get Appointment</span></a></li>
         <li class='last' ><a href='addbill.php'class="hvr-float-shadow"><span>Get Bill</span></a></li>
      </ul>
   </li>
   <li><a href='#' class="hvr-float-shadow"><span>About</span></a></li>
   <li class='last' ><a href='#' class="hvr-float-shadow"><span>Contact</span></a></li>
</ul>
</div>

<?php
       require_once('vars.php');

		$dbc = mysql_connect($HOSTNAME, $USER, $PASSWORD) or die('error connecting');
		
			
		mysql_select_db($DBNAME) or die('db select error');

		  $eid = $_GET['eid'];


		  ?>

	      <h3>Nurse's Information</h3> <br>

	    <?php

      $query="SELECT * FROM employee INNER JOIN nurse ON employee.eid = nurse.eid where employee.eid = '$eid'";
			
			$row=mysql_query($query) or die(mysql_error($dbc));
			
			   $val=mysql_fetch_array($row);
				
				echo '<b>Name:</b>'.$val['name'] . '<br><b>ID:</b>  ' .$val['eid'].'<br><b>Expirence:</b>   '. $val['experience'] . '<br><b>Diploma:</b>   ' . $val['diploma'] .'<br><b>Address:</b>   '. $val['address'].'<br><b>Phone Number:</b>   '.$val['phone_num'].  '<br>';

				 ?>
                    <h4>Govering Room List</h4><br>
                    <table cellpadding="0" cellspacing="0" class="db-table">
                    <tr>
                       <th>Room Number</th>
                       <th>Entry Date</th>
                       <th>Release Date</th>
                       <th>Cost Per Day</th>
                       <th>Patient Name</th>
                       <th>More Informations</th>
                   </tr>
    
        <?php

        $query = "SELECT r.*, p.pname as pname from room r join patient p on p.pid = r.pid where r.eid = '$eid'";

			$result =mysql_query($query) or die(mysql_error($dbc));

			while($val = mysql_fetch_array($result)){

				echo'<tr><td>'. $val['room_no'].'</td><td>  '.$val['entry_date']. ' </td><td> ' .$val['release_date'].' </td><td> ' .$val['cost_per_day'].' </td><td> ' .$val['pname'].'</td><td>'.'<a href="pdetails.php?pid='. $val['pid'].'">paitent details</a>'.'</td></tr><br>' ;
			}



?>

</table>

</body>

</html>
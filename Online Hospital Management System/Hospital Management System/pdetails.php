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
       <p class="nav_stuff">Welcome! <a href="index.php" class="hvr-float-shadow">Sign out</a></p>
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

		  $pid = $_GET['pid'];

		  

	      
	
	 ?>
                    <h4>Patient Information</h4><br>
    
        <?php
			


			$query = "SELECT *  from  patient where pid = '$pid'";

			$result=mysql_query($query) or die(mysql_error($dbc));

			
               $val=mysql_fetch_array($result);
              
				echo '<b>Name: </b>'.$val['pname'] . ' <br> ' .'<b>Sex: </b>'.'  '.$val['sex'].' <br> '.'<b>Blood Type: </b>'. $val['blood_type'] . ' <br> ' .'<b>Height: </b>'.$val['height']. '<br>  ' .'<b>Weight: </b>'.$val['weight']. '<br>  ' .'<b>Address: </b>'.$val['address']. ' <br> ' .'<b>Phone Number: </b>'.$val['phone_no'].  '<br>';

 ?>
                    <h4>Disease List</h4><br>
                    <table cellpadding="0" cellspacing="0" class="db-table">
                    <tr>
                    <th>Patient Name</th>
                    <th>Medicine Name</th>
                    </tr>

    
        <?php

				$query = "SELECT *  from  disease where pid = '$pid'";

			$result=mysql_query($query) or die(mysql_error($dbc));

			while($val = mysql_fetch_array($result)){

				echo '<tr><td>'.$val['dname'] . '</td><td>  ' .$val['cure'].'</td></tr>';
			
              }

               ?>
                </table>
                    <h4>Medicine List</h4><br>
                    <table cellpadding="0" cellspacing="0" class="db-table">
                    <tr>
                    <th>Medicine</th>
                    <th>Cost</th>
                    <th>Supervising Doctor</th>
                    <th>More Information</th>
                    </tr>
    
        <?php
			$query = "SELECT mname, mcost,employee.name as name,employee.eid as eid from medicine inner join patient on patient.pid = medicine.pid inner join employee  on employee.eid = medicine.eid where medicine.pid = '$pid'";

			$result =mysql_query($query) or die(mysql_error($dbc));

			while($val = mysql_fetch_array($result)){

				echo '<tr><td>'.$val['mname'].' </td><td> '.$val['mcost']. ' </td><td> ' .$val['name'].' </td><td> '.'<a href="docdetails.php?eid='. $val['eid'].'">Doctor details</a>'.'</td></tr>' ;
			}

			 ?>
			</table>
                    <h4>Service List</h4><br>

                
                    <table cellpadding="0" cellspacing="0" class="db-table">
                    <tr>
                    <th>Service</th>
                    <th>Cost</th>
                    <th>Supervising Doctor</th>
                    <th>More Information</th>
                    </tr>
    
        <?php

			$query = "SELECT sname, scost,employee.name as name,employee.eid as eid from service join patient on patient.pid = service.pid join employee on employee.eid = service.eid where service.pid = '$pid'";

			$result =mysql_query($query) or die(mysql_error($dbc));

			while($val = mysql_fetch_array($result)){

				echo '<tr><td>'.$val['sname'].' </td><td> '.$val['scost']. ' </td><td> ' .$val['name'].' </td><td> '.'<a href="extention.php?eid='. $val['eid'].'">Doctor details</a>'.'</td></tr>' ;
			}

			 ?>
			         </table>
                    <h4>Room Information</h4><br>
                  
                    <table cellpadding="0" cellspacing="0" class="db-table">
                    <tr>
                    <th>Room Number</th>
                    <th>Entry Date</th>
                    <th>Release Date</th>
                    <th>Cost per Day</th>
                    <th>Governing Nurse</th>
                    <th>More Information</th>
                    </tr>
        <?php

			$query = "SELECT r.*, e.name as name, e.eid as eid from room r join employee e on e.eid = r.eid where r.pid = '$pid'";

			$result =mysql_query($query) or die(mysql_error($dbc));

			$val = mysql_fetch_array($result) or die(mysql_error($dbc));

				echo '<tr><td>'.$val['room_no'].' </td><td> '.$val['entry_date']. '  </td><td>' .$val['release_date'].' </td><td> ' .$val['cost_per_day'].'  </td><td>' .$val['name'].' </td><td>'.'<a href="ndetails.php?eid='. $val['eid'].'">Nurse details</a>'.'</td></tr>' ;
			



		

			//mysql_close($dbc);




?>

                     </table>

</body>

</html>
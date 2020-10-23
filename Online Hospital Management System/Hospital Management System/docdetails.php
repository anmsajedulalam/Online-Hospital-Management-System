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

		  $eid = $_GET['eid'];

		  ?>

	      <h3>Doctor's Information</h3> <br>

	    <?php
			$query="SELECT * FROM employee INNER JOIN doctor ON employee.eid = doctor.eid where employee.eid = '$eid'";
			
			$row=mysql_query($query) or die(mysql_error($dbc));
			
			   $val=mysql_fetch_array($row);
				
				echo "<b>Name:</b>".$val['name'] . ' <br> <b>ID:</b> ' .$val['eid'].'<br><b>Designated Room:</b>  '. $val['droom'] . ' <br><b>Speciality:</b> ' . $val['specialty'] .'<br><b>Address:</b>  '. $val['address'].' <br><b>Phone Number:</b> '.$val['phone_num'].  '<br>';
			
           ?>
                    <h4>Appointment List</h4><br>
<table cellpadding="0" cellspacing="0" class="db-table">
                    <tr>
                       <th>Patient's Name</th>
                       <th>Sex</th>
                       <th>Blood Type</th>
                       <th>More Information</th>
                   </tr>
    
        <?php


			$query = "SELECT patient.pid as pid,pname , sex,blood_type from appointment_with JOIN patient on appointment_with.pid = patient.pid where eid = '$eid'";

			$result=mysql_query($query) or die(mysql_error($dbc));

			while($val = mysql_fetch_array($result)){              
             echo '<tr>';
				echo '<td>'.$val['pname'] . '</td><td>  ' .$val['sex'].' </td><td>  '. $val['blood_type'] . '</td><td>   ' .'<a href="pdetails.php?pid='.$val['pid'].'" >Details</a>'.  '</td><br>';
				echo '</tr>';
			}

			?>

       </table>
       
             <h4>Supervising Medicine</h4><br>

             <table cellpadding="0" cellspacing="0" class="db-table">
                    <tr>
       <th>Patient Name</th>
       <th>Medicine Name</th>
     </tr>

             <?php


			$query = "SELECT mname, patient.pname as pname from medicine join patient on patient.pid = medicine.pid where eid = '$eid'";

			$result =mysql_query($query) or die(mysql_error($dbc));

			while($val = mysql_fetch_array($result)){
                 
				echo '<tr><td>'.$val['pname'].'</td><td>'.$val['mname'].'</td></tr>' ;
			}

			?>

           </table>
           <h4>Supervising Service</h4><br>
            <table cellpadding="0" cellspacing="0" class="db-table">
                    <tr>
                   <th>Patient Name</th>
                  <th>Medicine Name</th>
                  </tr>           
			<?php

			$query = "SELECT sname, patient.pname as pname from service JOIN patient on patient.pid = service.pid where eid = '$eid'";

			$result =mysql_query($query) or die(mysql_error($dbc));

			while($val = mysql_fetch_array($result)){

				echo '<tr><td>'. $val['pname'].'</td><td>  '.$val['sname'].'</td></tr><br>' ;
			}



		

			//mysql_close($dbc);

    


?>
</table>



</body>

</html>
<html>
<head>
<title>Nurse INFROMATION</title>
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

	         echo '<h3>Nurse List</h3>'.'<br>';
	          ?>
 <table cellpadding="0" cellspacing="0" class="db-table">
     <tr>
       <th>Nurse's Name</th>
       <th>Nurse's ID</th>
       <th>More Information</th>
     </tr>

	        <?php
	
			$query='SELECT employee.eid AS eid, name, experience, diploma FROM employee INNER JOIN nurse ON employee.eid = nurse.eid';
			
			$row=mysql_query($query) or die(mysql_error($dbc));
			
			while($val = mysql_fetch_array($row))
			{

				 
				echo '<tr><td>' .$val['name'] . '</td><td>' .$val['eid']. '</td><td>' .'<a href="ndetails.php?eid='. $val['eid'].'">detail</a>'.'</td></tr>';
			}

			//mysql_close($dbc);


?>
</table>



</body>

</html>
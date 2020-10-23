<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title> 
<style type="text/css">
	table, th, td, tr{
		border: inset;
		text-align: center;
		font-size: 120%;
		font-family: fantasy;
		padding: 10px;

	}

	form{
		margin-top: 10%;
		margin-left: 30%;
		
		padding: 10px;		
	}

	input[type=submit]
	{

		font-size: 120%;
		font-family: fantasy;

	}

	.error{

		font-family: monospace;
		color: red; 
		margin-left: 30%;
		margin-right: 43%;
		padding: 10px;	
		font-size: 120%;
	}

</style>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/stylesheet-pure-css.css">

</style>
</head>

<body>

	<?php
		require_once('vars.php');
		$dbc = mysql_connect($HOSTNAME, $USER, $PASSWORD) or die('error connecting');
			
				
		mysql_select_db($DBNAME);

		
		if(isset($_POST['submit']))
		{
			$name = $_POST['id'];
			$password = $_POST['password'];

			$query="SELECT * FROM employee WHERE eid = '$name'";
			$result = mysql_query($query) or die('error here');

			if(mysql_num_rows($result) == 1)
			{

				$row = mysql_fetch_array($result);	

				$val = $row['name'];
				setcookie('name', '$val', 3600 * 24);
				$_COOKIE['name'] = $val;
				//echo $_COOKIE['name'];
				$query="SELECT * FROM doctor WHERE '$name' = doctor.eid";
				
				$result = mysql_query($query) or die(mysql_error($dbc));
				
				if(mysql_num_rows($result) == 1)
				{
					//$i = $result['eid'];
					$query="INSERT INTO login(id, password, job) VALUES('$name', SHA('$password'), 'doctor')";
				
					$result = mysql_query($query) or die(mysql_error($dbc));
				
					setcookie('doctor', '1');
					echo 'logged in as ' . $_COOKIE['name'];
					echo 'here';
					header("Location: http://localhost/target.php");
				}
				else
				{


					$query="INSERT INTO login(id, password, job) VALUES('$name', SHA('$password'), 'nurse')";
 				
					$result = mysql_query($query) or die(mysql_error($dbc));
				
					setcookie('doctor', '1');
					header("Location: http://localhost/target.php");
				}
			}
			else
			{
				echo "<p class='error'>Must use valid user id</p>"; 
			}


		}
	?>


	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<table width:="50%">
    <tbody>
      <tr>
        <td>
			<label for="id">Give id:</label>
			</td><td>
			<input type="text" name="id" id="id"/>
			</td></tr><tr><td>
			<label for="password">Give Password:</label>
			</td><td>
			<input type="password" name="password" id="password"/>
			</td></tr>
		</td>
	</tr>


		
	</tbody>
 </table>


<input type="submit" name="submit" id="submit"/>


</form>


</body>




</html>
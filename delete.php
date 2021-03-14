<html>
<style>
.card_image{
  height:600px;
  width:800px;
  float:left;
  margin-left:40px;
}
.container_main{
  align-items:center;
}
.container_right{
  text-align: center;
}
body{
  background-color:rgb(222, 226, 227);
}
tr.odd{
  background-color: #efefef;
}
tr:hover{
  background-color: #c3e6e5;
}

</style>
<body>
 <img src="plant.png" class="card_image" />
<?php
$servername = "localhost";
$username = "root";
$password = "Shivam@18213";
$dbname = "regestration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, firstname, lastname, occupation , need FROM users";
$result = $conn->query($sql);
?>

<table width="500" border="5" cellspacing="5" cellpadding="2" align ="center">
	
	<?php
	if (mysqli_num_rows()> 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {    
	?>		

	  <tr>
		<td>ID</td>
		<td><?php echo $row["id"]; ?></td>
		<td><a href="deluser.php?id=<?php echo $row["id"] ?>">Delete</a></td>
	  </tr>
	  <tr>
		<td>First Name</td>
		<td><?php echo $row["firstname"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td>Last Name</td>
		<td><?php echo $row["lastname"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td>OCCUPATION</td>
		<td><?php echo $row["occupation"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
	   <tr>
		<td>NEED TYPE</td>
		<td><?php echo $row["need"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
	  
		
	<?php	
		} 
	?>
		</table>	
<?php	
	} else {
			echo "0 results";
	}

	
$conn->close();
?>


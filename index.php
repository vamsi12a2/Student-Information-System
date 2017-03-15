<html>
<head>
<link rel="stylesheet" type="text/css" href="Style-1.css" media="screen"/>
</head>
<body id="top">
<?php
	$name=$pass=$err=$radio=$type="";
	$host="localhost";
	$username="vamsi";
	$password="vamsi";
	$dbname="login";
	$conn=new mysqli($host,$username,$password,$dbname);
		if($conn->connect_error)
		{
			$err="Unable to connect to server.Try later..";
			die("Connect Error!".$conn->connect_error);
		}
	if($_SERVER['REQUEST_METHOD']== "POST")
	{
		$name=test($_POST["uname"]);
		$pass=test($_POST["pass"]);
		$sql="SELECT type from student WHERE id='$name' AND pass='$pass'";
		$result = $conn->query($sql);
		if($result->num_rows > 0 && isset($_POST["rad"]) ) 
		{
			$x=$result->fetch_assoc();
			$radio=$_POST["rad"];
			if($radio == $x["type"])
			{ header('Location:/Project-V/apply.php');}
			else
			{ $err="Invalid Option ,Please select correct option"; }
		}
		else if($result->num_rows<=0 )
		{
			$err="Invalid User id or Password";
		}
		else
		{$err="Select one of the options".$radio."".$type; }
			
	}
	function test($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
?>

	<center>
		<div class="main">
			<table border="0" cellpadding="0" cellspacing="0">
			<tr>
			<td width="2000" height="100" background="./images/photo3.jpg"><font size="+3" color="white" family="Arial"><center>User Login Interface</center></font></td>
			</tr>
			</table>
			<div class="login" >
			<p class="header_login_up" style="color:white;">Login</p>
			<form class="vertical" name="form1" action="/Project-V/index.php" method="POST" onsubmit="return val()">
			<table class="table1" align="centre" border="0" cellpadding="0" cellspacing="0">
			<tr><td><h4 style="background-color:#E6E6FF">User Id:</h4></td>
			<td><input type="text" size="22" placeholder="User Id..." name="uname" style="height:22px;"></td></tr>
			<tr><td><h4  style="background-color:#E6E6FF">Password:</h4></td>
			<td ><input type="password" size="22" placeholder="Password..." name="pass" style="height:22px;"></td></tr>
			<tr><td><h4 style="background-color:#E6E6FF;">Login as:</h4></td><td style="padding-top:5px;float:center;">&nbsp;<input type="radio" name="rad" value="student"><b>&nbsp;Student</b>&nbsp;&nbsp;<input type="radio" name="rad" value="mentor"><b>&nbsp;Mentor</b><br><br></td></tr>
			<tr><td></td><td><input type="submit" class="button grey" name="submit" value="Log in">&nbsp;&nbsp;or&nbsp;&nbsp;<a href="/project/register"><b>Register</b></a></td></tr>
			<tr height="5"></tr>
			<tr><td></td><td><span style="color:red;float:right;padding-top:3px;"><center><?php echo $err;?></center></span></td></tr>
			</table>
			</form>
			<p class="header_login_down"></p>
			</div>
		</div>
	</center>
</body>
</html>
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
			{ $err="Invalid Option ! Please select correct option"; }
		}
		else if($result->num_rows<=0 )
		{
			$err="Invalid User id or Password !";
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
			<div class="header">
			<h1 style="background-color:grey;float:left;padding-left:530px;">Student Information System</h1>
			</div>
			<div class="new">
			<form class="vertical" name="form1" action="/Project-V/ind.php" method="POST" onsubmit="return val()">
			<table class="table1" align="centre" border="0" cellpadding="0" cellspacing="0">
			<tr><th><h3 style="float:center;font-family:Helvetica Neue;font-size:25pt;color:#535353">Login</h3></th></tr>
			<tr><td><input type="text" size="35"  placeholder=" User Id" name="uname" style="height:30px;font-family:sans-serif;"></td></tr>
			<tr>
			<td ><input type="password" size="35"  placeholder=" Password" name="pass" style="height:30px;margin-top:10px;font-family:sans-serif;"></td></tr>
			<tr><td style="padding-top:15px;float:center;">&nbsp;<input type="radio" name="rad" value="student"><b>&nbsp;Student</b>&nbsp;&nbsp;<input type="radio" name="rad" value="mentor"><b>&nbsp;Mentor</b><br><br></td></tr>
			<tr><td>&nbsp;&nbsp;<input type="submit" class="button grey" name="submit" value="Log in" style="float:center;color:black;"></td></tr>
			<tr><td style="padding-top:10px;"><b>New Member? Register&nbsp;</b><a href="/Project-V/register"><b>here</b></a></td></tr>
			<tr height="15"></tr>
			<tr><td><span style="color:red;float:center;padding-top:3px;margin-top:10px;"><b><?php echo $err;?></b></span></td></tr>
			</table>
			</form>
			</div>
		</div>
	</center>
</body>
</html>
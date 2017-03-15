<html>
<head>
<link rel="stylesheet" type="text/css" href="Style-1.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="Style-2.css" media="screen"/>
</head>
<body >
<?php
	$host="localhost";
				$username="vamsi";
				$password="vamsi";
				$dbname="login";
				$type="student";
				$conn=new mysqli($host,$username,$password,$dbname);
				if($conn->connect_error)
				{
					$err="Unable to connect to server.Try later..";
					die("Connect Error!".$conn->connect_error);
				}
				/*$sql="SELECT * FROM student WHERE";
				if($conn->query($sql) === TRUE)
				{
					header('Location:/Project-V/apply.php');
				}
				else
				{
					$err="Database Error" ." ". $conn->error. " ". $sem;
				}*/
?>
	<center>
		<div class="main">
			<div class="header">
			<h1 style="background-color:grey;float:left;padding-left:530px;">Student Information System</h1>
			</div>
			<div class="menu">
				<table  border="0" cellpadding="0" cellspacing="0">
					<tr>
					<td width="2000" height="40" bgcolor="grey";><a href="/Project-V/fapply.php" style="text-decoration:none;color:white;float:left;padding-left:15px;">My Profile</a></td>
					<td width="2000" height="40" bgcolor="grey";><a href="/Project-V/fedit.php" style="text-decoration:none;color:white;float:left;padding-left:160px;">Edit Profile</a></td>
					<td width="2000" height="40" bgcolor="grey";><a href="/Project-V/request.php" style="text-decoration:none;color:white;float:left;padding-left:160px;">View Requests</a></td>
					<td width="2000" height="40" bgcolor="grey";><a href="/Project-V/ind.php" style="text-decoration:none;color:white;float:right;padding-right:15px;padding-left:160px;">logout</a></td>
					</tr>
				</table>
			</div>
			<div class="content">
			<center><b><h1 style="color:#535353;font-family:times new roman;">Profile Details</h1></b></center>
			<table class="table_content table1" align="center" border="0">
			<tr><td width="160px" height="30px" class="td2"><b>Name:</b></td><td  class="td21"><input type="text" style="width:400px;height:25px;padding-left:4px;"value="T Vamsi Krishna"/></td></tr>
			<tr><td class="td2"><b>Gender:</b></td><td  class="td21"><input type="text" style="width:400px;height:25px;padding-left:4px;"value="Male"/></td></tr>
			<tr><td class="td2"><b>Course:</b></td><td  class="td21"><input type="text" style="width:400px;height:25px;padding-left:4px;"value="BTech"/></td></tr>
			<tr><td class="td2"><b>Year of Passing:</b></td><td  class="td21"><input type="text" style="width:400px;height:25px;padding-left:4px;"value="2016"/></td></tr>
			<tr><td class="td2"><b>College:</b></td><td  class="td21"><input type="text" style="width:400px;height:25px;padding-left:4px;"value="Vardhaman College Of Engineering"/></td></tr>
			<tr><td class="td2"><b>Aggregate:</b></td><td  class="td21"><input type="text" style="width:400px;height:25px;padding-left:4px;"value="74.4"/></td></tr>
			<tr><td class="td2"><b>Skills:</b></td><td  class="td21"><input type="text" style="width:400px;height:25px;padding-left:4px;"value="C,java,C#,php,jquery etc.."/></td></tr>
			</table>
			<a href="/Project-V/fapply"><input type="button" class="button grey" onClick="" value="Done"/></a><br/><br/>
			<p style="color:blue;"><b>Note:</b>&nbsp;The details that are edited are subjected to verification of the administrator.The profile details are not effected until administrator confirm the changes.</p>
			</div>
		</div>
	</center>
</body>
</html>
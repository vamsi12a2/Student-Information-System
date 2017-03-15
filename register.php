<html>
<head>
<link rel="stylesheet" type="text/css" href="Style-1.css" media="screen"/>
</head>
<body id="top">
<?php
	$id=$pass=$err=$name=$branch=$section=$sem=$btech=$ssc=$inter=$mail=$phone=$repass="";
	$ierr=$perr=$rperr=$nerr=$berr=$serr=$semerr=$bterr=$sserr=$inerr=$merr=$pherr="";
	if($_SERVER['REQUEST_METHOD']== "POST")
	{
		$id=$pass=$err=$name=$branch=$section=$sem=$btech=$ssc=$inter=$mail=$phone=$repass="";
		$ierr=$perr=$rperr=$nerr=$berr=$serr=$semerr=$bterr=$sserr=$inerr=$merr=$pherr="";
		$id=test($_POST["uname"]);
		$pass=test($_POST["pass"]);
		$repass=test($_POST["repass"]);
		$name=test($_POST["name"]);
		$branch=test($_POST["branch"]);
		$section=test($_POST["section"]);
		$sem=test($_POST["semester"]);
		$btech=test($_POST["tech"]);
		$ssc=test($_POST["ssc"]);
		$inter=test($_POST["inter"]);
		$mail=test($_POST["mail"]);
		$phone=test($_POST["phone"]);
		if($id == "")
			$ierr="* Id is required !";
		if($pass == "")
			$perr="* Password is required !";
		if($repass == "")
			$rperr="* Password is required !";
		if($pass != $repass)
			$rperr="* Passwords didn't is required !";
		if($name == "")
			$nerr="* Name is required !";
		if($branch == "")
			$berr="* Branch is required !";
		if($section == "")
			$serr="* Section is required !";
		if($sem == "")
			$semerr="* Semester is required !";
		if($btech == "")
			$bterr="* Aggregate is required !";
		if($ssc== "")
			$sserr="* SSC/Equivalent Percentage is required !";
		if($inter == "")
			$inerr="* Intermediate/Equivalent Percentage is required !";
		if($mail == "")
			$merr="* Email Id is required !";
		if($phone == "")
			$pherr="* Contact Number is required !";
		if($ierr == "" && $perr == "" && $rperr == "" && $nerr == "" && $berr == "" && $serr == "" && $semerr == "" && $sserr == "" && $inerr == "" && $merr == "" && $pherr == "")
		{
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
				$sql="INSERT INTO student (id,pass,type,name,branch,section,semester,btech,ssc,inter,mail,phone) VALUES ('$id','$pass','$type','$name','$branch','$section','$sem',$btech,$ssc,$inter,'$mail',$phone)";
				if($conn->query($sql) === TRUE)
				{
					header('Location:/Project-V/apply.php');
				}
				else
				{
					$err="Database Error" ." ". $conn->error. " ". $sem;
				}
		}
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
			<form class="vertical" name="form1" action="/Project-V/register.php" method="POST" onsubmit="return val()">
			<table class="table1" align="centre" border="0" cellpadding="0" cellspacing="0">
			<tr><th><h3 style="float:left;font-family:Helvetica Neue;font-size:25pt;color:#535353">Student Registration</h3></th></tr>
			<tr><td><input type="text" size="35"  placeholder=" User Id" name="uname" value="<?php echo $id;?>" style="height:30px;font-family:sans-serif;"><span style="color:red;padding:2px;"><?php echo $ierr;?></span></td></tr>
			<tr><td ><input type="password" size="35"  placeholder=" Password" name="pass" value="<?php echo $pass;?>" style="height:30px;margin-top:10px;font-family:sans-serif;"><span style="color:red;padding:2px;"><?php echo $perr;?></span></td></tr>
			<tr><td ><input type="password" size="35"  placeholder=" Retype-Password" name="repass" value="<?php echo $repass;?>" style="height:30px;margin-top:10px;font-family:sans-serif;"><span style="color:red;padding:2px;"><?php echo $rperr;?></span></td></tr>
			<tr><td ><input type="text" size="35"  placeholder=" Name" name="name" value="<?php echo $name;?>" style="height:30px;margin-top:10px;font-family:sans-serif;"><span style="color:red;padding:2px;"><?php echo $nerr;?></span></td></tr>
			<tr><td ><select placeholder="branch" name="branch" value="<?php echo $branch;?>" style="height:30px;margin-top:10px;font-family:sans-serif;width:200px;background-color:#FDFDFD"><option>ECE</option><option>EEE</option><option>CSE</option><option>IT</option><option>MECH</option><option>CIVIL</option><option>AERO</option></select><select placeholder="section" name="section" style="height:30px;margin-top:10px;font-family:sans-serif;margin-left:20px;width:58px;background-color:#FDFDFD"><option>A</option><option>B</option><option>C</option><option>D</option><option>E</option></select></td></tr>
			<tr><td><select placeholder="semester" name="semester" value="<?php echo $sem;?>" style="height:30px;margin-top:10px;font-family:sans-serif;width:280px;background-color:#FDFDFD"><option>I semester</option><option>II semester</option><option>III semester</option><option>IV semester</option><option>V semester</option><option>VI semester</option><option>VII semester</option><option>VIII semester</option></select></td></tr>
			<tr><td ><input type="text" size="35"  placeholder=" B.tech Aggregate" name="tech" value="<?php echo $btech;?>" style="height:30px;margin-top:10px;font-family:sans-serif;"><span style="color:red;padding:2px;"><?php echo $bterr;?></span></td></tr>
			<tr><td ><input type="text" size="35"  placeholder=" SSC/Equivalent Percentage" name="ssc" value="<?php echo $ssc;?>" style="height:30px;margin-top:10px;font-family:sans-serif;"><span style="color:red;padding:2px;"><?php echo $sserr;?></span></td></tr>
			<tr><td ><input type="text" size="35"  placeholder=" Intermediate/Eqivalent Percentage" name="inter" value="<?php echo $inter;?>" style="height:30px;margin-top:10px;font-family:sans-serif;"><span style="color:red;padding:2px;"><?php echo $inerr;?></span></td></tr>
			<tr><td ><input type="text" size="35"  placeholder=" Email Id" name="mail" value="<?php echo $mail;?>" style="height:30px;margin-top:10px;font-family:sans-serif;"><span style="color:red;padding:2px;"><?php echo $merr;?></span></td></tr>
			<tr><td ><input type="text" size="35"  placeholder=" Contact Number" name="phone" value="<?php echo $phone;?>" style="height:30px;margin-top:10px;font-family:sans-serif;"><span style="color:red;padding:2px;"><?php echo $pherr;?></span></td></tr>
			<tr><td><input type="submit" class="button grey" name="submit" value="Register" style="float:center;color:black;margin-top:15px;"><a href="/Project-V/ind.php"><input type="button" class="button grey" name="cancel" value="Cancel" style="float:center;color:black;margin-top:15px;margin-left:10px;"></a></td></tr>
			<tr height="15"></tr>
			<tr><td><span style="color:red;float:center;padding-top:3px;margin-top:10px;"><b><?php echo $err;?></b></span></td></tr>
			</table>
			</form>
			</div>
		</div>
	</center>
</body>
</html>
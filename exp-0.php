<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="Style-1.css" media="screen"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!--<script>
function fun()
{
var userv=document.forms[0].uname.value;
var pwdv=document.forms[0].pass.value;
var userreg=new RegExp("^[0-9a-zA-Z]*$");
var ruser=userreg.exec(userv);
if(ruser  && (pwdv.length > 2))
{
return true;
}
else
{
if(!ruser) { alert("username invalid");document.forms[0].uname.focus();}
if(pwdv.length < 2) { alert("password invalid");document.forms[0].pass.focus();}
return false;
}
}
</script>-->
<style>
#loading {
	position: fixed;
	left: 0px;
	top: 0px;
	bottom:0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('images/page-loader.gif')  50% no-repeat rgb(249,249,249);
}
.navbar
{height:10%;}
.panel
{
 box-shadow: 0px 0px 3px #000000 inset;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$("#loading").fadeOut("slow");
})
</script>
<script type="text/javascript">
function ticker() {
    $('#ticker li:first').slideUp(function() {
        $(this).appendTo($('#ticker')).slideDown();
    });
}
setInterval(ticker, 3000);
</script>
<style>
body{font-family:Lora;}
.ticker {
width: 300px;
height: 450px;
overflow: hidden;
border: 1px solid #DDD;
background-color:#FAFAFA;
border-radius: 5px;
box-shadow: 0px 0px 5px #DDD;
text-align: left;
color:black;
}
.ticker h3 {
padding: 0 0 10px 10px;
border-bottom: 1px solid #A7A7A7;
}
ul {
list-style: none;
padding: 0;
margin: 0;
font-family:sans-serif;
font-size:13;
font-style:none;
}
ul li {
list-style: none;
height:80px;
padding:7px;
border-bottom: 1px solid #D6CFB8;
}
</style>
</head>
<?php
	ini_set('error_reporting',0);
	session_start();
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
		$sqq="SELECT type from admin WHERE id='$name' AND pass='$pass'";
		$result = $conn->query($sql);
		$res = $conn->query($sqq);
		if($result->num_rows > 0) 
		{
			$_SESSION["user_id"]=$name;
			header('Location:/backup-1/exp-2.php');
		}
		else if($res->num_rows > 0 )
		{
			$_SESSION["user_id"]=$name;
			header('Location:/backup-1/exp-5.php');
		}
		else
		{
				$err="Invalid User id or Password !";
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
<body>
	<div id="loading" align="center">
		<img src="/backup-1/images/loading.gif" alt="loading"/>
	</div>
	<div class="container-fluid responsive" style="margin-left:0px;margin-right:0px;">
		<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a class="btn" href="exp-0.php">SIGN IN / SIGN UP</a></li>
				</ul>
			</div>
		</div>
		</div> 
		<div class="panel panel-default" style="margin-top:12%;width:32%;height:50%;margin-left:34%;border-radius:9px 9px 9px 9px;">
			<div class="panel heading" style="background-color:#007CCF;color:white;border-radius:3px 3px 0px 0px;"><center><h2>Sign In</h2></center></div>
			<div class="panel-body">
			<form role="form" name="form1" action="/backup-1/exp-0.php" method="POST" onsubmit="return fun()" style="margin-top:3%;margin-left:10%;float:left;">
			<div class="form-group has-feedback"><i class="glyphicon glyphicon-user form-control-feedback"></i><input type="text" size="40%"  placeholder=" User Id" name="uname" style="height:11%;font-family:sans-serif;border-radius:4px 4px 4px 4px;"></div>
			<div class="form-group has-feedback"><i class="glyphicon glyphicon-lock form-control-feedback"></i><input type="password" size="40%"  placeholder=" Password" name="pass" style="height:11%;font-family:sans-serif;border-radius:4px 4px 4px 4px;"></div>
			<div class="form-group"><input type="submit" class="btn btn-block btn-primary" name="submit" value="Login" style="float:center;height:13%;width:40%;font-size:16px;background-color:#008AE6;font-family:lora;"></div>
			<div class="form-group"><p style="float:left;font-family:Arail;font-size:105%">New Member? Register&nbsp;<a href="/backup-1/exp-4"><b>here</p></a></div><br><br>
			<span style="color:red;float:left;padding-top:0px;margin-top:0px;"><b><?php echo $err;?></b></span>
			</form>
			</div>
		</div>
	</div>		
</body>
</html>

<!DOCTYPE html>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/database/database.php';
	$db=new Database;
	$result=$db->db->query('select title, `posted time` from announcement');
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Home</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" href="css/announce.css">
	</head>
	<script>
		function theconfirm(){
			if(confirm("確定登出?"))location.href="logout.php";
			
		}
	</script>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">N C T U &nbsp;&nbsp; S p o r t s</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-link">
						<li class="active"><a href="home.php">首頁 <span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-link">
						<li><a href="events.php">活動列表 <span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-link">
						<li><a href="<?php echo isset($_SESSION['user'])?'home':'register'; ?>.php"><?php echo isset($_SESSION['user'])?$_SESSION['user']:'註冊'; ?> <span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-link">
						<li><a <?php echo isset($_SESSION['user'])?'href="javascript:theconfirm()"':'href="login.php"';?>><?php echo isset($_SESSION['user'])?'登出':'登入';?> <span class="sr-only">(current)</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container announce-wrapper">
			<h3 class="title">最新公告</h3>
			<div class="row">
				<table class="table">
					<?php
					for($x=0;$x<@mysqli_num_rows($result);$x++){
						$value=mysqli_fetch_assoc($result);
						echo "<tr>"."<td class=\"td-date\">".substr($value["posted time"],0,4)."/".substr($value["posted time"],5,2)."/".substr($value["posted time"],8,2)."</td>"."<td>"."<a href=\"anncs.php\">".$value["title"]."</a>"."</td>"."</tr>";
					}
					?>
				</table>
			</div>
		</div>
	</body>
</html>
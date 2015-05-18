<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>



<body>
<div class="container">
	<center><h2>Sign Up</h2></center><br><br>	
	<div class="row clearfix">
		<div class="col-md-12 column">


<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<cetner>
	<div class="form-group">
		<label for="name" class="col-sm-2 col-xs-12 control-label">Username</label>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
			<input type="text" class="form-control" id="fullname" name="username" placeholder="Username" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="name" class="col-sm-2 col-xs-12 control-label">Password</label>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
			<input type="password" class="form-control" id="nickname" name="password" placeholder="Password" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="name" class="col-sm-2 col-xs-12 control-label">Student ID</label>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
			<input type="text" class="form-control" id="age" name="studentid" placeholder="Student ID" value="">
			<!-- <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary"> -->
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-5 col-xs-10 col-sm-offset-2">
			<input id="submit" name="submit" type="submit" value="Sign Up" class="btn btn-primary">
		</div>
	</div>
</cetner>
</form>


</body>
</html>

<?php
$host = 'localhost';
$username = 'root';
$password = 'toor';
$dbname = 'Borrow_Return_Bike';
$port = 80;


try {
	$conn = new PDO("mysql:host=$host;dbname=$dbname".";port=$port", $username, $password);
	echo '<p>'.$_SERVER['PHP_SELF'].'</p>';
     	//$sql = "INSERT INTO table1 (Fullname, Nickname, Age) VALUES ('eiei', 'eiei', 5)";
		//$qry = $conn -> query($sql);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password']; 
		$studentid= $_POST['studentid']; 
		/*
  	echo '<p>';
			var_dump($_POST);
		echo '</p>';
		 */
     if (empty($username) or empty($password) or empty($studentid)) {
     	echo '<p> **** don\'t null **** </p>';
     }
     else {
				 //$sql = "SELECT StdID FROM Student WHERE StdID = '$studentid'";
				 $sql = "SELECT COUNT(StdID) as c FROM Student WHERE StdID = '$studentid'";
				 //$sql = "IF EXISTS (SELECT StdID FROM Student WHERE StdID = '$student') 
					//	 BEGIN 
					//	 INSERT INTO StdAccount(User, Pass, StdID) VALUES ('$username', '$password', '$studentid') END";
				 $qry = $conn -> query($sql);
				if ($qry -> fetch()['c'] != 0) {
						$sql = "INSERT INTO StdAccount(User, Pass, StdID) VALUES ('$username', '$password', '$studentid')";
						$qry = $conn -> query($sql);
				}
		//$fullname = $nickname = $age = null;
		echo '<p> **** success ****'.$qry.'</p>';
     }
	$conn = null;
	}
} catch (PDOException $error) {
	die("error database $dbname :" . $error>getMessage());
}
?>

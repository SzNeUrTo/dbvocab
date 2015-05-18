<?php
$host = 'localhost';
$username = 'root';
$password = 'toor';
$dbname = 'DBVocab';
$port = 80;


try {
	$conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=utf8", $username, $password);
	$sql = 'SELECT * FROM DBVocab ORDER BY English';
	$qry = $conn -> query($sql);
} catch (PDOException $error) {
	die("Could not connect to the database $dbname :" . $error>getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ShowTableDB</title>
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
			<center><h1>Vocabulary of Database</h1></center>

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
<form class="form-inline" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<cetner>

	<div class="form-group">
		<label for="name" class="col-sm-2 col-xs-12 control-label">Student ID</label>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
			<input type="text" class="form-control" id="age" name="studentid" placeholder="Student ID" value="">
			<!-- <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary"> -->
		</div>
	</div>
	<div class="form-group">
		<label for="name" class="col-sm-2 col-xs-12 control-label">Student ID</label>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
			<input type="text" class="form-control" id="age" name="studentid" placeholder="Student ID" value="">
			<!-- <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary"> -->
		</div>
	</div>

</cetner>
</form>
			<!--                             -->
			<div class="panel panel-primary">
				<div class="panel-heading">Vocabulary</div>
				<table class="table table-striped">
				<thead>
					<tr>

					<th>English</th>
					<th>Thai</th>
					<th>Description</th>
					<th>Keyword</th>
					<th>Chapter</th>

					</tr>
				</thead>
				<tbody>
					<?php while ($row = $qry->fetch()): ?>
						<tr>
							<td><?php echo htmlspecialchars($row['English'])?></td>
							<td><?php echo htmlspecialchars($row['Thai']); ?></td>
							<td><?php echo htmlspecialchars($row['Description']); ?></td>
							<td><?php echo htmlspecialchars($row['Keyword']); ?></td>
							<td><?php echo htmlspecialchars($row['Chapter']); ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
			</div>
			<!--                             -->
		</div>
	</div>
</div>
</body>
</html>

<?php 
	// var_dump for see array table
	//$qry = $conn -> query($sql);
	//$table = $qry -> fetchAll();
	//echo count($table) + 1;
	//var_dump($table);
	//echo '<br><br>';
	//var_dump($table[0]);
	//echo '<br>';
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="../../favicon.ico" rel="icon">
    <title>DBVocab</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
    <link href="css/xeditable.css" rel="stylesheet" type="text/css">
    <link href="css/tableCss.css" rel="stylesheet" type="text/css">
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.0-rc.1/angular-mocks.js" type="text/javascript"></script>
    <script src="js/xeditable.js" type="text/javascript"></script>
    <script src="js/controller.js" type="text/javascript"></script>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span></button> 
                <a class="navbar-brand" href="#">[D]ata[b]ase[Vocab]</a>
            </div>

            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <!-- something -->
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="./index.php">Practice</a>
                    </li>
                    <li>
                        <a href="./showall.php">ShowAll</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container special">
        <!-- edithere -->
		<div class="jumbotron text-center">
		<h1 id="word">Transaction</h1>
		<p id="desc" style="height: 70%;"><br>
			????????????????????????
			????????????????????????
			????????????????????????
			????????????????????????
			????????????????????????
			????????????????????????
			????????????????????????
			????????????????????????
			????????????????????????
		</p>
		<div>
  			<button class="btn btn-danger" ng-click="addWord()">Translate</button>
  			<button class="btn btn-success" ng-click="addWord()">NextWord</button>
		</div>
		</div>
        <!-- EditHere -->
    </div>

</body>
</html>

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
<html>
<head>
  <title>ShowTable</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/xeditable.css">
<link rel="stylesheet" type="text/css" href="css/tableCss.css">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.0-rc.1/angular-mocks.js"></script>

<script type="text/javascript" src="js/xeditable.js"></script>
<script type="text/javascript" src="js/controller.js"></script>

</head>
<body>
		<center><h1>Vocabulary of Database</h1></center>
<div ng-app="app" ng-controller="Ctrl">
   <table class="table table-bordered table-hover table-condensed">
    <tr style="font-weight: bold">
      <td style="width:15%">English</td>
      <td style="width:15%">Thai</td>
      <td style="width:25%">Description</td>
      <td style="width:15%">Keyword</td>
      <td style="width:15%">Chapter</td>
      <td style="width:15%">Edit</td>
    </tr>
    <tr ng-repeat="word in words">
      <td>
        <span editable-text="word.eng" e-name="eng" e-form="rowform" onbeforesave="checkWord($data, word.id)" e-required>
          {{ word.eng || 'empty' }}
        </span>
      </td>

      <td>
        <span editable-text="word.thai" e-name="thai" e-form="rowform" onbeforesave="checkWord($data, word.id)" e-required>
          {{ word.thai || 'empty' }}
        </span>
      </td>

      <td>
        <!-- editable username (text with validation) -->
        <span editable-text="word.desc" e-name="desc" e-form="rowform" onbeforesave="checkWord($data, word.id)" e-required>
          {{ word.desc || 'empty' }}
        </span>
      </td>


      <td>
        <!-- editable username (text with validation) -->
        <span editable-text="word.keyword" e-name="keyword" e-form="rowform" onbeforesave="checkWord($data, word.id)" e-required>
          {{ word.keyword || 'empty' }}
        </span>
      </td>


      <td>
        <!-- editable username (text with validation) -->
        <span editable-text="word.chapter" e-name="chapter" e-form="rowform" onbeforesave="checkWord($data, word.id)" e-required>
          {{ word.chapter || 'empty' }}
        </span>
      </td>

      <td style="white-space: nowrap">
        <!-- form -->
        <form editable-form name="rowform" onbeforesave="saveWord($data, word.id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="inserted == word">
          <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary">
            save
          </button>
          <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-default">
            cancel
          </button>
        </form>
        <div class="buttons" ng-show="!rowform.$visible">
          <button class="btn btn-primary" ng-click="rowform.$show()">edit</button>
          <button class="btn btn-danger" ng-click="removeWord($index)">del</button>
        </div>  
      </td>
    </tr>
  </table>

  <button class="btn btn-success btn-block" ng-click="addWord()">Add Word</button>
</div>
</body>
</html>

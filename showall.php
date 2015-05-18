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
                    <li>
                        <a href="./index.php">Practice</a>
                    </li>

                    <li class="active">
                        <a href="./showall.php">ShowAll</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- edithere -->
<div ng-app="app" ng-controller="Ctrl">
   <table class="table table-bordered table-hover table-striped table-condensed the-table-longerword">
	<thead>
    <tr class="warning" style="font-weight: bold">
      <th style="width:15%">English</td>
      <th style="width:15%">Thai</td>
      <th style="width:25%">Description</td>
      <th style="width:15%">Keyword</td>
      <th style="width:15%">Chapter</td>
      <th style="width:15%">Edit</td>
    </tr>
	</thead>
	<tbody>
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
	</tbody>
  </table>

  <button class="btn btn-success btn-block" ng-click="addWord()">Add Word</button>
</div>
        <!-- EditHere -->
    </div>

</body>
</html>
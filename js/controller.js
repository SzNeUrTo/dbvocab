var app = angular.module("app", ["xeditable", "ngMockE2E"]);

app.run(function(editableOptions) {
  editableOptions.theme = 'bs3';
});

app.controller('Ctrl', function($scope, $filter, $http) {
 $scope.words = [
 // 	// var getting recieve get data and parse json array carefully thaiconvertJson
    {id: 1, eng: 'aaa', thai: 'System', desc: '12345', keyword: '666', chapter: '777'},
 //   {id: 2, eng: 'aaa', thai: 'Systemf', desc: '12345', keyword: '666', chapter: '777'},
 //   {id: 3, eng: 'aaa', thai: 'System', desc: '12345', keyword: '666', chapter: '777'}
  ]; 
	//$scope.words = function() {
		 //parse json to array json
		//var dataLoading = $scope.database("load", '');
		//convert DataType
		//console.log('xx');
		//return dataLoading;
	//};

	$scope.database = function(action, data) {
		var postData = {};
		postData['action'] = action;
		postData['data'] = data; // serialization
		var posting = $.post('responseData.php', postData);
		var dataResponse = '';
		var self = this;
		posting.done(function(dataResponse) {
			//self.dataResponse = JSON.parse(dataResponse);
		});
		console.log(dataResponse);
		return dataResponse;
  };


  $scope.checkWord = function(data, id) {
    if (false) {
		return "Username 2 should be `awesome`";
		// check something at input before save
    }
  };

  $scope.saveWord = function(data) {
    //$scope.user not updated yet
	//$scope.database("save", data);
    //angular.extend(data, {id: id}); // what is type is data
	$scope.database("save", data);
    return $http.post('/saveWord', data);
  };

  $scope.removeWord = function(index) {
    var dataTarget = $scope.words.splice(index, 1); // what is type
	$scope.database("delete", dataTarget);
	// remove from databsae
	// reload database again
  };

  $scope.addWord = function() {
    $scope.inserted = {
      id: $scope.words.length+1,
      eng: '',
      thai: '',
      desc: '',
      keyword: '',
      chapter: ''
    };
    $scope.words.push($scope.inserted);
  };
});

// --------------- mock $http requests ----------------------
app.run(function($httpBackend) {
  //$httpBackend.whenGET('/groups').respond([
    //{id: 4, text: 'admin'}
  //]);
    
  $httpBackend.whenPOST(/\/saveWord/).respond(function(method, url, data) {
    data = angular.fromJson(data);
    return [200, {status: 'ok'}];
  });
});
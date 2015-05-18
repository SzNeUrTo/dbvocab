var app = angular.module("app", ["xeditable", "ngMockE2E"]);

app.run(function(editableOptions) {
  editableOptions.theme = 'bs3';
});

app.controller('Ctrl', function($scope, $filter, $http) {
 $scope.words = [
	{id: 1, eng: 'aaa', thai: 'System', desc: '12345', keyword: '666', chapter: '777'},
	{id: 2, eng: 'aaa', thai: 'Systemf', desc: '12345', keyword: '666', chapter: '777'},
	{id: 3, eng: 'aaa', thai: 'System', desc: '12345', keyword: '666', chapter: '777'}
  ]; 
  /*
   *
   * = function() {
  		return dbShowTableToJson;
   }
   *
   */
  $scope.groups = [];
  $scope.loadGroups = function() {
    return $scope.groups.length ? null : $http.get('/groups').success(function(data) {
      $scope.groups = data;
    });
  };

  $scope.showGroup = function(user) {
    if(user.group && $scope.groups.length) {
      var selected = $filter('filter')($scope.groups, {id: user.group});
      return selected.length ? selected[0].text : 'Not set';
    } else {
      return user.groupName || 'Not set';
    }
  };


  $scope.showStatus = function(user) {
    var selected = [];
    if(user.status) {
      selected = $filter('filter')($scope.statuses, {value: user.status});
    }
    return selected.length ? selected[0].text : 'Not set';
  };

  $scope.checkWord = function(data, id) {
    if (id === 2 && data !== 'awesome') {
      return "Username 2 should be `awesome`";
    }
  };

  $scope.saveWord = function(data, id) {
    //$scope.user not updated yet
    angular.extend(data, {id: id});
    return $http.post('/saveWord', data);
  };

  // remove user
  $scope.removeWord = function(index) {
    $scope.words.splice(index, 1);
	// remove from databsae
	// reload database again
  };

  // add user
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
	// add To Database
	// load table again after
  };
});

// --------------- mock $http requests ----------------------
app.run(function($httpBackend) {
  $httpBackend.whenGET('/groups').respond([
    {id: 1, text: 'user'},
    {id: 2, text: 'customer'},
    {id: 3, text: 'vip'},
    {id: 4, text: 'admin'}
  ]);
    
  $httpBackend.whenPOST(/\/saveWord/).respond(function(method, url, data) {
    data = angular.fromJson(data);
    return [200, {status: 'ok'}];
  });
});
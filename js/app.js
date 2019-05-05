(function () {
    //Defining the application
    var app = angular.module('myapp', []);
    var title = 'Car Inventory System - Jenil Sanghvi';
    app.controller('primeController', function ($scope, $http) {
        $scope.submitForm = function () {
            var data = {
                prime: $scope.prime.primeNumber
            };
            $http.post('main/service.php', data).then(function (response) {
                if (response.data == 1) {
                    $scope.validtePrime = "Prime Number";
                } else {
                    $scope.validtePrime = "Not a Prime Number";
                }

            });
        }
    });
    app.controller('fibonacciController', function ($scope, $http) {
        $scope.findSeries = function () {
            var data = {
                fibo: $scope.fibonacci.endNumber
            };
            $http.post('main/service.php', data).then(function (response) {
                if (response.data.fibo !== '') {
                    $scope.series = response.data.fibo;
                }
            });
        }
    });
    app.controller('manufactureController', function ($scope, $http) {
        $scope.addDetails = function (val) {
            var data = {
                name: $scope.manufacturer.name,
                isActive: val
            };
            $http.post('main/service.php', data).then(function (response) {
                $scope.validatedString = response.data.message;
            });
        }
    });
    app.controller('TitleController', function ($scope) {
        $scope.name = title;
    });

})();
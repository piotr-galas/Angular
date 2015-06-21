var symfonyControllers = angular.module('symfonyControllers', []);


symfonyControllers.controller('DemoCtrl', function ($scope, $location) {

    $scope.message =  'You can put double braces to get value from controller like {{ variable }}'
    $scope.message2 = "You can put 4 braces to get value from angular controller like {{ '{{ variable}}' }}"

    alert('it works');


});




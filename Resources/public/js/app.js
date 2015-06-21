'use strict';

/* App Module */

var symfonyApp = angular.module('symfonyApp', [
    'ngRoute',
    'symfonyControllers'
]);

symfonyApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/demo',{
                templateUrl: Routing.generate('angular_demo'),
                controller: 'DemoCtrl'
            }).
            otherwise({
                redirectTo: '/demo'
            });
    }]);

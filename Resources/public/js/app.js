'use strict';

/* App Module */

var symfonyApp = angular.module('your_custom_angular_app_name', [
    'ngRoute',
    'symfonyControllers'
]);

symfonyApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/angular_demo',{
                templateUrl: Routing.generate('angular_demo'),
                controller: 'DemoCtrl'
            }).
            when('/homepage',{
                templateUrl: Routing.generate('homepage'),
                controller: 'DemoCtrl'
            }).
            when('/custom_angular_route_but_should_be_the_same_as_symfony_route',{
                templateUrl: Routing.generate('symfony_route_defined_in_normal_way'),
                controller: 'angular_controller_defined_in_controllers.js'
            }).
            otherwise({
                redirectTo: '/angular_demo'
            });
    }]);

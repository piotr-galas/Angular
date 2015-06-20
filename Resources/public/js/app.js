'use strict';

/* App Module */

var symfonyApp = angular.module('symfonyApp', [
    'ngRoute',
    'symfonyControllers',
    'symfonyDirectives',
    'symfonyServices'
]);

symfonyApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/login',{
                templateUrl: Routing.generate('override_fos_user_security_login'),
                controller: 'LoginCtrl'
            }).
            when('/register',{
                templateUrl: Routing.generate('override_fos_user_registration_register'),
                controller: 'RegisterCtrl'
            }).
            otherwise({
                redirectTo: '/login'
            });
    }]);

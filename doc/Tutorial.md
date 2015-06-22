Tutorial
==================
This tutorial show how use this bundle

* configure
* create controller and actiorn (symfony standart symfony way)
* add route to fos_js_routing config
* add js files related to angular
* enjoy routing without reloading

###Configure
You have to add index.html.twig file. This file will be related with angular ane every page will be rendered inside this file inside of this div 
```xml
    <div ng-view></div>
```

So lets define this view in config

``` yaml
# app/config/config.yml
piga_angular:
     base_angular_view: AppBundle:Angular:index.html.twig

```

and then add this file inside your bundle
```twig
# src/AppBundle/Resources/views/Angular/index.html.twig

{% extends 'PigaAngularBundle::angular_layout.html.twig' %}

{% block angular_files %}
    <script src="{{ asset('bundles/app/js/app.js') }}"></script>
    <script src="{{ asset('bundles/app/js/controllers.js') }}"></script>
{% endblock %}

{% block body %}
    <div class="body" ng-app="your_custom_angular_app_name">
        <div class="container">
            <div ng-view></div>
        </div>
    </div>
{%  endblock %}
```

* inside block 'angular_files' you have to define your own js files
* inside block 'body' you have to define 'your_custom_angular_app_name', this name will be used in js file defined in block above

###Create controller and action

You can create controller and action in standard symfony way, so let's do it 
Let's assume that you want to create Default controller inside AppBundle. 
Standart symfony distribution should provide it but below is code

```php 
// src/AppBundle/Controller/DefaultController
<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
}
```

When you go in browser to 

     /app_dev.php/app/example
you should see default page with "homepage" text because controller render "app/Resources/views/default/index.html.twig"

###add route to fos_js_routing config
 every route defined in symfony have to be also defined in config otherwise angular routing will not work
 checkout
 
 [FosJSRoutingBundle doumentation](https://github.com/FriendsOfSymfony/FOSJsRoutingBundle/blob/master/Resources/doc/index.md)
 
``` ya
# app/config/config.yml

fos_js_routing:
    routes_to_expose:
        - homepage
        - another_custom_route
        ....

```

###add js files related to angular



```js
/* src/AppBundle/Resources/public/js/app.js */
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
```

```js

/* src/AppBundle/Resources/public/js/app.js */

var symfonyControllers = angular.module('symfonyControllers', []);


symfonyControllers.controller('DemoCtrl', function ($scope, $location) {

});

symfonyControllers.controller('AnotherDemoCtrl', function ($scope, $location) {
    //you dont need add anything to this controller to use angular routing, you can leave it empty
});

```

You dont need to understand what js do in files above. If you are not familiar with angular you can just update three parameters related to your symfony route and use copy/paste to ad new

```js
            when('/custom_angular_route_but_should_be_the_same_as_symfony_route',{
                templateUrl: Routing.generate('symfony_route_defined_in_normal_way'),
                controller: 'angular_controller_defined_in_controllers.js'
            }).
```

###enjoy routing without reloading

Your symfony action is now avilable in both url:

      app_dev.php/app/example
and

     app_dev.php/index#homepage

     
          
Usage flow
=====

In normal way in symfony you create controller and action. After that you create route related with this action.
In "this bundle way" you do the same, but to allow change route without reload you have to do two more things

* You have to add route to FOSJsRouting config
* You have to add route to your angular controller
* You have to create angular controller related to route

Points above assume that you configure bundle

Every step are described in [tutorial](https://github.com/piotr-galas/Angular/blob/master/doc/Tutorial.md)
it is easy and you don't need to know angular. You can just duplicates line in angular files adding new routes. Of course if you know angular you can use more usefull angular function

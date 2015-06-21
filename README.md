Angular Bundle
==================


### Idea
This bundle integrate angular with symfony. The idea is create easy bundle without any magic. Bundle consist of one controller one view and little configuration. Bundle use bower as js dependency manager. The idea is create symfony action in normal way, but have access to angular in all of views.

### What bundle do?
* Add angular files to base layout
* Allow you to use oneReload page with symfony routing
* Allow you to use Angular in twig which is rendering by symfony controller

instalation
===========
* Download PigaAngularBundle using composer
* Enable the Bundle and RelatedBundle
* Import angular routing
* Run initialize command


###step one 
download bundle using composer

      composer require "piga/angular": "dev-master"
 
###step two


Enable the bundle and related bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        	new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
			new Piga\AngularBundle\PigaAngularBundle(),
    );
}
```
###Step three
you have to import angular routing

In YAML:

``` yaml
# app/config/routing.yml
piga_angular:
    resource: "@PigaAngularBundle/Resources/config/routing.yml"

###Step four
     run
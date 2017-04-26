# KarudevPersonBundle
Manage person

## Install
In the composer.json, put this code

``` json
"repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:karudev/PersonBundle.git"
            
        }
    ],
```

Then lunch

``` bash
composer require karudev/personbundle : "dev-master"
```

## Configuration
Configure new Karudev\PersonBundle\KarudevPersonBundle() in app/AppKernel.php
``` php

 public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Karudev\PersonBundle\KarudevPersonBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }
```

## Routing
Put the routes of KdvPersonBundle in app/rounting.yml
``` yml
karudev_personbundle:
    resource: "@KarudevPersonBundle/Resources/config/routing.yml"
    prefix:   /
```


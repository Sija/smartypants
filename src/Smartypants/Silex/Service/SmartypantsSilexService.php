<?php

namespace Smartypants\Silex\Service;

use Silex\Application;
use Silex\ServiceProviderInterface;

use Smartypants\Parser\SmartypantsParser;
use Smartypants\Twig\Extension\SmartypantsTwigExtension;

class SmartypantsSilexService implements ServiceProviderInterface
{
    public function boot(Application $app)
    {
        //
    }

    public function register(Application $app)
    {
        $app['smartypants'] = $app->share(function ($app) {
            $features = isset($app['smartypants.features']) ? $app['smartypants.features'] : array();
            return new SmartypantsParser($features);
        });
        if (isset($app['twig'])) {
            $app['twig']->addExtension(new SmartypantsTwigExtension($app['smartypants']));
        }
    }
}

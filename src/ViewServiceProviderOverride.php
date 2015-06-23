<?php

namespace Idmkr\LaravelBladeFix;

use Illuminate\View\ViewServiceProvider;

class ViewServiceProviderOverride extends ViewServiceProvider
{
    /**
     * Register the view environment.
     *
     * @return void
     */
    public function registerFactory()
    {
        $this->app->bindShared('view', function($app)
        {
            // Next we need to grab the engine resolver instance that will be used by the
            // environment. The resolver will be used by an environment to get each of
            // the various engine implementations such as plain PHP or Blade engine.
            $resolver = $app['view.engine.resolver'];

            $finder = $app['view.finder'];

            // The local Factory call will now be resolved to LaravelViewOverride\Factory
            $env = new \Idmkr\LaravelBladeFix\Factory($resolver, $finder, $app['events']);

            // We will also set the container instance on this view environment since the
            // view composers may be classes registered in the container, which allows
            // for great testable, flexible composers for the application developer.
            $env->setContainer($app);

            $env->share('app', $app);

            return $env;
        });
    }
}
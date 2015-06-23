# laravel-blade-fix
Fix for the @parent replaced string within Blade templates. see https://github.com/laravel/framework/issues/7888

composer require idmkr/laravel-blade-fix

then replace your provider
//'Illuminate\View\ViewServiceProvider',
'Idmkr\LaravelBladeFix\ViewServiceProviderOverride',

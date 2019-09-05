<?php
// Here we bootstrap our package and register the services. 
namespace Kedtech\Automation\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;


class AutomationServiceProvider extends ServiceProvider
{

    /***
     * Bootstrap Services
     * 
     * @return void
     */
    public function boot()
    {
        // We need to register our routes.php file in this method. We are going to use the include function
        include __DIR__ . '/../Http/routes.php';
        // We could also load our routes using the loadRoutesFrom function. 

        // We need to bootstrap our views in this method. We are going to use the loadViewsFrom function.
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'automation');
        // 'automation' in this case is for hint path... 

        // We need to add an event listener so that admin layouts include our css. 
        Event::listen('bagisto.admin.layout.head', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('automation::layouts.animation');
        });

        // We are also adding language translation to our package so that we can be able 
        // to translate many languages. 
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang/', 'helloworld');

        // Loading the migration to our service provider.
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    public function register()
    { }
}

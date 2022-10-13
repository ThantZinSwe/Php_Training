<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Dao Registration
        $this->app->bind('App\Contracts\Dao\Task\TaskDaoInterface', 'App\Dao\Task\TaskDao');
        $this->app->bind('App\Contracts\Dao\Major\MajorDaoInterface', 'App\Dao\Major\MajorDao');
        $this->app->bind('App\Contracts\Dao\Student\StudentDaoInterface', 'App\Dao\Student\StudentDao');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

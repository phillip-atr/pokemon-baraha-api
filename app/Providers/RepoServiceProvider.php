<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $models = [
            'Group',
            'Type',
            'Class',
            'Pokemon',
            'Trainer'
        ];

        foreach ($models as $model) {
            $this->app->bind(
                "App\Repositories\Contracts\\{$model}RepositoryInterface",
                "App\Repositories\\{$model}Repository"
            );
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

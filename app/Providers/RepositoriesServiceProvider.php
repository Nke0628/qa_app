<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\QuestionRepositoryInterface::class,
            \App\Repositories\Eloquent\QuestionRepository::class
        );

        $this->app->bind(
            \App\Repositories\CommentRepositoryInterface::class,
            \App\Repositories\Eloquent\CommentRepository::class
        );

        $this->app->bind(
            \App\Repositories\CategoryRepositoryInterface::class,
            \App\Repositories\Eloquent\CategoryRepository::class
        );
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

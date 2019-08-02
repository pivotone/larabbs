<?php

namespace App\Providers;

use App\Observers\LinkObserver;
use App\Observers\ReplyObserver;
use App\Observers\TopicObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Topic;
use App\Models\Reply;
use App\Models\Link;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(new UserObserver());
        Topic::observe(new TopicObserver());
        Reply::observe(new ReplyObserver());
        Link::observe(new LinkObserver());
    }
}

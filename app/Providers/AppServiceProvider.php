<?php

namespace App\Providers;

use App\Observers\CourseObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * get rid of the  error:
         * SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long;
         */
        Schema::defaultStringLength(191);

        /**
         * on boot observe the Course Model using the the CourseObserver
         * this will apply the instructions of the Course Observer
         * whenever active CRUD observer are in effect
         * for more information see the CourseObserver class file
         */

        /**
         *
         */
        Course::observe(CourseObserver::class);

    }
}

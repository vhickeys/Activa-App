<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*', function ($view) {

            $homeData = activaApi('home', [
                'per_category' => 8,
            ]);

            $categories = $homeData['success']
                ? $homeData['data']
                : [];

            $view->with('categories', $categories)
                 ->with('apiUrl', config('app.api_url'));
        });
    }
}


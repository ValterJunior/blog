<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;
use App\Models\{Post, Tag};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $tags     = $this->getMenuTags();
        $archives = $this->getMenuArchives();

        view()->share('_menu_tags', $tags);
        view()->share('_menu_archives', $archives);

        Validator::extend('tag_requires_comma', function( $attribute, $value, $parameters, $validator ){
            return strpos($value, ',');
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function getMenuTags(){

        return Tag::orderBy('name')->get();

    }

    private function getMenuArchives(){
        return Post::orderBy('created_at', 'desc')->groupBy( array( 'year', 'month' ) )->get();
    }

}

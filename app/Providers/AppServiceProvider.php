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
        $tags       = $this->getMenuTags();
        $archives   = $this->getMenuArchives();


        view()->share('_menu_tags'    , $tags);
        view()->share('_menu_archives', $archives);

        Validator::extend('tag_requires_comma', function( $attribute, $value, $parameters, $validator ){
            return strpos($value, ',') || ( !strpos(trim($value), ' ' ) );
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

    /**
     * Retrieve a list of tags ordered by name
     *
     * @return App\Model\Tag
    */
    private function getMenuTags(){

        return Tag::orderBy('name')->get();

    }

    /**
    * Retrieve a list of headers based in month/year post information
    *
    * @return App\Models\Post
    */
    private function getMenuArchives(){
        return Post::orderBy('created_at', 'desc')
                   ->groupBy( array( 'year', 'month' ) )
                   ->orderBy( 'year', 'desc' )
                   ->orderBy('month', 'desc')
                   ->get();
    }

}

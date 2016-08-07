<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\{Post, Tag};
use DB;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @param  Request
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    // public function index()
    {
        $value = $request->input('search');
        $type  = $request->input('type');

        if( $value && strlen($value) > 0 ){
        
            if( $type === 't' ){

                // $value = Tag::where( 'name', $value )->first();

                $posts = Posts::with(['tags' => function($query) use ($value) {
                    $query->where('tags.name', $value);
                }])->get();


            }elseif( $type === 'a' ){

                $year  = $request->input('year');
                $posts = Post::where( 'month', $value )->where('year', $aux)->get();

            }elseif( $type === 's' ){

                $posts = Post::where( 'title', 'like', '%' . $value . '%' )->orWhere( 'content', '%' . $value . '%' )->get();

            }else{
                $posts = $this->getAllPosts();
            }

        }else{
            $posts = $this->getAllPosts();
        }

        return view( 'home.index', compact('posts') );
    }

    private function getAllPosts(){
        return Post::orderBy( 'created_at', 'desc' )->get();
    }

}

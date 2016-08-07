<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\{Post, Tag};

class HomeController extends Controller
{

    protected $max_paginate = 5;

    /**
     * Show the application dashboard.
     * @param  Request
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $type  = $request->input('type');
        $value = $request->input('search');

        if( $value && strlen($value) > 0 ){
        
            if( $type === 't' ){

                $posts = $this->getPostsByTag($value);

            }elseif( $type === 'a' ){

                $year  = $request->input('year');
                $posts = $this->getPostsByDate( $value, $year );

            }elseif( $type === 's' ){

                $posts = $this->getPostsBySearch( $value );

            }else{
                $posts = $this->getAllPosts();
            }

        }else{
            $posts = $this->getAllPosts();
        }

        return view( 'home.index', compact('posts') );
    }

    /**
     * Retrieving all posts ordering by created_at
     * @return \App\Models\Post
     */
    private function getAllPosts(){
        return Post::orderBy( 'created_at', 'desc' )->paginate($this->max_paginate);
    }

    /**
     * Retrieving all posts filtering by tag id
     * @return \App\Models\Post
     */
    private function getPostsByTag( string $tagId ){

        $posts = Tag::find($tagId)
                    ->posts()
                    ->orderBy('created_at', 'desc')->paginate($this->max_paginate);

        return $posts;

    }

    /**
     * Retrieving all posts filtering by mont/year,  ordering by created_at
     * @return \App\Models\Post
     */
    private function getPostsByDate( int $month, int $year ){

        // For any freaking reason this relationship is not working, at all! 
        $posts = Post::where( 'month', $month )
                     ->where('year', $year)
                     ->orderBy('created_at', 'desc')
                     ->paginate($this->max_paginate);

        return $posts;

    }

    /**
     * Retrieving all posts filtering by text(search),  ordering by created_at
     * @return \App\Models\Post
     */
    private function getPostsBySearch( string $search ){

        $posts = Post::where( 'title', 'like', '%' . $search . '%' )
                    ->orWhere( 'content', 'like', '%' . $search . '%' )
                    ->orderBy('created_at', 'desc')
                    ->paginate($this->max_paginate);

        return $posts;

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Settings;
use App\Category;
use App\Post;
use App\Tag;
class FrontEndController extends Controller
{
    public function index(){
        return view('index')
                    ->with('title',Settings::first()->site_name)
                    ->with('categories',Category::take(4)->get())
                    ->with('first_post',Post::orderBy('created_at','desc')->first())
                    ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                    ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                    ->with('unity',Category::find(3))
                    ->with('laravel',Category::find(5))
                    ->with('mysql',Category::find(4))
                    ->with('settings',Settings::first());
    }


    public function single($slug){
        $post = Post::where('slug',$slug)->first();
        $next_id = Post::where('id','>',$post->id)->min('id');
        $prev_id = Post::where('id','<',$post->id)->max('id');
        return view('single')
                ->with('post',$post)
                ->with('title',Settings::first()->site_name)
                ->with('categories',Category::take(4)->get())
                ->with('settings',Settings::first())
                ->with('next',Post::find($next_id))
                ->with('prev',Post::find($prev_id))
                ->with('all_tags',Tag::all());
    }
}
